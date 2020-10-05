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
            <div class="cart_wrap-item_inner">
                <div class="cart_wrap-item_inner-table"
                     @if(isset($cartItems->totalQuantity))
                     data-cartPrice="{{ $cartItems->totalPrice }}"
                     data-cartAmount="{{ $cartItems->totalQuantity }}"
                    @endif
                >
                    @if(Session::get('cart'))
                        @foreach($cartItems->items as $cartItem)
                            @include('components.cart.cart_item', $cartItem)
                        @endforeach
                    @else
                        @include('components.cart.cart_empty')
                    @endif
                </div>
            </div>
        </div>

        @if(Session::get('cart'))
            <div class="cart_wrap-item_inner-total">
                <div class="cart_wrap-item_inner-total_inner">
                    <span class="cart_wrap-item_inner-total_inner-item">Общая сумма</span>
                    <span class="cart_wrap-item_inner-total_inner-item" data-cartpriceval>
                        {{ $cartItems->totalPrice }}
                        <img src="/images/icons/rub_fat.svg" alt="rub" class="cart_wrap-item-total_icon" />
                    </span>
                </div>
                <a class="cart_wrap-item_inner-total_button magic_btn" href="{{route('checkoutProducts')}}">
                    <span class="cart_wrap-item_inner-total_button-item">
                        оформить заказ
                    </span>
                </a>
            </div>
        @endif
    </div>
@endsection
