@extends('layouts.dash')

@section('center')
    <div class="orders">

<? if(!empty($orders_actual)) { ?>
        @include('components.orders.orders_actual', ['orders_actual' => $orders_actual, 'user' => $user])
<? } ?>

<? if(isset($orders_history)) { ?>
    @include('components.orders.orders_history',['orders_history' => $orders_history])
<? } else { ?>
    @include('components.orders.orders_empty')
<? } ?>

    </div>

@endsection
