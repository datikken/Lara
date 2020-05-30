@extends('layouts.index')


@section('center')

    @php dump($order[0]); @endphp

    @include('components.breadcrumbs.breadcrumbs', ['crumbs' =>[['title' => 'Главная','url' => '/'],
        ['title' => 'Профиль', 'url' => '/home'],
        ['title' => 'Трекинг заказа','url' => '/tracking']]])

    @include('components.tracking.tracking_progress', ['order' => $order])

@endsection
