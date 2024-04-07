<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Room;
use Carbon\Carbon;
use Exception;
use Stripe\Charge;
use Stripe\Stripe;

use Stripe\Exception\CardException;

class HomeController extends Controller
{
    public function index()
    {

        $rooms = Room::where('availability', '1')->where('is_accepted', 'accepte')->get();
        // dd($rooms);
        return view('test', compact('rooms'));
    }

    // public function reserve(Request $request)
    // {
    //     // Validating the request data
    //     $data = $request->validate([
    //         'user_id' => 'required',
    //         'room_id' => 'required',
    //         'checkin' => 'required|date',
    //         'checkout' => 'required|date|after:checkin',
    //         'price' => 'required|numeric',
    //         'token' => 'required', // Payment token from the client-side (e.g., Stripe token)
    //     ]);

    //     // Parsing check-in and check-out dates
    //     $checkin = Carbon::parse($data['checkin']);
    //     $checkout = Carbon::parse($data['checkout']);
    //     $number_of_nights = $checkout->diffInDays($checkin);

    //     // Calculating the total price
    //     $total_price = $data['price'] * $number_of_nights;

    //     // Creating the reservation record
    //     $reservation = Reservation::create([
    //         "user_id" => $data["user_id"],
    //         "room_id" => $data["room_id"],
    //         "checkin" => $checkin,
    //         "checkout" => $checkout,
    //         "number_of_nights" => $number_of_nights,
    //         "total_price" => $total_price,
    //     ]);

    //     if (!$reservation) {
    //         dd("reservation not created");
    //         return back()->with('error', 'An error occurred while creating the reservation.');
    //     }

    //     // Process payment with Stripe
    //     try {
    //         // Set your Stripe API key
    //         Stripe::setApiKey(config('services.stripe.secret'));

    //         // Charge the payment using the payment token
    //         Charge::create([
    //             'amount' => $total_price * 100, // Stripe requires the amount in cents
    //             'currency' => 'usd',
    //             'source' => $request->stripeToken,
    //             'description' => 'Test Payment',
    //         ]);

    //         // Update payment status in the database
    //         Payment::create([
    //             'reservation_id' => $reservation->id,
    //             'amount' => $total_price,
    //             'is_paid' => true,
    //         ]);
    //     } catch (\Exception $e) {
    //         // Handle payment error
    //         dd($e);
    //         $reservation->delete(); // Rollback the reservation creation

    //         return back()->with('error', 'Payment failed. Please try again.');
    //     }

    //     // Updating room availability
    //     $room = Room::find($request->room_id);
    //     if ($room) {
    //         $room->availability = false;
    //         $room->save();
    //     } else {
    //         // Handle potential room not found scenario (log or display an error)
    //     }

    //     return back()->with('success', 'Reservation created successfully!');
    // }

    // public function reserve(Request $request)
    // {
    //     $data = $request->validate([
    //         'user_id' => 'required',
    //         'room_id' => 'required',
    //         'checkin' => 'required|date',
    //         'checkout' => 'required|date|after:checkin',
    //         'price' => 'required|numeric',
    //     ]);

    //     $checkin = Carbon::parse($data['checkin']);
    //     $checkout = Carbon::parse($data['checkout']);
    //     $number_of_nights = $checkout->diffInDays($checkin);

    //     $total_price = $data['price'] * $number_of_nights;

    //     $reservation = Reservation::create([
    //         "user_id" => $data["user_id"],
    //         "room_id" => $data["room_id"],
    //         "checkin" => $checkin,
    //         "checkout" => $checkout,
    //         "number_of_nights" => $number_of_nights,
    //         "total_price" => $total_price,
    //     ]);

    //     if (!$reservation) {
    //         return back()->with('error', 'An error occurred while creating the reservation.');
    //     }

    //     // Update room availability using Eloquent (assuming a boolean 'availability' field)
    //     $room = Room::find($request->room_id);
    //     if ($room) {
    //         $room->availability = false;
    //         $room->save();

    //         Stripe::setApiKey(env('STRIPE_SECRET'));
    //         $token = $request->input('stripeToken');
    //         // dd($token);
    //         try {
    //             $charge = Charge::create([
    //                 'amount' => $total_price * 100, // Stripe requires the amount in cents
    //                 'currency' => 'usd',
    //                 'source' => $token,
    //                 'description' => 'Reservation Payment',
    //             ]);
    //             // Check if the charge was successful
    //             if ($charge->status === 'succeeded') {
    //                 return back()->with('success', 'Reservation created successfully!');
    //             } else {
    //                 // Handle failed charge, log or display an error
    //                 return back()->with('error', 'Payment failed. Please try again.');
    //             }
    //         } catch (Exception $e) {
    //             dd($e);
    //             // Handle exceptions, log or display an error
    //             return back()->with('error', 'An error occurred while processing the payment.');
    //         }
    //     }
    // }

    public function reserve(Request $request)
    {
        // dd($request);
        // dd($request->token, $request->user_id);
        $data = $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            // 'checkin' => 'required|date',
            // 'checkout' => 'required|date|after:checkin',
            'price' => 'required|numeric',
            'token' => 'required', // Add this validation rule
        ]);


        // $checkin = Carbon::parse($data['checkin']);
        // $checkout = Carbon::parse($data['checkout']);
        // $number_of_nights = $checkout->diffInDays($checkin);

        // $total_price = $data['price'] * $number_of_nights;

        $reservation = Reservation::create([
            "user_id" => $data["user_id"],
            "room_id" => $data["room_id"],
            "checkin" => '2024-04-06 14:30:00',
            "checkout" => '2025-04-06 14:30:00',
            "number_of_nights" => 3,
            "total_price" => 234,
        ]);

        if (!$reservation) {
            return response()->json(['error' => 'An error occurred while creating the reservation.'], 500);
        }

        // Update room availability using Eloquent (assuming a boolean 'availability' field)
        $room = Room::find($request->room_id);
        if ($room) {
            $room->availability = false;
            $room->save();

            try {
                Stripe::setApiKey(env('STRIPE_SECRET'));
                $charge = \Stripe\Charge::create([
                    'amount' => 100 * 100, // Stripe requires the amount in cents
                    'currency' => 'usd',
                    'source' => $data['token'],
                    'description' => 'Reservation Payment',
                ]);

                // Check if the charge was successful
                if ($charge->status === 'succeeded') {
                    dd("Charge succeeded");
                    return response()->json(['messag    e' => 'Reservation created successfully']);
                } else {
                    dd("Charge failed");
                    // Handle failed charge, log or display an error
                    return response()->json(['error' => 'Payment failed. Please try again.'], 400);
                }
            } catch (CardException $e) {
                // Handle card error (e.g., declined card)
                return response()->json(['error' => $e->getMessage()], 400);
            } catch (\Exception $e) {
                // Handle other exceptions
                return response()->json(['error' => 'An error occurred while processing the payment.'], 500);
            }
        } else {
            return response()->json(['error' => 'Room not found.'], 404);
        }
    }





    public function generateTicket()
    {
    }
}
