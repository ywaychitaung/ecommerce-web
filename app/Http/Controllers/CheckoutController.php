<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use Stripe;

use App\Mail\PaymentSuccess;
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
            'success_url' => env('APP_URL').'/payment-success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => env('APP_URL').'/cart',
        ]);

        return redirect($checkout_session->url);
    }

    public function paymentSuccess()
    {
        // Set Stripe API key
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // Get session_id from URL (e.g. http://example.com/purchased?session_id=cs_test_123)
        $session_id = request('session_id');

        // Retrieve the Checkout Session from Stripe
        $session = Stripe\Checkout\Session::retrieve($session_id);

        // Get the customer's data
        $customer = Stripe\Customer::retrieve($session->customer);

        // // Create invoice
        // Stripe\InvoiceItem::create([
        //     'customer' => $customer->id,
        //     'amount' => ($session->amount_total / 100),
        //     'currency' => 'usd',
        // ]);

        // // Get invoice
        // $invoice = Stripe\Invoice::create([
        //     'customer' => $customer->id
        // ]);

        $items = Cart::content();

        // Call PaymentSuccess Class and Pass customer & items data to it
        $mail = new PaymentSuccess;
        $mail->viewData['customer'] = $customer;
        $mail->viewData['items'] = $items;

        // Send invoice email to customer
        Mail::to($customer->email)->send($mail);

        Cart::destroy();

        return view('payment-success', compact('customer'));
    }
}