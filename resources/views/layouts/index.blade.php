<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Printers</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>

        @include('layouts.header')
        @include('components.menu.menu')

        <div class="page_content">
             @yield('center')
        </div>

        @include('components.subscriptions.subscriptions')
        @include('layouts.footer')
    {{--@include('alert.success_cart');--}}
</body>