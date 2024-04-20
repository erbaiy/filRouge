<?php

namespace App\Http\Controllers;

use App\Models\{User, Room, Reservation, Payment, Service, Ticket};
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationTicket;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Illuminate\Support\Facades\DB;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Validator;
use Stripe\Charge;
use Illuminate\Validation\Rule;



class HomeController extends Controller
{



    // $rooms = DB::table('rooms')
    //     ->select('rooms.*', 'service.id as service_id', 'service.name as service_name', 'service.image as service_image')
    //     ->join('room_service', 'room_service.room_id', '=', 'rooms.id')
    //     ->join('service', 'service.id', '=', 'room_service.service_id')
    //     ->where('rooms.availability', true)
    //     ->where('rooms.is_accepted', 'accepte')
    //     ->get();
    // $rooms = DB::table('rooms')
    //     ->select('rooms.*', DB::raw('ANY_VALUE(service.id) as service_id'), DB::raw('ANY_VALUE(service.name) as service_name'), DB::raw('ANY_VALUE(service.image) as service_image'))
    //     ->join('room_service', 'rooms.id', '=', 'room_service.room_id')
    //     ->join('service', 'service.id', '=', 'room_service.service_id')
    //     ->leftJoin('reservations', function ($join) {
    //         $join->on('reservations.room_id', '=', 'rooms.id')
    //             ->whereDate('reservations.checkin', '>=', DB::raw('CURDATE()'));
    //     })
    //     ->where('rooms.availability', true)
    //     ->whereNull('reservations.id')
    //     // ->where('rooms.room_type', 'double')
    //     ->groupBy('rooms.id')
    //     ->get();
    // public function index()
    // {
    //     $rooms = DB::table('rooms')
    //         ->select(
    //             'rooms.*',
    //             DB::raw('GROUP_CONCAT(service.id) AS service_ids'),
    //             DB::raw('GROUP_CONCAT(service.name) AS service_names'),
    //             DB::raw('GROUP_CONCAT(service.image) AS service_images')
    //         )

    //         ->join('room_service', 'rooms.id', '=', 'room_service.room_id')
    //         ->join('service', 'service.id', '=', 'room_service.service_id')
    //         ->leftJoin('reservations', function ($join) {
    //             $join->on('reservations.room_id', '=', 'rooms.id')
    //                 ->whereDate('reservations.checkin', '>=', DB::raw('CURDATE()'));
    //         })
    //         ->where('rooms.availability', true)
    //         ->whereNull('reservations.id')
    //         // ->where('rooms.room_type', 'double')
    //         ->groupBy('rooms.id')
    //         ->get();
    //     // Organize the rooms and services into a nested array
    //     $roomsWithServices = [];
    //     foreach ($rooms as $room) {
    //         $roomId = $room->id;
    //         if (!isset($roomsWithServices[$roomId])) {
    //             $roomsWithServices[$roomId] = [
    //                 'room' => $room,
    //                 'services' => [],
    //             ];
    //         }

    //         if ($room->service_id) {
    //             $service = [
    //                 'id' => $room->service_id,
    //                 'name' => $room->service_name,
    //                 'image' => $room->service_image,
    //             ];
    //             $roomsWithServices[$roomId]['services'][] = $service;
    //         }
    //     }




    //     return view('test', compact('roomsWithServices'));
    // }

    public function index()
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


