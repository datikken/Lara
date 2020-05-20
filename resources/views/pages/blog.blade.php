@extends('layouts.index')
@section('center')
    @include('components.breadcrumbs.breadcrumbs', ['crumbs' => ['Главная', 'Блог']])

    @include('components.blog.posts_list')

@endsection
