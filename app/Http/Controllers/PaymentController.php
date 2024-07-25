<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                'amount' => $request->amount,
                'currency' => 'usd',
                'description' => 'Payment for ' . $request->product_name,
                'source' => $request->stripeToken,
            ]);
            return redirect()->route('products.index')->with('success', 'Payment successful!');

        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Payment failed. Please try again.');
        }   
    }
}
