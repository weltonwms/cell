<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='shortcut icon' type='image/x-icon' href='{{ asset('imgs/favicon.ico') }}' />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

       @include('layouts.styles')
       @include('layouts.scripts')

    </head>
    <body>
        <div id="app">

            @yield('navbar')

            @yield('content')
        </div> <!--fim div app-->
@stack('scripts')
    </body>
</html>