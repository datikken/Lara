@extends('layouts.cartProducts')
@section('center')
    <div class="cart_wrap-item">
        @if(Session::get('cart'))
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
        @endif

        <div class="cart_content">
            @include('components.cart.cart_grid', ['cartItems' => $cartItems])
        </div>

        @if(Session::get('cart'))
            <div class="cart_wrap-item_inner-total">
                <div class="cart_wrap-item_inner-total_inner">
                    <span class="cart_wrap-item_inner-total_inner-item">Общая сумма</span>
                    <span class="cart_wrap-item_inner-total_inner-item" data-cartpriceval>
                    {{$cartItems->totalPrice}}
            </span>
                </div>
                <div class="cart_wrap-item_inner-total_button">
                    <a class="cart_wrap-item_inner-total_button-item" href="{{ route('checkoutProducts') }}">
                        оформить заказ
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection