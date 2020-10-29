/* eslint-disable */
import Vue from 'vue';
import Vuex from 'vuex';
import app from '../vue/Search.vue'
import store from '../vue/store/store'

class SearchController {
    constructor() {
        let offCatalog = document.querySelector('.menu_wrapper-item_search_input');
        let el = document.querySelector('[type="search"]');

        if (offCatalog) {
            new Vue({
                render: h => h(app),
                store: store,
            }).$mount('#app')
        }
    }
}

export default SearchController;
