<?php

namespace App\Http\Controllers;

use App\Models\{User, Room, Reservation, Payment, Ticket};
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationTicket;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::where('availability', true)->where('is_accepted', 'accepte')->get();
        return view('test', compact('rooms'));
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

        return response()->json(['message' => 'Reservation successful'], 200);
    }
}
