/* eslint-disable */
import Vue from 'vue';
import Vuex from 'vuex';
import app from '../vue/Search.vue'

class SearchController {
    constructor() {
        let el = document.querySelector('[type="search"]');

        new Vue({
            render: h => h(app),
        }).$mount('#app')
    }
}

export default SearchController;
