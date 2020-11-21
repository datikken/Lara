import $ from 'jquery';
// import 'owl.carousel';

class OwlCarouselController {
    activateLandingCarousel() {
        $('.feedback_swiper').owlCarousel()
    }
    activateCarousel() {
        $('.owl-carousel').owlCarousel()
    }
    constructor() {
        let block = document.querySelector('.owl-wrapper');
        let landSwiper = document.querySelector('.feedback_swiper');
        let that = this;

        $(document).ready(function () {
            if (landSwiper) {
                // that.activateLandingCarousel();
            }
            if (block) {
                // that.activateCarousel(block);
            }
        })
    }
}

export default OwlCarouselController;
