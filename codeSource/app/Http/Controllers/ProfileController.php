<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = session("id");
        $user = User::where('id', $user_id)->first(); // `first()` to get single user
        $reservations = Reservation::join('rooms', 'reservations.room_id', '=', 'rooms.id')
            ->select('rooms.id as roomID', 'reservations.*')
            ->where('reservations.user_id', '=', $user_id)
            ->paginate(4);


        // dd($reservations);
        return view('profile', compact('user', 'reservations'));
    }
    public function annulerReservation(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        // dd($id);

        if ($reservation) {

            $reservation->is_annuller = true;
            $status = $reservation->save();
            if (!$status) {
                dd('An error occurred');
            }
            dd('ok');
        }
        return redirect()->back();
    }
}
