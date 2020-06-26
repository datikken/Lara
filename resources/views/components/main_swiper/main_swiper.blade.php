<div class="swiper-container main_slider">
    <div class="swiper-wrapper">
        @foreach($slides as $slide)
            <div class="swiper-slide" style="background-image: url('{{Storage::disk('local')->url('main_slider_images/' . $slide->image )}}')"></div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-scrollbar"></div>
</div>
