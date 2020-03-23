<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/js/vendors/swiper/swiper.min.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    @extends('layouts.index')
    @section('center')
        @include('components.hits.hits')
    @endsection
</body>
</html>
