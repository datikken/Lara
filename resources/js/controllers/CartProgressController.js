import Vue from 'vue';
import Vuex from 'vuex';
import app from '../vue/Checkout'
import store from '../vue/store/store'
import router from '../vue/router/router'
import VueRouter from 'vue-router'

class CartProgressController {
    constructor() {
        let checkout = document.querySelector('#checkout');
        let el = document.querySelector('.cart');
            // el && this._fixProgress(el);

            if(checkout) {
                this.renderCheckoutVue(checkout);
            }

    }
    renderCheckoutVue(el) {
        Vue.use(VueRouter);

        new Vue({
            render: h => h(app),
            store: store,
            router
        }).$mount('#checkout')
    }

    _fixProgress(el) {
        let line = el.querySelector('.cart_wrap-crumb').querySelector('.active-item');
        let authStep = el.querySelector('.cart_check-wrap_head') || el.querySelector('.company');
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
