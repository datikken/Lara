<script>
    window.token = '{{ csrf_token() }}';
</script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=6a0c633c-193e-4f23-9ff1-01e421de70a5&lang=ru_RU" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-2.x-git.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit.min.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script src="https://unpkg.com/vue-yandex-maps"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js"></script>--}}
<script src="{{ asset('js/app.js') }}" defer></script>
