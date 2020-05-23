@extends('layouts.index')
@section('center')

    @include('components.breadcrumbs.breadcrumbs', ['crumbs' => ['Главная', 'Профиль', 'Трекинг заказа']])

    {{--@include('components.tracking.tracking_progress')--}}
    {{--@include('components.tracking.tracking_feedback')--}}

    @include('components.tracking.tracking_request')
@endsection
