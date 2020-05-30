@extends('layouts.dash')

@section('center')
    @include('components.orders.orders_history',['orders_history' => $orders_history])
@endsection
