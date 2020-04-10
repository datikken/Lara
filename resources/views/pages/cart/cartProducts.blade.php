@extends('layouts.cartProducts')

@section('center')
    <div class="cart_wrap-item">
        @if(empty($cartItems))
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

        <div class="cart_wrap-item_inner">
            <div class="cart_wrap-item_inner-table">
                @if(!empty($cartItems))
                    @foreach($cartItems->items as $cartItem)
                        @include('components.cart.cart_item', $cartItem)
                    @endforeach
                @else
                    @include('components.cart.cart_empty')
                @endif
            </div>
        </div>

        @if(!empty($cartItems))
            <div class="cart_wrap-item_inner-total">
                <div class="cart_wrap-item_inner-total_inner">
                    <span class="cart_wrap-item_inner-total_inner-item">Общая сумма</span>
                    <span class="cart_wrap-item_inner-total_inner-item">
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