@extends('layouts.index')
@section('center')

    @include('components.breadcrumbs.breadcrumbs', ['crumbs' =>[['title' => 'Главная','url' => '/'],
        ['title' => 'Профиль', 'url' => '/home'],
        ['title' => 'Трекинг заказа','url' => '/tracking']]])

    @include('components.tracking.tracking_progress')

    @include('components.tracking.tracking_feedback')

@endsection
