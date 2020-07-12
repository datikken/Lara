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
        filteredProducts: state => state.filteredProducts
    },
    mutations: {
        setCloseListener(state, payload) {
            state.closeListener = payload;

            console.log(state.closeListener)
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
                    function modifyObj(target) {
                        let result = {};

                        target.map((obj) => {
                            Object.keys(obj).forEach(function(key) {
                                let str = obj[key];
                                result[key] = str.trim();
                            });
                        })

                        return result
                    }

                    data.forEach((el) => {
                        let params = JSON.parse(el.params);
                        let newParams = modifyObj(params);

                        let cape = JSON.parse(el.cape);
                        let newCape = modifyObj(cape);

                            el.cape = newCape;
                            el.params = newParams;
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
