<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('components.styles.style')
    @include('components.scripts.scripts')
    <link rel="stylesheet" href="/css/app.css">
    <title>Printers</title>
</head>
<body>

<script>
    window.token = '{{ csrf_token() }}';
    window.getOrderInfo = "{{ route('GetOrderInfo', ['id' => 1]) }}";
</script>

@include('components.header.header')

@include('components.menu.menu')

@include('components.breadcrumbs.breadcrumbs',
      ['crumbs' =>[['title' => 'Главная','url' => '/'],
      ['title' => 'Профиль', 'url' => '/home'],
      ['title' => 'Заказы','url' => '/tracking']]]
      )

<div class="dash">
    <div class="dash_left">
        <div class="dash_left-wrap">
            <div class="dash_left-wrap_item dash_active">
                <a class="dash_left-wrap_item-text" href="{{ route('home') }}">
                    <span>Dashboard</span>
                </a>
                <div class="dash_left-wrap_item-icon" style="background-image: url('/images/dash/dash_user.svg')"></div>
            </div>

            <div class="dash_left-wrap_item">
                <a class="dash_left-wrap_item-text" href="{{ route('displayUserOrders') }}">
                    <span>Заказы</span>
                </a>
                <div class="dash_left-wrap_item-icon" style="background-image: url('/images/dash/dash_orders.svg')"></div>
            </div>

            <div class="dash_left-wrap_item">
                <a class="dash_left-wrap_item-text" href="{{ route('fillAdresses') }}">
                    <span>Адреса</span>
                </a>
                <div class="dash_left-wrap_item-icon" style="background-image: url('/images/dash/dash_addr.svg')"></div>
            </div>

            <div class="dash_left-wrap_item">
                <a class="dash_left-wrap_item-text"  href="{{ route('fillProfile') }}">
                    <span>Заполнить аккаунт</span>
                </a>
                <div class="dash_left-wrap_item-icon" style="background-image: url('/images/dash/dash_fill.svg')"></div>
            </div>

            <div class="dash_left-wrap_item dash_logout">
                <a href="{{ route('logout') }}" class="dash_left-wrap_item-text">
                    <span>Выйти</span>
                </a>
            </div>

        </div>
    </div>

    @yield('center')

</div>

@include('components.subscriptions.subscriptions')
@include('layouts.footer')
{{--@include('alert.success_cart');--}}
</body>
