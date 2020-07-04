import $ from 'jquery';

class ProductDetailsController {
    constructor() {
        let that = this;
        let slider = document.querySelector('.details_wrap-slider');

        slider && this._gallery();

        let overlays = document.querySelectorAll('.product_wrapper-item_overlay');
            overlays.forEach((el) => {
                el.addEventListener('click', function (e) {
                    let id = e.currentTarget.getAttribute('data-id');
                    let product = document.querySelector(`#product-${id}`);
                    let img = product.querySelector('.product_wrapper-item_image').querySelector('img').getAttribute('src');
                    let url = product.querySelector('.product_link').getAttribute('href');
                    let price = product.querySelector('.product_wrapper-item_price-item').innerHTML;
                    let modal = document.querySelector(`#modal-${id}`);

                    that._setDetailsLink(url,id, price, modal);
                    that._setDetailsImg(img,id);
                    that._setListeners(product, modal, id, product);
                })
            });
    }

    _setListeners(el, modal, pid, product) {
        let toCart = modal.querySelector('.prdet_wrap-icons_ctas-buy');
        let url = product.querySelector('.ajaxGETproduct').dataset.url

        // AddToCartProduct
        toCart.addEventListener('click', () => {
            $.ajax({
                method: "get",
                url: `${url}`,
                data: {
                    id: pid
                },
                success: function (data) {
                    let amount = data.cart;
                    let price = data.price;

                    $('.menu_wrapper-item_cart_icon-amount').text(amount);
                    $('[data-cartpriceval]').text(price);
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        });
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
            loopedSlides: 4
        });

        galleryTop.controller.control = galleryThumbs;
        galleryThumbs.controller.control = galleryTop;
    }
    _setDetailsLink(url,id, price, modal) {
        let priceItem = modal.querySelector('.amount_btn-value-wrap_inner_val')

        priceItem.innerText = price;
    }
    _setDetailsImg(src,id) {
        let modal = document.querySelector(`#modal-${id}`);

        console.warn(src, id);

        let img = modal.querySelector('.prdet_wrap-item_img_inner');
            img.style.backgroundImage = `url(${src})`;
    }

}

export default ProductDetailsController;
