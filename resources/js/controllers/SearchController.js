/* eslint-disable */
import Vue from 'vue';
import Vuex from 'vuex';
import app from '../vue/Search.vue'
import store from '../vue/store/store'

class SearchController {
    constructor() {
        let el = document.querySelector('[type="search"]');
        new Vue({
            render: h => h(app),
            store: store,
        }).$mount('#app')
    }
}

export default SearchController;
