import $ from 'jquery';

class DeliveryController {
    _progressBar() {
        let bar;
        let deliveryStep, formStep,paymentStep;
        let page = document.querySelector('.cart');

        if(page) {
            bar = page.querySelector('.active-item');
            deliveryStep = page.querySelector('.order_list');
            formStep = page.querySelector('.dform');
            paymentStep = page.querySelector('.payment');
        }

        if(deliveryStep) {
            $(bar).css('width', '37%');
        }
        if(formStep) {
            $(bar).css('width', '65%');
        }
        if(paymentStep) {
            $(bar).css('width', '100%');
        }

    }
    constructor() {
        let cart = $('.cart_wrap');
            cart && this._progressBar(cart);
    }

}

export default DeliveryController;
