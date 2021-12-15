@extends('layouts.app', ['title' => 'Home'])

@section('content')
    <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-x-6 xl:gap-x-8 gap-y-10">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product->id) }}">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-24 w-24 hover:opacity-75 mx-auto md:mx-0">

                    <h3 class="mt-4 text-sm text-gray-700 text-center md:text-left">
                        {{ $product->name }}
                    </h3>

                    <p class="mt-1 text-lg font-semibold text-gray-900 text-center md:text-left">
                        ${{ $product->price }}
                    </p>
                </a>
            @endforeach
        </div>
    </div>

    {{-- <div class="flex items-center">
        <!-- icons8: Clothes (iOS Glyph) -->
        <svg class="h-10 w-10 text-gray-500 opacity-50" fill="currentColor" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
            <path d="M 9.484375 4 C 7.893375 4 6.3671875 4.6328125 5.2421875 5.7578125 L 1.2929688 9.7070312 C 0.90196875 10.098031 0.90196875 10.731094 1.2929688 11.121094 L 3.8789062 13.707031 C 4.2699063 14.098031 4.9029687 14.098031 5.2929688 13.707031 L 7 12 L 7 24 C 7 25.105 7.895 26 9 26 L 15 26 L 21 26 C 22.105 26 23 25.105 23 24 L 23 12 L 24.707031 13.707031 C 25.098031 14.098031 25.731094 14.098031 26.121094 13.707031 L 28.707031 11.121094 C 29.098031 10.731094 29.098031 10.098031 28.707031 9.7070312 L 24.757812 5.7578125 C 23.632812 4.6328125 22.106625 4 20.515625 4 L 20 4 L 19 4 L 11 4 L 10 4 L 9.484375 4 z M 11.751953 6 L 18.248047 6 C 17.664172 7 16.6645 8 15 8 C 13.3355 8 12.335828 7 11.751953 6 z"/>
        </svg>

        <!-- icons8: Footwear (iOS Glyph) -->
        <svg class="h-10 w-10 text-gray-500 opacity-50" fill="currentColor" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
            <path d="M 12.03125 6.9863281 A 1.0001 1.0001 0 0 0 10.998047 8.0292969 C 10.990499 9.0377148 10.543645 11 6 11 C 2 11 2.9995781 9 0.64257812 9 C 0.64257813 9 7.4014868e-17 11.671 0 14 C 0 16.329 0.64257812 18 0.64257812 18 L 7 18 C 9.0967347 18 10.698421 18.906035 12.029297 21.287109 A 1.0001 1.0001 0 0 0 13 22 L 29 22 A 1.0001 1.0001 0 0 0 29.935547 20.613281 C 29.717286 19.476739 28.605825 15.964821 23 15 C 20.280437 14.532043 18.081136 13.651379 16.339844 12.669922 C 13.857495 10.96158 12.96875 7.7519531 12.96875 7.7519531 A 1.0001 1.0001 0 0 0 12.03125 6.9863281 z M 2 20 A 1.0001 1.0001 0 1 0 2 22 L 8 22 A 1.0001 1.0001 0 1 0 8 20 L 2 20 z"/>
        </svg>
    </div> --}}
@endsection