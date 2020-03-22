<link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css"">

@yield('top')
@extends('layouts.index')

@section('center')
<!--    @foreach ($products as $product)-->
<!--        <p>This is a product - {{ $product->name }}</p>-->
<!--        <p>This is a product price - {{ $product->price }}</p>-->
<!--        <br/>-->
<!--    @endforeach-->

<div class="crumbs_wrap mobile-hide">
<!--    <Breadcrumbs-->
<!--        separator={<NavigateNextIcon fontSize="small" />}-->
<!--    aria-label="breadcrumb"-->
<!--    >-->
<!--    <Link color="inherit" href="/" onClick={() => {}}>-->
<!--    Главная-->
<!--    </Link>-->
<!--    <Typography color="textPrimary">Каталог</Typography>-->
<!--    </Breadcrumbs>-->
</div>

<div class="columns catalog_columns">
    <div class="left_column mobile-hide">

<!--        @include('components.catalog_filters.catalog_filters')-->

<!--        <CatalogFilters/>-->
<!--        <CatalogBanner/>-->
<!---->
        <div class="mobile-hide">
            @include('components.viewed.viewed')
        </div>
    </div>

    <div class="right_column">
<!--        <CatalogFiltersMob/>-->

        <div class="products_grid">
            @include('components.products_grid.products_grid')
        </div>

        @include('components.orders_history.orders_history')

    </div>
</div>

@endsection

@yield('bottom')
