@yield('top')
@extends('layouts.index')

@section('center')

@include(
    'components.breadcrumbs.breadcrumbs',
        ['crumbs' =>[['title' => 'Главная','url' => '/'],
        ['title' => 'Каталог', 'url' => '/home']]]
)

<div id="catalog">
    <div class="left_column mobile-hide">
            {{--@include('components.catalog_filters.catalog_filters')--}}
            {{--@include('components.banner.catalog_banner')--}}

        <div class="mobile-hide">
            {{--@include('components.viewed.viewed')--}}
        </div>

        {{--@include('components.news.news', ['news' => $news])--}}

    </div>

            {{--@include('components.products_grid.products_grid')--}}
</div>

@endsection

@yield('bottom')
