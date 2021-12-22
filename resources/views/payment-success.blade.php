@extends('layouts.app', ['title' => 'Payment Success'])

@section('content')
    <email-demo-modal></email-demo-modal>

    <div class="w-2/5 bg-blue-100 text-center rounded-2xl mx-auto mt-6 mb-16 py-16">
        <p>Thank you, <span class="font-semibold">{{ $customer->name }}</span>.</p>
        <p>Your payment is successful.</p>
        <p>We'll send an invoice to <span class="font-semibold">{{ $customer->email }}</span>.</p>

        <div class="flex justify-center mt-8">
            <a href="{{ route('home') }}" class="button">
                Buy More
            </a>
        </div>
    </div>
@endsection