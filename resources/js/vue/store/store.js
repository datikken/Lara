import Vue from 'vue'
import Vuex from 'vuex'
import $ from "jquery";
import axios from 'axios';
const _ = require('lodash');

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        closeListener: false,
        productsLoaded: false,
        products: [],
        filteredProducts: [],
        typeFilters: [],
        modelFilters: [],
        brandFilters: [],
        singleProduct: {},
        customerAdress: {},
        customerIndex: false,
        user: false,
        usersFIO: '',
        cartStep: 0,
        cart: {},
        deliveryType: '',
        urikValidation: {},
        uriksData: {}
    },
    getters: {
        filteredProducts: state => state.filteredProducts,
        allProducts: state => state.products,
        user: state => state.user,
        deliveryType: state => state.deliveryType,
        urikValidation: state => state.urikValidation
    },
    actions: {
       SAVE_URIKS_DATA(context, obj) {
           context.commit('saveUriksData', obj)
       },
       VALIDATE_RS(context, obj) {
           context.commit('RSValidation', obj);
       },
       GET_DADATA(context, obj) {
           context.commit('getDadata', obj);
       },
       SET_DELIVERY_INDEX(context, obj) {
           context.commit('setDeliveryIndex', obj);
       },
       REMOVE_DELIVERY_TYPE_ERROR(context) {
           context.commit('removeDeliveryTypeError');
       },
       DELIVERY_TYPE_ERROR(context) {
           context.commit('deliveryTypeError');
       },
       APPLY_DELIVERY_ADRESS(context, data) {
           context.commit('applyDeliveryAdress', data);
       },
       PRICE_FILTER(context, name) {
            context.commit('applyPriceFilter', name);
       },
       SET_DELIVERY_TYPE(context,name) {
           context.commit('setDeliveryType',name);
       },
       CHECK_CART_STATE(context) {
           context.commit('checkCartState');
       },
       CHANGE_PROGRESS_STEP(context) {
           context.commit('changeProgressStep');
       },
       SET_CUSTOMER_FIO(context, obj) {
           context.commit('setCustomerFio', obj);
       },
       GET_USERS_INFO(context) {
           context.commit('getUserInfo');
       },
       ADD_PRODUCT_TO_CART(context, {id, amount}) {
           context.commit('addProductToCart', {id, amount})
       },
       GET_PRODUCT_BY_ID(context, id) {
           context.commit('getProductById', id);
       },
       SWITCH_PRODUCTS_LOADER(context) {
           context.commit('setProductsLoaded');
       },
       FILTER_PRODUCTS(context, data) {
           context.commit('filterProductByQuery', data);
       },
       COLLECT_FILTERS(context) {
           context.commit('getProductTypeFilters');
           context.commit('getProductBrandFilters');
           context.commit('getProductModelFilters');
       },
       GET_MODEL_FILTERS(context, data) {
           context.commit('getProductModelFilters', data);
       },
       fixCartStatus({ dispatch, commit }, { data }) {
           let amount = data.totalQuantity;
           let price = data.totalPrice;

           $('[data-cartamountval]').text(amount);
           $('[data-cartpriceval]').text(price);
       }
    },
    mutations: {
        getDadata() {
            let url = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/findById/party';

            fetch(url, {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                credentials: 'same-origin',
                headers: {
                    'Authorization':'Token a799fcceda51c067cdb475e748d7e27e9b4f6fb9',
                    'Content-Type':'application/json'
                },
                redirect: 'follow',
                referrerPolicy: 'no-referrer',
                body: JSON.stringify(data)
            });
        },
        saveUriksData(state, obj) {
            state.uriksData = obj;
        },
        RSValidation(state, obj) {
                let rs = obj.rs
                let bik = obj.bik
                let result = false;
                let error = {};

                if (typeof rs === 'number') {
                    rs = rs.toString();
                } else if (typeof rs !== 'string') {
                    rs = '';
                }

                if (!rs.length) {
                    error.code = 1;
                    error.message = 'Р/С пуст';
                } else if (/[^0-9]/.test(rs)) {
                    error.code = 2;
                    error.message = 'Р/С может состоять только из цифр';
                } else if (rs.length !== 20) {
                    error.code = 3;
                    error.message = 'Р/С может состоять только из 20 цифр';
                } else {
                    var coefficients = [7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1];
                    var bikRs = bik.toString().slice(-3) + rs;
                    var checksum = 0;

                    for (var i in coefficients) {
                        checksum += coefficients[i] * (bikRs[i] % 10);
                    }

                    if (checksum % 10 === 0) {
                        result = true;
                    } else {
                        error.code = 4;
                        error.message = 'Неправильное контрольное число';
                    }
                }

                let returnObj = {result, error};

                state.urikValidation = returnObj;

                this.dispatch('SAVE_URIKS_DATA', obj)

                return returnObj;
        },
        setDeliveryIndex(state, data) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });
            $.ajax({
                method: "POST",
                url: '/setIndex',
                data,
                success: function (data) {
                    state.customerIndex = data;
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        },
        removeDeliveryTypeError() {
            let block = document.querySelector('#delivery_type');
                block.classList.remove('deliveryTypeError');
        },
        deliveryTypeError(state) {
            let block = document.querySelector('#delivery_type');
                block.classList.add('deliveryTypeError');
            state.deliveryType = 'error';
        },
        applyDeliveryAdress(state, data) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });

            $.ajax({
                method: "POST",
                url: '/setAdress',
                data,
                success: function (data) {
                    state.customerAdress = data;
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        },
        applyPriceFilter(state, name) {
            state.filteredProducts = _.orderBy(state.filteredProducts, ['price'], [name]);
        },
        setDeliveryType(state, name) {
            state.deliveryType = name;

            this.dispatch('REMOVE_DELIVERY_TYPE_ERROR');

            return state.deliveryType;
        },
        checkCartState(state) {
            axios.get('/checkCartState')
                .then(response => {
                    state.cart = response.data;
                })

            return state.cart
        },
        changeProgressStep(state) {
            let line = document.querySelector('.cart_wrap-crumb').querySelector('.active-item');
            state.cartStep++;

            if(state.cartStep === 0) {
                line.style.width = '37%';
            }

            if(state.cartStep === 1) {
                line.style.width = '65%';
            }

            if(state.cartStep === 2) {
                line.style.width = '100%';
            }
        },
        setCustomerFio(state, {firstname, lastname, tel, save}) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });

            $.ajax({
                method: "get",
                url: '/setCustomerFio',
                data: {
                    firstname, lastname, tel, save
                },
                success: function (data) {
                    state.usersInfo = data
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        },
        getUserInfo(state) {
            axios.get('/getUserInfo')
                .then(response => {
                    state.user = response.data;
                })

            return state.user
        },
        getProductById(state, id) {
            let product = state.products.filter((el) => el.id === id)
                          state.singleProduct = product[0];

            //XXX
            let amount = document.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity');
                amount.innerText = 1;
                amount.setAttribute('data-modal-val', 1);
        },
        setProductsLoaded(state, data) {
            state.productsLoaded = true;
        },
        filterProductByQuery(state, data) {
            // console.warn('filterProductByQuery', data)
            let newProducts = state.products.filter(item => {
                let param = item.params

                for (let key in data) {
                    // console.log(param[key], data[key], 'for in loop');
                    if (param[key] === undefined || param[key] != data[key])
                        return false;
                }

                return true;
            });

            if(!data.art) this.dispatch('GET_MODEL_FILTERS', data);

            state.filteredProducts = newProducts;
        },
        getProductModelFilters(state, data = {}) {
            let newProducts = state.products.filter(item => {
                let param = item.params
                for (let key in data) {
                    if (param[key] === undefined || param[key] != data[key])
                        return false;
                }

                return true;
            });

            state.modelFilters = [...new Set(newProducts.map(item => item.params.art))];
        },
        getProductBrandFilters(state) {
            state.brandFilters = [...new Set(state.products.map(item => item.params.brand))];
        },
        getProductTypeFilters(state) {
            state.typeFilters = [...new Set(state.products.map(item => item.params.type))];
        },
        addProductToCart(state, {id, amount}) {
            let that = this;
            let url = `/products/addToCartAjaxGet/${id}`;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });

            $.ajax({
                method: "get",
                url: `${url}`,
                data: {
                    id,
                    amount
                },
                success: function (data) {
                    that.dispatch('fixCartStatus', { data })
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        },
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
            let that = this;

            if(state.products.length === 0) {
                axios.get('/catalogСartridge')
                    .then(response => {
                        response.data.forEach((el) => {
                            let params = JSON.parse(el.params);
                            let cape = JSON.parse(el.cape);
                            let newCape = {};

                            cape.map((obj) => {
                                Object.keys(obj).forEach(function(key) {
                                    let str = obj[key];
                                    newCape[key] = str.trim();
                                });
                            })

                            el.price = Math.ceil(el.price);
                            el.cape = newCape;
                            el.params = params;

                        });

                        state.products = response.data;
                        state.filteredProducts = state.products;
                    })

                    .then(() => {
                        that.dispatch('COLLECT_FILTERS');
                        that.dispatch('SWITCH_PRODUCTS_LOADER');
                    })

                    .catch(err => {
                        console.log(err);
                    });
            }

            return state.products;
        }
    }
})

export default store
