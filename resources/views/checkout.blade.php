@extends('layouts.app', ['title' => 'Checkout'])

@section('content')
    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight ml-16 my-16">Checkout</h1>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="flex flex-col md:flex-row md:justify-between m-16">
            <div class="w-full md:w-1/2">
                <div class="space-y-8">
                    <div class="flex items-center justify-between space-x-8">
                        <div class="w-1/2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
            
                        <div class="w-1/2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="text" name="email" id="email" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
        
                    <div class="w-full">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" name="address" id="address" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
    
                    <div class="flex items-center justify-between space-x-8">
                        <div class="w-1/2">
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <input type="text" name="country" id="country" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
    
                        <div class="w-1/2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" name="phone" id="phone" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>                    
                    </div>
    
                    <div class="w-full">
                        <label for="card_number" class="block text-sm font-medium text-gray-700">Card Number</label>
                        <input type="text" name="card_number" id="card_number" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
    
                    <div class="flex items-center justify-between space-x-8">
                        <div class="w-1/2">
                            <label for="expire_date" class="block text-sm font-medium text-gray-700">Expire Date</label>
                            <input type="text" name="expire_date" id="expire_date" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
    
                        <div class="w-1/2">
                            <label for="cvc" class="block text-sm font-medium text-gray-700">CVC</label>
                            <input type="text" name="cvc" id="cvc" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>                    
                    </div>
                </div>
            </div>
    
            <div class="h-80 w-full md:w-1/4 bg-gray-100 rounded-lg p-8">
                <p class="text-xl font-semibold mb-8">Order Summary</p>
    
                <div class="flex items-center justify-between mb-4">
                    <p class="text-gray-600">Subtotal</p>
                    <p class="font-medium text-gray-900">$ {{ Cart::subtotal() }}</p>
                </div>
    
                <div class="flex items-center justify-between mb-4">
                    <p class="text-gray-600">Tax (21%)</p>
                    <p class="font-medium text-gray-900">$ {{ Cart::tax() }}</p>
                </div>
    
                <hr class="border-gray-300 mb-4">
    
                <div class="flex items-center justify-between font-medium text-gray-900 mb-8">
                    <p>Total</p>
                    <p>$ {{ Cart::total() }}</p>
                </div>

                <button class="block text-center button w-full">Proceed Payment</button>
            </div>
        </div>
    </form>
@endsection