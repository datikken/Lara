import FastViewController from './FastViewController.js'
import Vue from "vue";
import store from "../vue/store/store";
import cat from '../vue/Catalog.vue'

class CatalogController {
    _initFastViewController(el) {
       new FastViewController(el);
    }
    _setListeners() {
        let that = this;
        let togglers = document.querySelectorAll('[uk-toggle]');
            togglers.forEach((toggle) => {
                toggle.addEventListener('click', function() {
                    that._initFastViewController(toggle);
                })
            })
    }
    constructor() {
        let catalog = document.querySelector('.products_grid');
            catalog && this._setListeners();

        new Vue({
            render: h => h(cat),
            store: store,
        }).$mount('#catalog')
    }
}

export default CatalogController;
