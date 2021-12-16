<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

use Gloudemans\Shoppingcart\Facades\Cart;

class CheckOutController extends Controller
{
    public function checkout()
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $products = [];

        foreach (Cart::content() as $item) {
            array_push($products, [
                'name' => $item->name,
                'images' => [$item->options->image],
                'currency' => 'usd',
                'amount' => $item->price * 100,
                'quantity' => $item->qty
            ]);
        }

        $checkout_session = Stripe\Checkout\Session::create([
            'line_items' => [[ $products ]],
            'mode' => 'payment',
            'success_url' => env('APP_URL').'/purchased?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => env('APP_URL').'/cart',
        ]);

        return redirect($checkout_session->url);
    }

    public function purchased()
    {
        Cart::destroy();

        // Set Stripe API key
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // Get session_id from URL (e.g. http://example.com/purchased?session_id=cs_test_123)
        $session_id = request('session_id');

        // Retrieve the Checkout Session
        $session = Stripe\Checkout\Session::retrieve($session_id);

        // Get the customer's data from the session
        $customer = Stripe\Customer::retrieve($session->customer);

        return view('purchased', compact('customer'));
    }
}