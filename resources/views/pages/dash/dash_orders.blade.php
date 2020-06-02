@extends('layouts.dash')

@section('center')

    <? if(isset($orders_history)) { ?>
        @include('components.orders.orders_history',['orders_history' => $orders_history])
    <? } else { ?>
        @include('components.orders.orders_empty')
    <? } ?>

@endsection
