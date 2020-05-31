@extends('layouts.index')
@section('center')
    @include('components.breadcrumbs.breadcrumbs', ['crumbs' =>[['title' => 'Главная','url' => '/'],
        ['title' => 'Блог', 'url' => '#']]])

    @include('components.blog.post_item',['post' => $post])

@endsection
