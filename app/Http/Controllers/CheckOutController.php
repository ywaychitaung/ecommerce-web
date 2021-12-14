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
            'success_url' => env('APP_URL').'/purchased',
            'cancel_url' => env('APP_URL').'/cart',
        ]);

        return redirect($checkout_session->url);
    }

    public function purchased()
    {
        Cart::destroy();

        return view('purchased');
    }
}