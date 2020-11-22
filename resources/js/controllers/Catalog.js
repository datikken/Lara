import FastViewController from './FastViewController.js'
import VueTruncate from 'vue-truncate-filter';
import store from "../vue/store/store";
import cat from '../vue/Catalog.vue';
import Vue from "vue";

class Catalog {
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
        let catalog = document.querySelector('#catalog');
            catalog && this._setListeners();
            
            if(catalog) {
                Vue.use(VueTruncate)
                new Vue({
                    render: h => h(cat),
                    store: store,
                }).$mount('#catalog')
            }
    }
}

export default Catalog;
