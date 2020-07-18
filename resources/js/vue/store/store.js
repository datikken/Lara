import Vue from 'vue'
import Vuex from 'vuex'
import $ from "jquery";

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        closeListener: false,
        products: [],
        filteredProducts: []
    },
    getters: {
        filteredProducts: state => state.filteredProducts,
        allProducts: state => state.products
    },
    mutations: {
        setCloseListener(state, payload) {
            state.closeListener = payload;
        },
        getFilteredProducts(state, payload) {
            let products = state.products;
            state.filteredProducts = [];

            products.forEach((prod) => {
                if(prod.name.indexOf(payload) >= 0) {
                    state.filteredProducts.push(prod);
                }
            });

            state.closeListener = true;
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
                    data.forEach((el) => {
                        let params = JSON.parse(el.params);
                        let cape = JSON.parse(el.cape);

                            el.cape = cape;
                            el.params = params;
                    });


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
