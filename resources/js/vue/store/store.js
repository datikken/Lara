import Vue from 'vue'
import Vuex from 'vuex'
import $ from "jquery";

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        products: []
    },
    mutations: {
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
