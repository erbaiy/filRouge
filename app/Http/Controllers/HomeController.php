<?php

namespace App\Http\Controllers;

use App\Models\{User, Room, Reservation, Payment, Service, Ticket};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationTicket;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{

    public function index()
    {

        $user = User::find(session('id'));

        $rooms = DB::table('rooms')
            ->select(
                'rooms.*',
                DB::raw('GROUP_CONCAT(service.id) AS service_ids'),
                DB::raw('GROUP_CONCAT(service.name) AS service_names'),
                DB::raw('GROUP_CONCAT(service.image) AS service_images')
            )
            ->join('room_service', 'rooms.id', '=', 'room_service.room_id')
            ->join('service', 'service.id', '=', 'room_service.service_id')
            ->leftJoin('reservations', function ($join) {
                $join->on('reservations.room_id', '=', 'rooms.id')
                    ->where(function ($query) {
                        $query->whereDate('reservations.checkin', '<=', now()) // Check-in date is today or before
                            ->whereDate('reservations.checkout', '>=', now()); // Checkout date is today or after
                    });
            })
            ->where('rooms.availability', true)
            ->whereNull('reservations.id')
            ->groupBy('rooms.id')
            ->get();



        $roomsWithServices = [];

        foreach ($rooms as $room) {
            $roomId = $room->id;
            if (!isset($roomsWithServices[$roomId])) {
                $roomsWithServices[$roomId] = [
                    'room' => $room,
                    'services' => [],
                ];
            }

            $serviceIds = explode(',', $room->service_ids);
            $serviceNames = explode(',', $room->service_names);
            $serviceImages = explode(',', $room->service_images);

            foreach ($serviceIds as $index => $serviceId) {
                $service = [
                    'id' => $serviceId,
                    'name' => $serviceNames[$index],
                    'image' => $serviceImages[$index],
                ];
                $roomsWithServices[$roomId]['services'][] = $service;
            }
        }
        return view('front-office.index', compact('roomsWithServices', 'user'));
    }


    public function reserve(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'checkin' => 'required|date|after:now',
            'checkout' => 'required|date|after:checkin',
            'price' => 'required|numeric',
        ]);

        $room = Room::find($data['room_id']);
        if (!$room || !$room->availability) {
            return response()->json(['error' => 'Room not available or not found.'], 422);
        }

        // Check if the room is available for the selected dates
        $checkin = Carbon::parse($data['checkin']);
        $checkout = Carbon::parse($data['checkout']);
        $checkStatus = Reservation::where('room_id', '=', $room->id)->get();

        foreach ($checkStatus as $checkStatu) {
            if (!$room->isAvailableForBooking($checkin, $checkout) && $checkStatu->status != 'cancelled') {

                return redirect()->back()->with('failed', 'The room is not available for the selected dates.');
            }
        }
        // Calculate reservation details
        $number_of_nights = $checkout->diffInDays($checkin);
        $total_price = $data['price'] * $number_of_nights;

        // Create reservation
        $reservation = Reservation::create([
            'user_id' => $data['user_id'],
            'room_id' => $room->id,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'number_of_nights' => $number_of_nights,
            'total_price' => $total_price,
        ]);

        // Update room availability
        $room->update(['availability' => false]);

        // Create payment
        $payment = Payment::create([
            'reservation_id' => $reservation->id,
            'amount' => $total_price,
            'is_paid' => true,
        ]);

        // Generate ticket
        $ticket = Ticket::create([
            'payment_id' => $payment->id,
            'token' => Str::random(32),
        ]);

        // Send email notification
        $user = $reservation->user;
        Mail::to($user->email)->send(new ReservationTicket($user, $ticket, $reservation, $room));

        // Redirect back with success message
        return back()->with('success', 'Reservation created successfully.');
    }



    public function filterRooms($categoryId, $checkinDate, $checkoutDate)
    {
        $rooms = DB::table('rooms')
            ->select(
                'rooms.*',
                DB::raw('GROUP_CONCAT(service.id) AS service_ids'),
                DB::raw('GROUP_CONCAT(service.name) AS service_names'),
                DB::raw('GROUP_CONCAT(service.image) AS service_images')
            )
            ->join('room_service', 'rooms.id', '=', 'room_service.room_id')
            ->join('service', 'service.id', '=', 'room_service.service_id')
            ->leftJoin('reservations', function ($join) use ($checkinDate, $checkoutDate) {
                $join->on('reservations.room_id', '=', 'rooms.id')
                    ->whereDate('reservations.checkin', '<=', $checkinDate)
                    ->whereDate('reservations.checkout', '>=', $checkoutDate);
            })
            ->where('rooms.availability', true)
            ->whereNull('reservations.id')
            ->where('rooms.room_type', $categoryId)
            ->groupBy('rooms.id')
            ->get();

        $roomsWithServices = [];

        foreach ($rooms as $room) {
            $roomId = $room->id;
            if (!isset($roomsWithServices[$roomId])) {
                $roomsWithServices[$roomId] = [
                    'room' => $room,
                    'services' => [],
                ];
            }

            $serviceIds = explode(',', $room->service_ids);
            $serviceNames = explode(',', $room->service_names);
            $serviceImages = explode(',', $room->service_images);

            foreach ($serviceIds as $index => $serviceId) {
                $service = [
                    'id' => $serviceId,
                    'name' => $serviceNames[$index],
                    'image' => $serviceImages[$index],
                ];
                $roomsWithServices[$roomId]['services'][] = $service;
            }
        }
        if ($roomsWithServices === []) {
            return view('responses.nodata');
        }

        // Instead of checking for empty $roomsWithServices, let the view handle this case

        return view('responses.filteredData', ['roomsWithServices' => $roomsWithServices]);
    }


    public function detail($id)
    {
        $room =  DB::table('rooms')
            ->select(
                'rooms.*',
                DB::raw('GROUP_CONCAT(service.id) AS service_ids'),
                DB::raw('GROUP_CONCAT(service.name) AS service_names'),
                DB::raw('GROUP_CONCAT(service.image) AS service_images')
            )
            ->join('room_service', 'rooms.id', '=', 'room_service.room_id')
            ->join('service', 'service.id', '=', 'room_service.service_id')
            ->leftJoin('reservations', function ($join) {
                $join->on('reservations.room_id', '=', 'rooms.id')
                    ->where(function ($query) {
                        $query->whereDate('reservations.checkin', '<=', now()) // Check-in date is today or before
                            ->whereDate('reservations.checkout', '>=', now()); // Checkout date is today or after
                    });
            })
            ->where('rooms.availability', true)
            ->whereNull('reservations.id')
            ->where('rooms.id', $id)
            ->groupBy('rooms.id')
            ->first();
        // dd($room);
        return view('front-office.detaill', compact('room'));
    }

    public function gallery()
    {
        $rooms = DB::table('rooms')->pluck('image');

        return view("front-office.gallery", compact('rooms'));
    }
    public function service()
    {
        $services = DB::table('service')->get();

        return view("front-office.service", compact('services'));
    }
}
