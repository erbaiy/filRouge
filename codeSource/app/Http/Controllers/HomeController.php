<?php

namespace App\Http\Controllers;

use PDF;
use App\Mail\Mail as MailMail;
use App\Mail\TicketEmail;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Mail;
use Dompdf\Dompdf;

use Illuminate\Support\Str;


use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Exception\CardException;
use Symfony\Component\Mime\Email;

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
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
            'price' => 'required|numeric',
        ]);

        $checkin = Carbon::parse($data['checkin']);
        $checkout = Carbon::parse($data['checkout']);
        $number_of_nights = $checkout->diffInDays($checkin);

        $total_price = $data['price'] * $number_of_nights;

        $reservation = Reservation::create([
            'user_id' => $data['user_id'],
            'room_id' => $data['room_id'],
            'checkin' => $checkin,
            'checkout' => $checkout,
            'number_of_nights' => $number_of_nights,
            'total_price' => $total_price,
        ]);

        if (!$reservation) {
            return response()->json(['error' => 'An error occurred while creating the reservation.'], 500);
        }

        $room = Room::find($request->room_id);
        if (!$room) {
            return response()->json(['error' => 'Room not found.'], 404);
        }

        $room->availability = false;
        $room->save();

        $payment = Payment::create([
            "reservation_id" => $reservation->id,
            "amount" => $total_price,
            "is_paid" => true,
        ]);

        if (!$payment) {
            return response()->json(['error' => 'An error occurred while creating the payment.'], 500);
        }

        $ticket = Ticket::create([
            "payment_id" => $payment->id,
            "token" => Str::random(32),
        ]);

        if (!$ticket) {
            return response()->json(['error' => 'An error occurred while creating the ticket.'], 500);
        }

        $user = User::find($reservation->user_id);

        // Generate the PDF ticket
        $html = view('emails.ticket', compact('ticket'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $pdfContents = $dompdf->output();

        // Send the ticket via email
        $emailData = [
            'user' => $user,
            'ticket' => $ticket,
        ];

        Mail::to($user->email)->send(new TicketEmail($emailData, $pdfContents));

        return response()->json(['success' => 'Reservation created and ticket sent.']);
    }
}
