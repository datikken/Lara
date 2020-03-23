<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Printers</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/js/vendors/swiper/swiper.min.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    @extends('layouts.index')

    @section('center')

    <div class="desktop-hide">
        {{--<Swiper {...paramsHorizontal}>--}}
            {{--{allContentfulSwiper.edges.map(({ node }) => (--}}
            {{--<div--}}
                {{--key={node}--}}
                {{--style={{ backgroundImage: `url(${node.image.file.url})` }}--}}
            {{--></div>--}}
            {{--))}--}}
        {{--</Swiper>--}}
    </div>

    <div class="mobile-hide">
        {{--<Swiper {...params}>--}}
            {{--{allContentfulSwiper.edges.map(({ node }) => (--}}
            {{--<Link--}}
                {{--to="/landing"--}}
                {{--key={node}--}}
                {{--style={{ backgroundImage: `url(${node.image.file.url})` }}--}}
            {{--></Link>--}}
            {{--))}--}}
        {{--</Swiper>--}}
    </div>

    @include('components.banner.banner_mob')

    <div class="desktop-hide">
        {{--<SalesSlider />--}}
        {{--<BestPrintersSlider />--}}
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

            @include('components.viewed.viewed')
        </div>

        <div class="main_column">
            @include('components.sales.sales')

            <div class="mobile-hide">
                {{--<SalesSlider />--}}
            </div>

            {{--<SalesBest />--}}

            <div class="mobile-hide">
                @include('components.sales.sales_eco')
            </div>

        </div>
    </div>

    <div class="desktop-hide">
        @include('components.banner.banner')
    </div>
    {{--<Owl />--}}

    @endsection
</body>
</html>
