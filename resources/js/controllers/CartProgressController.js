class CartProgressController {
    constructor() {
        let el = document.querySelector('.cart');
            el && this._fixProgress(el);
    }

    _fixProgress(el) {
        let line = el.querySelector('.cart_wrap-crumb').querySelector('.active-item');
        let authStep = el.querySelector('.cart_check-wrap_head');
        let delStep = el.querySelector('.dform');

            if(authStep) {
                line.style.width = '37%';
            }

            if(delStep) {
                line.style.width = '65%';
            }
    }
}

export default CartProgressController;
