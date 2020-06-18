/* eslint-disable */

window.onload = function () {
   if(typeof Swiper !== 'undefined') {
      new Swiper('.landswiper', {
        slidesPerView: 'auto',
        containerClass: 'landswipe_swiper',
        centeredSlides: true,
        initialSlide: '2',
        spaceBetween: 100,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        }
    });

    let swiperMain = new Swiper('.bestPrinters_swiper', {
        spaceBetween: 50,
        navigation: {
            nextEl: '.swiper-button-nextt',
            prevEl: '.swiper-button-prevv',
        },
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });

    let swiperV = new Swiper('.swiper-container-v', {
        spaceBetween: 50,
        pagination: {
            el: '.swiper-pagination-v',
        },
        navigation: {
            nextEl: '.swiper-button-nextt',
            prevEl: '.swiper-button-prevv',
        }
    });

    let slider = new Swiper('.best_printers', {
        pagination: {
            el: '.swiper-pagination',
        },
        direction: 'vertical',
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });

    let feedBackSwiper = new Swiper('.feedback_swiper', {
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
                spaceBetween: 10
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            320: {
                slidesPerView: 2,
                spaceBetween: 10
            }
        }
    });

    let mainSwiper = new Swiper('.main_slider', {
        slidesPerView: 1,
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });

    let salesSwiper = new Swiper('.sales_slider', {
        slidesPerView: 1
    });

    let mySwiper = new Swiper ('.owl_swiper', {
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
                spaceBetween: 20
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20
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
    });

    let swiperH = new Swiper('.swiper-container-h', {
        spaceBetween: 50,
        pagination: {
            el: '.swiper-pagination-h',
            clickable: true,
        }
    });
  }
};
