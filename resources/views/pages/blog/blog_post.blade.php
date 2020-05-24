@extends('layouts.index')
@section('center')
    @include('components.breadcrumbs.breadcrumbs', ['crumbs' =>[['title' => 'Главная','url' => '/'],
        ['title' => 'Блог', 'url' => '#']]])

@php dump($post); @endphp

@endsection
