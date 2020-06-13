@extends('layouts.cartProducts')
@section('center')

   <div class="payments_wrapper">
       @include('components.cart.payment')
       @include('components.cart.order_list')
   </div>

@endsection
