<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Log;

class PriceController extends Controller
{
    
    public function payment(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'plan' => 'required|string',
            'amount' => 'required|integer|min:1',
            'stripeToken' => 'required|string'
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create a PaymentIntent
            $paymentIntent = PaymentIntent::create([
                'amount' => $request->amount * 100, // Convert to cents
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'description' => 'Payment for ' . $request->plan,
            ]);

            // Insert the payment details into the database
            Price::create([
                'name' => $request->name,
                'email' => $request->email,
                'plan' => $request->plan,
                'amount' => $request->amount,
            ]);

            return redirect()->back()->with('success', 'Payment successful!');

        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Payment failed! ' . $e->getMessage());
        }
    }

    public function subscribers()
    {
        $subscribers = Price::all();
        return view('plans.list', compact('subscribers'));
    }

    public function destroy($id)
    {
        $subscriber = Price::findOrFail($id);
        $subscriber->delete();
        return redirect()->route('subscribers')->with('success', 'Subscriber deleted successfully!');
    }
}

