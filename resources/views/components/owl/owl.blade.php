
<script>

</script>

<div class="owl-wrapper">
    <div class="owl-controls-heading">
        <div class="owl-controls-heading-item">Новинки</div>
        <div class="owl-controls-heading_btns">
            <img src='/images/icons/arrow_right.svg'
                 alt="arrow"
                 class="arrow_left" />
            <img src='/images/icons/arrow_right.svg'
                 alt="arrow"
                 class="arrow_right" />
        </div>
    </div>

    <div class="swiper-container owl_swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide" key="1">
                @include('components.owl.owl_card')
            </div>
            <div class="swiper-slide" key="2">
                @include('components.owl.owl_card')
            </div>
            <div class="swiper-slide" key="3">
                @include('components.owl.owl_card')
            </div>
            <div class="swiper-slide" key="4">
                @include('components.owl.owl_card')
            </div>
        </div>
    </div>

</div>
</div>
