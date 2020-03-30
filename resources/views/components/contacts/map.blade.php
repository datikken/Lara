<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<div class="map-wrap">
    {{--{if $settings.heading}--}}
    {{--<div class="page-title page-title--decorated">--}}
        {{--<h1>{$settings.heading}</h1>--}}
    {{--</div>--}}
    {{--{/if}--}}
    <div class="ymap-coords"
         style="width:100%;
         height:300px;"
         data-adress="{$settings.text}"
         data-desc="{$settings.html}"
         data-lat="{$settings.map.lat}"
         data-lng="{$settings.map.lng}"
         data-zoom="{$settings.map.zoom}"></div>
</div>
