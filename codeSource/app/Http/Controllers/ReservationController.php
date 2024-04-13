<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::select('*')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
            ->where('reservations.status', '=', 'pending')
            ->where('rooms.type_accept', '=', 'manuelle')
            ->get();

        return view('back-office.reservation', compact('reservations'));
    }
    public function reserve(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'number_of_nights' => 'required',
            'total_price' => 'required',
        ]);
        $reservation = Reservation::create($data);
    }
}
