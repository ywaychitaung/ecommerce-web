<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- CSS -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div id="app">
            @include('layouts._header')
            
            @yield('content')

            @include('layouts._footer')
        </div>

        <!-- JS -->
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
