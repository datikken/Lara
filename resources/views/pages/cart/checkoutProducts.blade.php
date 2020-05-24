@extends('layouts.cartProducts')
@section('center')
    <div class="cart_check-wrapper">
        {{--@include('components.cart.cart_auth_fizik')--}}
        @include('components.cart.cart_auth_urik')
        @include('components.cart.order_list')
    </div>

@endsection
