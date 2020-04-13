@extends('layouts.cartProducts')
@section('center')
   {{--@php dump(Session::get('payment_info')) @endphp--}}

   <div class="payments_wrapper">
       @include('components.cart.payment')
       @include('components.cart.order_list')
   </div>

@endsection