import Vue from 'vue'
import Vuex from 'vuex'
import $ from "jquery";

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        products: [],
        filteredProducts: []
    },
    mutations: {
        getFilteredProducts(state, payload) {
            let products = state.products;
            let that = this;

            state.filteredProducts = [];

            products.forEach((prod) => {
                if(prod.name.indexOf(payload) > 0) {
                    state.filteredProducts.push(prod);
                }
            });

            console.log(state.filteredProducts)
        },
        getAllProducts (state) {
            let url = '/search';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });
            $.ajax({
                method: "get",
                url,
                data: { },
                success: function (data) {
                    state.products = data;
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        }
    }
})

export default store
