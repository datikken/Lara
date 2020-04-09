class DeliveryController {
    _progressBar() {
        let page = document.querySelector('.cart');

        let bar = page.querySelector('.active-item');
        let deliveryStep = page.querySelector('.order_list');
        let formStep = page.querySelector('.dform');

        if(deliveryStep) {
            $(bar).css('width', '37%');
        }
        if(formStep) {
            $(bar).css('width', '65%');
        }
    }
    constructor() {
        let cart = $('.cart_wrap');
            cart && this._progressBar(cart);
    }

}

export default DeliveryController;