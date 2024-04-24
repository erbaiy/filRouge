<?php

// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function process(Request $request)
    {
        dd($request->_token);
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => 'Example Product',
                            ],
                            'unit_amount' => 1000, // in cents
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('auth_getRogister'),
                'cancel_url' => route('auth_getLogin'),
            ]);

            return redirect($session->url);
        } catch (\Exception $e) {
            // Handle payment failure
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function success()
    {
        // Handle successful payment
        return redirect()->back()->with('success', 'Payment successful!');
    }

    public function cancel()
    {
        // Handle canceled payment
        return redirect()->back()->with('error', 'Payment canceled.');
    }
}
