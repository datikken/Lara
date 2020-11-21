import Vue from 'vue';
import VueRouter from "vue-router";
import store from "../vue/store/store";
import router from "../vue/router/router";
import Checkout from '../vue/Checkout';

class CartCheckoutVueApp {
    _initApp() {
        Vue.use(VueRouter);

        new Vue({
            render: h => h(Checkout),
            store: store,
            router
        }).$mount('#checkout')
    }
    constructor() {
        let check = document.getElementById('checkout');

        check && this._initApp();
    }
}

export default CartCheckoutVueApp;
