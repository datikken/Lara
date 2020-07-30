<script>
    window.token = '{{ csrf_token() }}';
    {{--window.getOrderInfo = "{{ route('GetOrderInfo', ['id' => 1]) }}";--}}
</script>

<script src="https://code.jquery.com/jquery-2.x-git.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script async="false" src="//api-maps.yandex.ru/2.1/?lang=ru_RU" id="scriptonload-__api_maps_yandex_ru_2_1__lang_ru_RU"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit.min.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js"></script>--}}
<script src="{{ asset('js/app.js') }}" defer></script>
