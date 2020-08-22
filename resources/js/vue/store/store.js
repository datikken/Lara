import Vue from 'vue'
import Vuex from 'vuex'
import $ from "jquery";
import axios from 'axios';
import router from '../router/router';
import _ from 'lodash';

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        lastTwoYearsInfo: false,
        paymentProvider: false,
        productsLoaded: false,
        closeListener: false,
        customerIndex: false,
        deliveryType: false,
        cardPayment: false,
        pickUpPoint: false,
        orderPaid: false,
        aboutData: false,
        orders: false,
        user: false,
        cart: false,
        filteredProducts: [],
        viewedProducts: [],
        modelFilters: [],
        brandFilters: [],
        typeFilters: [],
        products: [],
        customerAdress: {},
        deliveryAdress: {},
        urikValidation: {},
        singleProduct: {},
        uriksData: {},
        order: {},
        usersFIO: '',
        cartStep: 0
    },
    getters: {
        filteredProducts: state => state.filteredProducts,
        allProducts: state => state.products,
        user: state => state.user,
        deliveryType: state => state.deliveryType,
        urikValidation: state => state.urikValidation,
        orders: state => state.orders,
        pickUpPoint: state => state.pickUpPoint,
        orderPaid: state => state.orderPaid,
        paymentProvider: state => state.paymentProvider,
        aboutData: state => state.aboutData,
        lastTwoYearsInfo: state => state.lastTwoYearsInfo
    },
    actions: {
        GET_VIEWED_PRODUCTS(context) {
            context.commit('getViewedProducts');
        },
        SET_PRODUCT_VIEWED(context, id) {
            context.commit('setProductViewed', id);
        },
        GET_TWO_YEARS_INFO_BY_SELECT(context, year) {
            context.commit('getTwoYearsInfoBySelect', year);
        },
        GET_ABOUTS_YEARS(context) {
            context.commit('getAboutYears');
        },
        GET_SINGLE_ORDER_INFO(context, id) {
            context.commit('getSingleOrderInfo', id)
        },
        FINISH_CONTRACT(context) {
            context.commit('finishContract');
        },
        FINISH_ORDER_PROCESS(context) {
            context.commit('finishOrderProcess');
        },
        SET_PICKUP_POINT(context, obj) {
            context.commit('setPickUpPoint', obj);
        },
        VALIDATE_DELIVERY_ADRESS(context, form) {
            context.commit('validateDeliveryAdress', form);
        },
        GET_ALL_PRODUCTS(context) {
            context.commit('getAllProducts');
        },
        GET_ORDERS_INFO(context) {
            context.commit('getOrdersInfo');
        },
        SCROLL_TO_TOP(context) {
            context.commit('scrollToTop')
        },
        PAY_WITH_CARD(context, obj) {
            context.commit('payWithCard', obj);
        },
        SET_PAYMENT_PROVIDER(context, provider) {
            context.commit('setPaymentProvider', provider)
        },
        CREATE_ORDER(context) {
            context.commit('createOrder');
        },
        SET_URIKS_INFO(context, obj) {
            context.commit('setUriksInfo', obj);
        },
        SAVE_URIKS_DATA(context, obj) {
            context.commit('saveUriksData', obj)
        },
        VALIDATE_RS(context, obj) {
            context.commit('RSValidation', obj);
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
        SET_DELIVERY_TYPE(context, name) {
            context.commit('setDeliveryType', name);
        },
        CHECK_CART_STATE(context) {
            context.commit('checkCartState');
        },
        CHANGE_PROGRESS_STEP(context, text) {
            context.commit('changeProgressStep', text);
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
        FILTER_PRODUCTS_BY_BRAND(context, query) {
            context.commit('filterProductsByBrand', query);
        },
        FILTER_PRODUCTS_BY_MODEL(context, query) {
            context.commit('filterProductsByModel', query);
        },
        FILTER_PRODUCTS_BY_PRINTERTYPE(context, query) {
            context.commit('filterProductsByPrinterType', query);
        },
        COLLECT_FILTERS(context) {
            context.commit('getProductTypeFilters');
            context.commit('getProductModelBrandFilters');
        },
        GET_MODEL_BRAND_FILTERS(context) {
            context.commit('getProductModelBrandFilters');
        },
        fixCartStatus(state, {data}) {
            let amount = data.totalQuantity;
            let price = data.totalPrice;

            $('[data-cartamountval]').text(amount);
            $('[data-cartpriceval]').text(price);
        }
    },
    mutations: {
        getViewedProducts(state) {
                fetch(`/getViewed`, {
                    method: "GET",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': window.token
                    },
                    redirect: 'follow',
                    referrerPolicy: 'no-referrer'
                })
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    state.viewedProducts = data;
                })
                .catch((err) => {
                    console.log(err);
                })
        },
        setProductViewed(state, {pid}) {
            fetch(`/setViewed/${pid}`, {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': window.token
                },
                redirect: 'follow',
                referrerPolicy: 'no-referrer',
                body: JSON.stringify({
                    id: pid
                })
            })
            .then((response) => {
                return response.json();
            })
        },
        getTwoYearsInfoBySelect(state, year) {
            fetch('/getTwoYearsInfoBySelect', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': window.token
                },
                redirect: 'follow',
                referrerPolicy: 'no-referrer',
                body: JSON.stringify({
                    year
                })
            })
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    state.lastTwoYearsInfo = data;

                    console.log('getTwoYearsInfoBySelect', data, typeof data)
                });
        },
        getAboutYears(state) {
            fetch('/getAboutYears', {
                method: "GET"
            })
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    state.aboutData = data;
                });
        },
        getOrdersInfo(state) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });
            $.ajax({
                method: "GET",
                url: '/getOrdersInfo',
                success: function (data) {
                    state.orders = data;
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        },
        getSingleOrderInfo(state, id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });

            $.ajax({
                method: "GET",
                url: `/getSingleOrderInfo/${id}`,
                success: function (data) {
                    state.orders.last_order = data.order;
                    state.orders.last_order.id = id;
                    state.orders.last_order.total = data.total;

                    //XXX
                    document.querySelector('.order_totalPrice').innerText = data.total;
                },
                error: function (error) {
                    console.warn(error);
                }
            });

            return state.orders.last_order
        },
        finishContract() {
            console.log('send contract via email')
            //
            // router.push('/success');
            // this.SCROLL_TO_TOP();
        },
        checkPaymentError() {
            let error = document.querySelector('[data-payment-error]');
            let heading = document.querySelector('[data-payment-head]');
            let head = document.querySelector('.payment_wrap-head');

            heading.classList.add('mb10');
            head.classList.add('mb30');
            error.classList.remove('as-none');
        },
        finishOrderProcess() {
            router.push('/success');
        },
        setPickUpPoint(state, obj) {
            state.pickUpPoint = obj;
        },
        validateDeliveryAdress(state, form) {
            let valid = window.app.validator.formValidate([], $(form));
            state.deliveryAdress = valid;

            return state.deliveryAdress;
        },
        scrollToTop() {
            window.scrollTo({top: 0, behavior: 'smooth'});
        },
        payWithCard(state, obj) {
            let valid = {
                status: false,
                errors: []
            };

            if (parseInt(obj.month) === 'NaN') {
                valid.errors.push('Месяц не выбран')
            }
            if (parseInt(obj.year) === 'NaN') {
                valid.errors.push('Год не выбран')
            }
            if (obj.card_num === '') {
                valid.errors.push('Неправильный номер карты')
            }
            if (obj.cvv === '') {
                valid.errors.push('Незаполнен cvv')
            }
            if (obj.card_name === '') {
                valid.errors.push('Незаполнено имя карты')
            }
            if (valid.errors.length === 0) {
                valid.status = true;
            }

            let checkout = new cp.Checkout(
                // public id из личного кабинета
                "test_api_00000000000000000000001",
                document.getElementById("paymentFormSample")
            );

            function createCryptogram() {
                var result = checkout.createCryptogramPacket();

                if (result.success) {
                    state.orderPaid = true;
                }
                else {
                    for (var msgName in result.messages) {
                        alert(result.messages[msgName]);
                    }
                }
            }

            if (valid) {
                createCryptogram();
            }
        },
        setPaymentProvider(state, provider) {
            state.paymentProvider = provider;
            let paymentBlock = document.querySelector('.payment_wrap');
            let checkboxes = paymentBlock.querySelectorAll('.checkbox');

            let nal = paymentBlock.querySelector('[ data-checkNal]');
            let card = paymentBlock.querySelector('[data-checkCard]');

            checkboxes.forEach((box) => {
                let img = box.querySelector('img')
                img.classList.add('invisible');

                box.setAttribute('checked', false);
            })

            function process(item) {
                let box = item.querySelector('.checkbox')
                let img = item.querySelector('img')

                box.setAttribute('checked', true)
                img.classList.remove('invisible')
            }

            if (provider.indexOf('Mastercard') > 0) {
                state.cardPayment = true
                process(card)
            } else {
                state.cardPayment = false
                process(nal)
            }

            console.warn('before setpayment', state.order)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });

            $.ajax({
                method: "POST",
                url: '/setPaymentProvider',
                data: {
                    provider,
                    orderId: state.order.order_id
                },
                success: function (data) {
                    console.warn(data);
                },
                error: function (error) {
                    console.warn(error);
                }
            });


            return state.paymentProvider;
        },
        createOrder(state) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });
            $.ajax({
                method: "GET",
                url: '/createOrder',
                success: function (data) {
                    state.order = data;

                    console.warn('create order', data);
                },
                error: function (error) {
                    console.warn(error);
                }
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

            this.dispatch('SAVE_URIKS_DATA', obj);

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
            //search by printer not cartridge
            state.filteredProducts = _.orderBy(state.filteredProducts, ['price'], [name]);
        },
        setDeliveryType(state, name) {
            state.deliveryType = name;

            this.dispatch('REMOVE_DELIVERY_TYPE_ERROR');

            return state.deliveryType;
        },
        checkCartState(state) {
            if (localStorage.getItem('cart')) {
                state.cart = JSON.parse(localStorage.getItem('cart'));
            }

            if (!state.cart) {
                axios.get('/checkCartState')
                    .then(response => {
                        state.cart = response.data;
                        localStorage.setItem('cart', JSON.stringify(response.data));
                    })
            }

            return state.cart
        },
        changeProgressStep(state, text) {
            let line = document.querySelector('.cart_wrap-crumb').querySelector('.active-item');

            if (state.cartStep === 0) {
                line.style.width = '37%';
            }
            if (state.cartStep === 1) {
                line.style.width = '65%';
            }
            if (state.cartStep === 2) {
                line.style.width = '100%';
            }
            if (text) {
                line.style.width = '100%';
            }

            state.cartStep++;
        },
        setUriksInfo(state, obj) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.token
                }
            });

            $.ajax({
                method: "get",
                url: '/setUrikInfo',
                data: obj,
                success: function (data) {
                    state.usersInfo = data
                },
                error: function (error) {
                    console.warn(error);
                }
            });
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
        setProductsLoaded(state) {
            state.productsLoaded = true;
        },
        filterProductsByBrand(state, query) {
            let newProducts = [];

            state.products.forEach((prdt) => {
                let cape = JSON.stringify(Object.keys(prdt.cape));

                if (cape.indexOf(query.brand) >= 0) {
                    newProducts.push(prdt)
                }
            });

            if (newProducts.length > 0) {
                state.filteredProducts = newProducts;
            }
        },
        filterProductsByPrinterType(state, query) {
            let newProducts = [];

            state.products.forEach((prdt) => {
                let param = prdt.params;
                if (param.printertype === query.printertype) {
                    newProducts.push(prdt)
                }
            });

            state.filteredProducts = newProducts;
        },
        filterProductsByModel(state, query) {
            let newProducts = [];

            state.products.forEach((prdt) => {
                let cape = JSON.stringify(Object.values(prdt.cape));

                if (cape.indexOf(query.model) >= 0) {
                    newProducts.push(prdt)
                }
            });

            if (newProducts.length > 0) {
                state.filteredProducts = newProducts;
            }
        },
        filterProductByQuery(state, query) {
            if (query.printertype) {
                this.dispatch('FILTER_PRODUCTS_BY_PRINTERTYPE', query);
            }
            if (query.brand) {
                this.dispatch('FILTER_PRODUCTS_BY_BRAND', query)
            }
            if (query.model) {
                this.dispatch('FILTER_PRODUCTS_BY_MODEL', query)
            }

            if (Object.keys(query).length === 0) {
                state.filteredProducts = state.products
            }

            this.dispatch('GET_MODEL_BRAND_FILTERS')
        },
        getProductTypeFilters(state) {
            state.typeFilters = [...new Set(state.products.map(item => item.params.printertype))];
        },
        getProductModelBrandFilters(state) {
            let allProductBrands = [];
            let allProductModels = [];

            state.filteredProducts.map((prdct) => {
                let cape = prdct.cape;
                let brands = Object.keys(cape);
                let models = Object.values(cape);

                brands.forEach(brand => allProductBrands.push(brand));
                models.forEach(model => allProductModels.push(model));
            })

            state.brandFilters = [...new Set(allProductBrands)];
            state.modelFilters = [...new Set(allProductModels)];
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

                    console.warn('addToCartAjaxGet', data)

                    that.dispatch('fixCartStatus', {data})
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
                if (prod.name.indexOf(payload) >= 0) {
                    state.filteredProducts.push(prod);
                }
            });

            state.closeListener = true;
        },
        getAllProducts(state) {
            let that = this;

            if (state.products.length === 0) {
                axios.get('/catalogСartridge')
                    .then(response => {
                        response.data.forEach((el) => {
                            let params = JSON.parse(el.params);
                            let cape = JSON.parse(el.cape);
                            let newCape = {};

                            cape.map((obj) => {
                                Object.keys(obj).forEach(function (key) {
                                    let str = obj[key];
                                    newCape[key] = str.trim();
                                });
                            })

                            el.price = Math.ceil(el.price);
                            el.params = params;
                            el.cape = newCape;
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
