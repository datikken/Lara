<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">

@include('layouts.header')
@include('components.menu.menu')

<div class="cart">
    <div class="cart_wrap">
        <div class="cart_wrap-crumb active">
            <div class="active-item"></div>

            <div class="cart_wrap-crumb-item">
                <span>Ваша корзина</span>
            </div>
            <div class="cart_wrap-crumb-item">
                <span>Авторизация</span>
            </div>
            <div class="cart_wrap-crumb-item">
                <span>Доставка</span>
            </div>
            <div class="cart_wrap-crumb-item">
                <span>Оплата</span>
            </div>
        </div>

        @yield('center')

{{--@include('alert.success_cart')--}}

    </div>
</div>


@include('layouts.footer')
