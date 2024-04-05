<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Room;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {

        $rooms = Room::where('availability', '1')->where('is_accepted', 'accepte')->get();
        // dd($rooms);
        return view('test', compact('rooms'));
    }
    public function reserve(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'price' => 'required',
        ]);


        $checkin = Carbon::parse($data['checkin']);
        $checkout = Carbon::parse($data['checkout']);
        $number_of_nights = $checkout->diffInDays($checkin);

        // Assuming you have the room's price available in the $data array
        $total_price = $data['price'] * $number_of_nights;

        Reservation::create([
            "user_id" => $data["user_id"],
            "room_id" => $data["room_id"],
            "checkin" => $checkin,
            "checkout" => $checkout,
            "number_of_nights" => $number_of_nights,
            "total_price" => $total_price,
        ]);

        return back()->with('success', 'Reservation created successfully');
    }
}
