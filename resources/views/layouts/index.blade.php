<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('components.styles.style')
    @include('components.scripts.scripts')
    <link rel="stylesheet" href="/css/app.css">

    <script>
        window.token = '{{ csrf_token() }}';
        window.getOrderInfo = "{{ route('GetOrderInfo', ['id' => 1]) }}";
    </script>

    <title>Printers</title>
</head>
<body>
        @include('components.header.header')
        @include('components.menu.menu')

        <div class="page_content">
            @yield('center')
        </div>

        @include('components.subscriptions.subscriptions')
        @include('layouts.footer')
</body>
