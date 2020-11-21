/* eslint-disable */
import store from '../vue/store/store';
import MagicButton from '../components/MagicButton'

class ProductDetailsMenuController {
    constructor() {
        this.store = store;
        let container = document.querySelector('.details');

        container && this._initialize(document);

        if (container) {
            let block = document.querySelector('.pdetails_menu');

            this._amountListeners();
            this.addToCart();
            this._setListeners(block, container);
            this._setProductViewed(container);
            this._activateBtn();
        }
    }

    _activateBtn() {
        let btn = document.querySelector('.text_buy-btn');
            btn && new MagicButton(btn);
    }
    _setProductViewed(el) {
        let pid = el.querySelector('[data-pid]').dataset.pid;
        this.store.dispatch('SET_PRODUCT_VIEWED',{pid});
    }

    _initialize(container) {
        this.prcp = container.querySelector('.prcp');
        this.prdch = container.querySelector('.prdch');
        this.prdesc = container.querySelector('.prdesc');
        this.pfeedback = container.querySelector('.pfeedback');
        this.quantity = container.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity');
    }

    addToCart() {
        let id = document.querySelector('[data-pid]').getAttribute('data-pid');
        let btn = document.querySelector('.details_wrap-info_item-right');
        let that = this;

        btn.addEventListener('click', function () {
            let amount = parseInt(document.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity').innerText);
            that.store.dispatch('ADD_PRODUCT_TO_CART', {id, amount})
        })
    }

    _amountListeners() {
        let block = document.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items');
        let quantVal = parseInt(this.quantity.innerText);
        let links = block.querySelectorAll('a');
        let that = this;

        links.forEach((el) => {
            el.addEventListener('click', function (e) {
                e.preventDefault();
                let target = e.target.classList.value;

                if (target.indexOf('plus') > 0) {
                    quantVal = quantVal + 1
                } else {
                    if (quantVal > 1) {
                        quantVal = quantVal - 1
                    }
                }

                that.quantity.innerText = quantVal;
            })
        });
    }

    _setListeners(el, block) {
        let that = this;
        let items = el.querySelectorAll('.pdetails_menu_item');

        items.forEach((el) => {
            el.addEventListener('click', (e) => {
                let item = e.currentTarget;
                let id = parseInt(item.getAttribute('data-id'));

                items.forEach((el) => {
                    el.classList.remove('menu_active');
                });

                item.classList.add('menu_active');
                that._showHideElements(id, block);
            })
        })
    }

    _showHideElements(id, block) {
        let items = [
            this.prcp,
            this.prdch,
            this.prdesc,
            this.pfeedback
        ];

        items.forEach((el, i) => {
            el.classList.add('as-none');
            if (i === id) {
                el.classList.remove('as-none');
            }
        })
    }
}

export default ProductDetailsMenuController;
