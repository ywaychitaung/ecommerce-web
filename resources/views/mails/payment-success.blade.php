@extends('layouts.mail')

@section('content')
    <p>Hello, {{ $customer->name }}</p>
    <p>Here is your receipt.</p>
   
    <br />
    @foreach ($items as $item)
        <p>Product Name: {{ $item->name }}</p>
        <p>Price: $ {{ $item->price }}</p>
        <p>Quantity: {{ $item->qty }}</p>
    @endforeach
    <br />

    <p>Total: $ {{ $item->subtotal }}</p>
@endsection