@extends('layouts.index')

@section('center')
    <div class="desktop-hide">
        @include('components.main_swiper.main_swiper')
    </div>

    <div class="mobile-hide">
        @include('components.main_swiper.main_swiper')
    </div>

    @include('components.banner.banner_mob')

    <div class="desktop-hide">
        @include('components.sales.sales_slider')
        @include('components.best_printers.BestPrintersSlider')
    </div>

    <div class="columns desktop-layout">
        <div class="left_column">
            <div class="mobile-hide">
                @include('components.banner.banner')
            </div>

            @include('components.news.news')

            <div class="desktop-hide">
                @include('components.sales.sales_eco')
            </div>

            {{--@include('components.viewed.viewed')--}}
        </div>

        <div class="main_column">
            @include('components.sales.sales')

            <div class="mobile-hide">
                @include('components.sales.sales_slider')
            </div>

            @include('components.sales.sales_best')

            <div class="mobile-hide">
                @include('components.sales.sales_eco')
            </div>

        </div>
    </div>

    <div class="desktop-hide">
        @include('components.banner.banner')
    </div>

    @include('components.owl.owl', ['products' => $products])
@endsection
