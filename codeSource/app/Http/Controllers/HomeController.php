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

class HomeController extends Controller
{


    public function index()
    {
        // $rooms = DB::table('rooms')
        //     ->select('rooms.*', 'service.id as service_id', 'service.name as service_name')
        //     ->join('room_service', 'room_service.room_id', '=', 'rooms.id')
        //     ->join('service', 'service.id', '=', 'room_service.service_id')
        //     ->where('rooms.availability', true)
        //     ->where('rooms.is_accepted', 'accepte')
        //     ->get();
        $rooms = DB::table('rooms')
            ->select('rooms.*', 'service.id as service_id', 'service.name as service_name', 'service.image as service_image')
            ->join('room_service', 'room_service.room_id', '=', 'rooms.id')
            ->join('service', 'service.id', '=', 'room_service.service_id')
            ->where('rooms.availability', true)
            ->where('rooms.is_accepted', 'accepte')
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

            if ($room->service_id) {
                $service = [
                    'id' => $room->service_id,
                    'name' => $room->service_name,
                    'image' => $room->service_image,
                ];
                $roomsWithServices[$roomId]['services'][] = $service;
            }
        }




        return view('test', compact('roomsWithServices'));
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


    // public function reserve(Request $request)
    // {
    //     $data = $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'room_id' => 'required|exists:rooms,id',
    //         'checkin' => 'required|date|after:now',
    //         'checkout' => 'required|date|after:checkin',
    //         'price' => 'required|numeric',
    //         'payment_token' => 'required', // Add payment_token to the validation
    //     ]);

    //     $room = Room::find($data['room_id']);
    //     if (!$room || !$room->availability) {
    //         return response()->json(['error' => 'Room not available or not found.'], 422);
    //     }

    //     $checkin = Carbon::parse($data['checkin']);
    //     $checkout = Carbon::parse($data['checkout']);
    //     $number_of_nights = $checkout->diffInDays($checkin);
    //     $total_price = $data['price'] * $number_of_nights;

    //     // Setup Stripe
    //     Stripe::setApiKey(config('services.stripe.secret'));

    //     // Create Stripe Charge
    //     try {
    //         $charge = \Stripe\Charge::create([
    //             'amount' => $total_price * 100, // amount in cents
    //             'currency' => 'usd',
    //             'source' => $data['payment_token'],
    //             'description' => 'Room Reservation Charge',
    //         ]);
    //     } catch (ApiErrorException $e) {
    //         return response()->json(['error' => 'Stripe payment failed: ' . $e->getMessage()], 500);
    //     }

    //     if ($charge->status !== 'succeeded') {
    //         return response()->json(['error' => 'Payment failed'], 500);
    //     }

    //     // If payment successful, proceed with creating reservation
    //     $reservation = Reservation::create([
    //         'user_id' => $data['user_id'],
    //         'room_id' => $room->id,
    //         'checkin' => $checkin,
    //         'checkout' => $checkout,
    //         'number_of_nights' => $number_of_nights,
    //         'total_price' => $total_price,
    //     ]);

    //     $room->update(['availability' => false]);

    //     $payment = Payment::create([
    //         'reservation_id' => $reservation->id,
    //         'amount' => $total_price,
    //         'is_paid' => true,
    //     ]);

    //     $ticket = Ticket::create([
    //         'payment_id' => $payment->id,
    //         'token' => Str::random(32),
    //     ]);

    //     $user = $reservation->user;

    //     Mail::to($user->email)->send(new ReservationTicket($user, $ticket, $reservation, $room));

    //     return response()->json(['message' => 'Reservation successful', 'charge_id' => $charge->id], 200);
    // }
}
