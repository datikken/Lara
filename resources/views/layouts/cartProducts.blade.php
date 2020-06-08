<link rel="stylesheet" href="/css/app.css">
@include('components.styles.style')
@include('components.header.header')
@include('components.menu.menu')

<div class="cart">
    <div class="cart_wrap">
        @if(Session::get('cart'))
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
        @endif
        @yield('center')
    </div>
</div>

@include('components.scripts.scripts')
@include('layouts.footer')
