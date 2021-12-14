@extends('layouts.app', ['title' => 'Product'])

@section('content')
    <div class="lg:grid lg:grid-cols-2 m-16">
        <div class="h-5/6 w-5/6 mx-auto">
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
        </div>

        <div class="py-16">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $product->name }}</h1>

            <p class="text-xl text-gray-900 mt-3">${{ $product->price }}</p>

            <p class="text-gray-700 tracking-wide mt-6">{{ $product->description }}</p>

            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">

                <button class="button mt-12">Add to cart</button>
            </form>
        </div>
    </div>
@endsection