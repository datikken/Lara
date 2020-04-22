class ProductDetailsController {
    constructor() {
        let overlays = document.querySelectorAll('.product_wrapper-item_overlay');
            overlays.forEach((el) => {
                el.addEventListener('click', function (e) {
                    let id = e.currentTarget.getAttribute('data-id');
                    let product = document.querySelector(`#product-${id}`);

                    console.log(product);

                })
            });
    }


}

export default ProductDetailsController;
