import Vue from 'vue'
import Vuex from 'vuex'
import $ from "jquery";

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        order: '',
        yearsToDescribe: ''
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
        CHANGE_USER_STATUS(context, status) {
            context.commit('changeUserStatus', status);
        },
        CHANGE_ORDER_STATUS(context, obj) {
            context.commit('changeOrderStatus', obj);
        },
        CREATE_YEAR_TO_DESCRIBE(context, year) {
            console.log('createYearToDescribe action')

            context.commit('createYearToDescribe', year);
        }
    },
    mutations: {
        changeUserStatus(state, status) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });

            $.ajax({
                method: "GET",
                url: '/adminRights/',
                data: {
                    id
                },
                success: function (data) {
                    state.yearsToDescribe = data;
                    console.log('createYearToDescribe', data)
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        },
        createYearToDescribe(state, year) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });

            $.ajax({
                method: "GET",
                url: '/createYearToDescribe',
                data: {
                    year
                },
                success: function (data) {
                    state.yearsToDescribe = data;
                    console.log('createYearToDescribe', data)
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        },
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
