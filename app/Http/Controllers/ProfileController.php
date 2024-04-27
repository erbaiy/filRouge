<?php

namespace App\Http\Controllers;

use App\Mail\ReservationTicket;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\Room;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function index()
    {
        $userId = session("id");
        $user = User::join('role', 'role.id', '=', 'users.role_id')
            ->select('users.*', 'role.name as role_name')
            ->where('users.id', $userId)
            ->first();

        $reservations = Reservation::join('rooms', 'reservations.room_id', '=', 'rooms.id')
            ->select('rooms.id as roomID', 'reservations.*')
            ->where('reservations.user_id', $userId)
            ->where('status', 'active')
            ->paginate(4);

        return view('profile', compact('user', 'reservations'));
    }


    public function updateProfile(Request $request)
    {
        $id = session('id');

        $validatedData = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'phone' => 'nullable',
            'description' => 'nullable',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $uniqueFileName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img'), $uniqueFileName);

            // Delete the old image file
            if ($user->image) {
                $oldImagePath = public_path('assets/img') . '/' . $user->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $user->image = $uniqueFileName;
        }

        $user->email = $validatedData['email'];
        $user->name = $validatedData['name'];
        $user->mobileNumber = $validatedData['phone'];
        $user->description = $validatedData['description'];

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
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

    public function updateReservation(Request $request, $reservationId)
    {
        $data = $request->validate([
            'checkin' => 'required|date|after:now',
            'checkout' => 'required|date|after:checkin',
        ]);
        // Find the reservation
        $reservation = Reservation::findOrFail($reservationId);


        // Check if the room associated with the reservation is available
        $room = Room::find($reservation->room_id);
        if (!$room || !$room->availability) {

            return response()->json(['error' => 'Room not available or not found.'], 422);
        }

        // Check if the room is available for the selected dates
        $checkin = Carbon::parse($data['checkin']);
        $checkout = Carbon::parse($data['checkout']);
        if (!$room->isAvailableForBooking($checkin, $checkout, $reservationId)) {

            return redirect()->back()->with(['failed' => 'The room is not available for the selected dates.']);
        }

        // Calculate reservation details
        $number_of_nights = $checkout->diffInDays($checkin);
        $total_price = 213 * $number_of_nights;

        // Update reservation details
        $reservation->update([
            'checkin' => $checkin,
            'checkout' => $checkout,
            'number_of_nights' => $number_of_nights,
            'total_price' => $total_price,
        ]);


        // Find the payment associated with the reservation
        $payment = Payment::where('reservation_id', $reservation->id)->first();

        // Find the ticket associated with the payment
        $ticket = Ticket::where('payment_id', $payment->id)->first();

        // Retrieve the user associated with the reservation
        $user = $reservation->user;

        // Send email notification
        Mail::to($user->email)->send(new ReservationTicket($user, $ticket, $reservation, $room));

        return back()->with('success', 'Reservation updated successfully.');
    }
}
