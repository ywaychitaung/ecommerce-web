@extends('layouts.app', ['title' => 'Cart'])

@section('content')
    <cart-demo-modal></cart-demo-modal>

    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight ml-16 my-16">Cart</h1>

    @if (Cart::count() > 0)
        <div class="flex flex-col md:flex-row m-16">
            <div class="w-full md:w-3/4">
                <div class="flex flex-col mr-16">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Price
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Quantity
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Total
                                            </th>

                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Remove</span>
                                            </th>
                                        </tr>
                                    </thead>

                                    @foreach (Cart::content() as $item)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center space-x-4">
                                                        <img class="h-16 w-16" src="{{ $item->options->image }}" alt="{{ $item->name }}" />
                                                        <p class="text-sm font-medium text-gray-900">{{ $item->name }}</p>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <p class="text-sm text-gray-900">${{ $item->price }}</p>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center justify-between">
                                                        <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <input type="hidden" name="action" value="increment">
                                                            <input type="hidden" name="quantity" value="{{ $item->qty }}">

                                                            <button type="submit">+</button>
                                                        </form>

                                                        <p class="text-sm text-gray-900">{{ $item->qty }}</p>

                                                        <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <input type="hidden" name="action" value="decrement">
                                                            <input type="hidden" name="quantity" value="{{ $item->qty }}">

                                                            <button type="submit">-</button>
                                                        </form>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <p class="text-sm text-gray-900">${{ $item->subtotal }}</p>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="apperance-none outline-none text-red-600 hover:text-red-900">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-64 w-full md:w-1/4 bg-gray-100 rounded-lg p-8">
                <p class="text-xl font-semibold mb-8">Order Summary</p>

                {{-- <div class="flex items-center justify-between mb-4">
                    <p class="text-gray-600">Subtotal</p>
                    <p class="font-medium text-gray-900">$ {{ Cart::subtotal() }}</p>
                </div> --}}

                {{-- <div class="flex items-center justify-between mb-4">
                    <p class="text-gray-600">Tax (21%)</p>
                    <p class="font-medium text-gray-900">$ {{ Cart::tax() }}</p>
                </div> --}}

                <hr class="border-gray-300 mb-4">

                <div class="flex items-center justify-between font-medium text-gray-900 mb-8">
                    <p>Total</p>
                    <p>$ {{ Cart::subtotal() }}</p>
                </div>

                <proceed-payment-demo-modal></proceed-payment-demo-modal>
            </div>
        </div>
    @else
        <h2 class="text-xl text-center mb-16">You don't have any items in your cart.</h2>

        <div class="flex justify-center mb-16">
            <a href="{{ route('home') }}" class="button">
                Start Shopping
            </a>
        </div>
    @endif
@endsection