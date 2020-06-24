@yield('top')
@extends('layouts.index')

@section('center')

@include('components.breadcrumbs.breadcrumbs', ['crumbs' =>[['title' => 'Главная','url' => '/'],
    ['title' => 'Каталог', 'url' => '/home']]])

<div class="columns catalog_columns">
    <div class="left_column mobile-hide">
            @include('components.catalog_filters.catalog_filters')
            @include('components.banner.catalog_banner')
        <div class="mobile-hide">
            {{--@include('components.viewed.viewed')--}}
        </div>
    </div>

    <div class="right_column">
        <div class="products_grid">
            @include('components.products_grid.products_grid')
        </div>

        @php  $hist = \App\Http\Controllers\OrdersController::ordersHistory(); @endphp

        @if($hist)
            @include('components.orders.orders_history', [
                'orders_history' => $hist['orders_history'],
                'user' => $hist['user'],
                'last_order' => $hist['last_order'],
                'last_order_total' => $hist['last_order_total']
            ])
        @endif

    </div>
</div>


@endsection

@yield('bottom')
