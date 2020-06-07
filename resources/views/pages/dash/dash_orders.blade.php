@extends('layouts.dash')

@section('center')
    <div class="orders">

        {{--@php dd($orders_actual); @endphp--}}

        @include('components.orders.orders_actual', ['orders_actual' => $orders_actual])

        <? if(isset($orders_history)) { ?>
            @include('components.orders.orders_history',['orders_history' => $orders_history])
        <? } else { ?>
            {{--@include('components.orders.orders_empty')--}}
        <? } ?>
    </div>

@endsection
