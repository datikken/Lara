<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Printers</title>
    @include('components.styles.style')
    @include('components.scripts.scripts')

    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
@extends('layouts.index')

<div class="page_content">
    @section('center')
        @include('components.product_details.products_details-item', ['product' => $product ]);
    @endsection
</div>

</body>
</html>
