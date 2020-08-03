import Vue from 'vue'
import Vuex from 'vuex'
import $ from "jquery";

const _ = require('lodash');

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        order: ''
    },
    getters: {
        filteredProducts: state => state.filteredProducts,
        allProducts: state => state.products,
        user: state => state.user,
        deliveryType: state => state.deliveryType,
        urikValidation: state => state.urikValidation,
        orders: state => state.orders
    },
    actions: {
        CHANGE_ORDER_STATUS(context, obj) {
            context.commit('changeOrderStatus', obj);
        },
    },
    mutations: {
        changeOrderStatus(state, obj) {
            let status;

            switch(obj.status) {
                case 'Создан' : status = 'on_hold'
                    break;
                case 'Передан в доставку' : status = 'on_delivery'
                    break;
                case 'Доставка' : status = 'delivery_progress'
                    break;
                case 'Доставлен' : status = 'arrived'
                    break;
                case 'Отменен' : status = 'lost'
                    break;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });
            $.ajax({
                method: "GET",
                url: obj.url,
                data: {
                    status,
                    id: obj.id
                },
                success: function (data) {
                    state.orders = data;
                    console.log('changeOrderStatus', data)
                },
                error: function (error) {
                    console.warn(error);
                }
            });

        }
    }
})

export default store
