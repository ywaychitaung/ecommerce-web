@extends('layouts.app', ['title' => 'Product'])

@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="w-1/2 mx-auto py-16">
        @csrf
        <x-input name="name" type="text" />
        
        <input type="file" name="image" id="image" accept="image/*" class="mb-4">
        
        <x-input name="price" type="text" />

        <div class="relative mb-4 space-y-2">
            <label for="description" class="text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" class="w-full rounded border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 h-32 outline-none text-gray-700 py-1 px-3 resize-none"></textarea>
        </div>

        <x-input name="category" type="text" />

        <button type="submit" class="button">Add</button>
    </form>
@endsection