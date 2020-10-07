import 'owl.carousel';
import $ from 'jquery';

class OwlCarouselController {
    activateLandingCarousel() {
        $('.feedback_swiper').owlCarousel({
            loop: true,
            nav: true,
            items: 6,
            margin: 15,
            // autoplay: true,
            // autoplayTimeout: 2000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    }
    activateCarousel() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            nav: true,
            margin: 15,
            // autoplay: true,
            // autoplayTimeout: 2000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
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
                that.activateCarousel(block);
            }
        })
    }
}

export default OwlCarouselController;
