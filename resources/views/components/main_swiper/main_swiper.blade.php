<div class="swiper-container main_slider">
    <div class="swiper-wrapper">
        @foreach($slides as $slide)
            <div class="swiper-slide" style="background-image: url('{{Storage::disk('local')->url('main_slider_images/' . $slide->image )}}')"></div>
        @endforeach
    </div>
    <div class="swiper-pagination main_slider_pagination"></div>
    <div class="swiper-button-prev main_slider-nav"></div>
    <div class="swiper-button-next main_slider-nav"></div>
    <div class="swiper-scrollbar"></div>
</div>