        return view('test', compact('roomsWithServices'));
    }






    // public function reserve(Request $request)
    // {
    //     dd($request->stripeToken);
    //     // Validate the request data
    //     $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'room_id' => 'required|exists:rooms,id',
    //         'checkin' => 'required|date|after:now',
    //         'checkout' => 'required|date|after:checkin',
    //         'price' => 'required|numeric',
    //         'cardNumber' => 'required|string',
    //         'expiryDate' => ['required', 'regex:/^\d{2}\/\d{2}$/'], // Custom validation for m/y format
    //         'cvv' => 'required|numeric',
    //     ]);

    //     // Set your Stripe secret key
    //     Stripe::setApiKey(env('STRIPE_SECRET'));

    //     try {
    //         // Create a charge
    //         $charge = Charge::create([
    //             'amount' => $request->price * 100, // Amount in cents
    //             'currency' => 'usd',
    //             'source' => $request->stripeToken, // Payment source obtained from the frontend form
    //             'description' => 'Room Reservation',
    //         ]);

    //         // Handle successful charge creation
    //         if ($charge->status === 'succeeded') {
    //             // Create a reservation, update room availability, etc.
    //             // (Remaining code for reservation creation unchanged)

    //             // Return success response
    //             return response()->json(['success' => true]);
    //         } else {
    //             return response()->json(['error' => 'Payment failed.']);
    //         }
    //     } catch (\Exception $e) {
    //         // Handle payment creation error
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }






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
        // $room->availability = false;
        // $room->update();

        $checkin = Carbon::parse($data['checkin']);
        $checkout = Carbon::parse($data['checkout']);
        $number_of_nights = $checkout->diffInDays($checkin);
        $total_price = $data['price'] * $number_of_nights;

        $reservation = Reservation::create([
            'user_id' => $data['user_id'],
            'room_id' => $room->id,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'number_of_nights' => $number_of_nights,
            'total_price' => $total_price,
        ]);

        $room->update(['availability' => false]);

        $payment = Payment::create([
            'reservation_id' => $reservation->id,
            'amount' => $total_price,
            'is_paid' => true,
        ]);

        $ticket = Ticket::create([
            'payment_id' => $payment->id,
            'token' => Str::random(32),
        ]);

        $user = $reservation->user;

        Mail::to($user->email)->send(new ReservationTicket($user, $ticket, $reservation, $room));

        return back()
            ->with('success', 'Reservation created successfully.');
    }


    // $rooms = DB::table('rooms')
    //     ->select('rooms.*', 'service.id as service_id', 'service.name as service_name', 'service.image as service_image')
    //     ->join('room_service', 'room_service.room_id', '=', 'rooms.id')
    //     ->join('service', 'service.id', '=', 'room_service.service_id')
    //     ->where('rooms.availability', true)
    //     ->where('rooms.is_accepted', 'accepte')
    //     ->where('rooms.room_type', $categoryId)
    //     ->get();
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
            ->leftJoin('reservations', 'reservations.room_id', '=', 'rooms.id')
            ->where('rooms.room_type', $categoryId)
            ->where(function ($query) use ($checkinDate, $checkoutDate) {
                $query->whereNull('reservations.checkin')
                    ->orWhere(function ($query) use ($checkinDate, $checkoutDate) {
                        $query->where('reservations.checkout', '<=', $checkinDate)
                            ->orWhere('reservations.checkin', '>=', $checkoutDate);
                    })
                    ->orWhere(function ($query) use ($checkinDate, $checkoutDate) {
                        $query->where('reservations.checkin', '<', $checkinDate)
                            ->where('reservations.checkout', '>', $checkoutDate);
                    });
            })
            ->where('rooms.availability', true)
            ->groupBy('rooms.id')
            ->get();



        // Organize the rooms and services into a nested array
        $roomsWithServices = [];
        foreach ($rooms as $room) {
            $roomId = $room->id;
            if (!isset($roomsWithServices[$roomId])) {
                $roomsWithServices[$roomId] = [
                    'room' => $room,
                    'services' => [],
                ];
            }
            if ($room->service_ids) {
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
        }

        if (empty($roomsWithServices)) {
            return "<h1>No rooms available at this time.</h1>"; // Security risk if not sanitized!
        }

        return view('filteredData', ['roomsWithServices' => $roomsWithServices]);
    }

    // public function filterRooms($categoryId, $checkinDate, $checkoutDate)
    // {
    //     // dd($categoryId, $checkinDate, $checkoutDate);
    //     $rooms = DB::table('rooms')
    //         ->select(
    //             'rooms.*',
    //             'reservations.*',
    //             DB::raw('GROUP_CONCAT(service.id) AS service_ids'),
    //             DB::raw('GROUP_CONCAT(service.name) AS service_names'),
    //             DB::raw('GROUP_CONCAT(service.image) AS service_images')
    //         )
    //         ->join('room_service', 'room_service.room_id', '=', 'rooms.id')
    //         ->join('service', 'service.id', '=', 'room_service.service_id')
    //         ->leftJoin('reservations', function ($join) use ($checkinDate, $checkoutDate) {
    //             $join->on('reservations.room_id', '=', 'rooms.id')
    //                 ->where('reservations.checkin', '>=', $checkinDate)
    //                 ->where('reservations.checkout', '<=', $checkoutDate);
    //         })
    //         ->where('rooms.room_type', 'double')
    //         ->where('rooms.availability', true)
    //         ->groupBy('rooms.id', 'reservations.id', 'reservations.checkin', 'reservations.checkout')
    //         ->get();
    //     // dd($rooms);

    //     // dd($rooms);
    //     // Organize the rooms and services into a nested array
    //     $roomsWithServices = [];
    //     foreach ($rooms as $room) {
    //         $roomId = $room->id;
    //         if (!isset($roomsWithServices[$roomId])) {
    //             $roomsWithServices[$roomId] = [
    //                 'room' => $room,
    //                 'services' => [],
    //             ];
    //         }
    //         if ($room->service_ids) {
    //             $serviceIds = explode(',', $room->service_ids);
    //             $serviceNames = explode(',', $room->service_names);
    //             $serviceImages = explode(',', $room->service_images);
    //             foreach ($serviceIds as $key => $serviceId) {
    //                 $service = [
    //                     'id' => $serviceId,
    //                     'name' => $serviceNames[$key],
    //                     'image' => $serviceImages[$key],
    //                 ];
    //                 $roomsWithServices[$roomId]['services'][] = $service;
    //             }
    //         }
    //     }



    //     if (empty($roomsWithServices)) {
    //         return "<h1>No rooms available at this time.</h1>"; // Security risk if not sanitized!
    //     }

    //     // dd($roomsWithServices);
    //     return view('filteredData', compact('roomsWithServices'));
    // }




    //     select rooms.*,reservations.*,
    // GROUP_CONCAT(service.id) AS service_ids,
    // GROUP_CONCAT(service.name) AS service_names,
    // GROUP_CONCAT(service.image) AS service_images
    // FROM rooms
    // INNER JOIN room_service ON rooms.id=room_service.room_id 
    // INNER JOIN service on service.id=room_service.service_id
    // LEFT JOIN reservations on reservations.room_id=rooms.id 
    // WHERE reservations.checkin is null or  reservations.checkin AND reservations.checkout BETWEEN "2024-05-06 00:00:00
    // " AND "2024-05-10 00:00:00"

    // GROUP by reservations.id,rooms.id

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
        return view('detaill', compact('room'));
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
