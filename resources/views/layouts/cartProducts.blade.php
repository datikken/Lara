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

            <div class="cart_wrap-item_inner-table_row cart_table-headings">
                <div class="cart_wrap-item_inner-table_row-col">
                    <span class="cart_wrap-item_inner-table_row-col-heading">Картридж</span>
                </div>
                <div class="cart_wrap-item_inner-table_row-col">
                    <span class="cart_wrap-item_inner-table_row-col-heading">Цена (шт)</span>
                </div>
                <div class="cart_wrap-item_inner-table_row-col">
                    <span class="cart_wrap-item_inner-table_row-col-heading">Количество</span>
                </div>
                <div class="cart_wrap-item_inner-table_row-col">
                    <span class="cart_wrap-item_inner-table_row-col-heading">Общая сумма</span>
                </div>
            </div>

            <div class="cart_wrap-item_inner">
                <div class="cart_wrap-item_inner-table">
                    @if(isset($cartItems->items))
                        @foreach($cartItems->items as $cartItem)
                            @include('components.cart.cart_item', $cartItem)
                        @endforeach
                    @else
                        @include('components.cart.cart_empty')
                    @endif
                </div>
            </div>
        </div>

        @if(isset($cartItems->items))
            <div class="cart_wrap-item_inner-total">
                <div class="cart_wrap-item_inner-total_inner">
                    <span class="cart_wrap-item_inner-total_inner-item">Общая сумма</span>
                    <span class="cart_wrap-item_inner-total_inner-item">
                            {{$cartItems->totalPrice}}
                    </span>
                </div>
                <div class="cart_wrap-item_inner-total_button">
                    <span class="cart_wrap-item_inner-total_button-item">оформить заказ</span>
                </div>
            </div>
        @endif
    </div>
</div>

@include('layouts.footer')
