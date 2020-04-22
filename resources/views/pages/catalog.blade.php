@yield('top')
@extends('layouts.index')

@section('center')
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
            @include('components.catalog_filters.catalog_filters')
            @include('components.banner.catalog_banner')
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
