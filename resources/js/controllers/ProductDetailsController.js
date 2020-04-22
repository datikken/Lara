class ProductDetailsController {
    constructor() {
        let that = this;

        let overlays = document.querySelectorAll('.product_wrapper-item_overlay');
            overlays.forEach((el) => {
                el.addEventListener('click', function (e) {
                    let id = e.currentTarget.getAttribute('data-id');
                    let product = document.querySelector(`#product-${id}`);
                    let img = product.querySelector('.product_wrapper-item_image').querySelector('img').getAttribute('src');

                    that._setDetailsImg(img,id);
                })
            });
    }


    _setDetailsImg(src,id) {
        let modal = document.querySelector(`#modal-${id}`);

        let img = modal.querySelector('.prdet_wrap-item_img');
            img.style.backgroundImage = `url(${src})`;

    }

}

export default ProductDetailsController;
