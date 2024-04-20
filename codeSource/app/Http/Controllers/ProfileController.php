<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = session("id");
        $user = User::where('id', $user_id)->first(); // `first()` to get single user
        $reservations = Reservation::join('rooms', 'reservations.room_id', '=', 'rooms.id')
            ->select('rooms.id as roomID', 'reservations.*')
            ->where('reservations.user_id', '=', $user_id)
            ->where('status', '=', 'active')
            ->paginate(4);
        // dd($user);


        // dd($reservations);
        return view('profile', compact('user', 'reservations'));
    }
    public function annulerReservation(Request $request, $id)
    {
        // Begin transaction to ensure data integrity
        DB::beginTransaction();

        try {
            $reservation = Reservation::find($id);
            if (!$reservation) {
                return redirect()->back()->with('error', 'Reservation not found.');
            }

            if ($reservation->status !== 'active') {
                return redirect()->back()->with('error', 'Reservation cannot be cancelled.');
            }

            // Update the reservation status to 'cancelled'
            $reservation->status = 'cancelled';
            $reservation->save();

            // Update the payment status to 'refunded' if payment exists
            $payment = Payment::where('reservation_id', $id)->first();
            if ($payment) {
                // dd('dhslhdf');
                $payment->update(['status' => "refunded"]);


                // Update all related tickets to 'cancelled'
                Ticket::where('payment_id', $payment->id)->update(['status' => 'cancelled']);
            }

            // Commit the changes if all operations were successful
            DB::commit();

            return redirect()->back()->with('success', 'Reservation cancelled successfully.');
        } catch (\Exception $e) {

            // Rollback all changes in case of an error
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while cancelling the reservation.');
        }
    }
}
