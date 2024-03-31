<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
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
