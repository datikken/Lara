<link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">

@include('layouts.header')
@include('components.menu.menu')

<?php #dump($cartItems); ?>

<div class="cart">
    <div class="cart_wrap">

        <div class="cart_wrap-crumb">
            <div class="cart_wrap-crumb-item active">
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

        <div class="cart_wrap-item">
            <div class="cart_wrap-item_inner">
                <div class="cart_wrap-item_inner-heading">
                    <span class="cart_wrap-item_inner-heading-text">корзина</span>
                </div>
            </div>

            <div class="cart_wrap-item_inner">
                <div class="cart_wrap-item_inner-table">

                    @if($cartItems != '')
                        @foreach($cartItems->items as $cartItem)
                            @include('components.cart.cart_item', $cartItem)
                        @endforeach
                    @else
                        @include('components.cart.cart_empty')
                    @endif

                </div>
            </div>
        </div>

        {{--<CartTotal />--}}

    </div>
</div>

@include('layouts.footer')
