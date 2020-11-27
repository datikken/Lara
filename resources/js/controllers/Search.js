import Vue from 'vue';
import app from '../vue/Search.vue'
import store from '../vue/store/store'

class SearchController {
    activateVue() {
        new Vue({
            render: h => h(app),
            store: store,
        }).$mount('#app')
    }

    constructor() {
        let that = this;
        window.onload = function () {
            that.activateVue();
        }
    }
}

export default SearchController;
