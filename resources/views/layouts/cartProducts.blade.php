<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=9a0606fc-a475-4fdb-8c57-1e8a12fbe2ae" type="text/javascript"></script>

@include('layouts.header')
@include('components.menu.menu')

<div class="page_content">
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
</div>

@include('layouts.footer')