import Swiper from 'swiper';

class ProductDetailsSliderController {
    constructor() {
        let slider = document.querySelector('.details_wrap-slider');
        if(slider) {
            slider && this._gallery();
        }
    }
    _gallery() {
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
            loopedSlides: 4
        });
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            centeredSlides: true,
            slidesPerView: 'auto',
            touchRatio: 0.2,
            slideToClickedSlide: true,
            loop: true,
            navigation: {
                nextEl: '.gallery-thumbs-next',
                prevEl: '.gallery-thumbs-prev',
            },
            loopedSlides: 4
        });

        galleryTop.controller.control = galleryThumbs;
        galleryThumbs.controller.control = galleryTop;
    }

}

export default ProductDetailsSliderController;
