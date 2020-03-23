
<script>
    window.onload = function () {
        var mySwiper = new Swiper ('.swiper-container', {
            containerClass: 'owl_swiper',
            activeSlideKey: '5',
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            breakpoints: {
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 40
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10
                }
            }
        })
    };
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

    <div class="swiper-container">
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
