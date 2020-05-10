class ProductDetailsController {
    constructor() {
        let that = this;

        let overlays = document.querySelectorAll('.product_wrapper-item_overlay');
            overlays.forEach((el) => {
                el.addEventListener('click', function (e) {
                    let id = e.currentTarget.getAttribute('data-id');
                    let product = document.querySelector(`#product-${id}`);
                    let img = product.querySelector('.product_wrapper-item_image').querySelector('img').getAttribute('src');
                    let url = product.querySelector('.product_link').getAttribute('href');
                    let price = product.querySelector('.product_wrapper-item_price-item').innerHTML;

                    that._setDetailsLink(url,id, price);
                    that._setDetailsImg(img,id);
                })
            });
    }

    _setDetailsLink(url,id, price) {
        let modal = document.querySelector(`#modal-${id}`);
        let dtlbtn = modal.querySelector('.prdet_wrap-icons_ctas-details').setAttribute('href', url);
        let priceItem = modal.querySelector('.amount_btn-value-wrap_inner_val')

        priceItem.innerText = price;
    }
    _setDetailsImg(src,id) {
        let modal = document.querySelector(`#modal-${id}`);

        let img = modal.querySelector('.prdet_wrap-item_img_inner');
            img.style.backgroundImage = `url(${src})`;

    }

}

export default ProductDetailsController;
