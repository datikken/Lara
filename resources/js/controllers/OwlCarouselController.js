import 'owl.carousel';
import $ from 'jquery';

class OwlCarouselController {
    activateCarousel() {
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true,
                nav: true,
                items: 6,
                margin: 15,
                autoplay: true,
                autoplayTimeout: 2000,
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
        })
    }
    constructor() {
        let block = document.querySelector('.owl-wrapper');
            if(block) {
                this.activateCarousel(block);
        }
    }
}

export default OwlCarouselController;
