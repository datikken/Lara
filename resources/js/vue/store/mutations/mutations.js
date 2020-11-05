import $ from "jquery";
import _ from "lodash";
import axios from "axios";

import router from "../../router/router";
import {
    createMagicBtn,
    showNotification,
    blockFormInputs
} from './utils/index'
import {sendGoogleAnalytics} from './utils/analytics'
import {changeProgressStep} from './cart/utils'

import {
    getAllProducts,
    getFilteredProducts,
    addProductToCart,
    getProductModelFilters,
    getProductTypeFilters,
    filterProductsByModel,
    filterProductByQuery,
    getProductById,
    getProductModelBrandFilters,
    filterProductsByPrinterType,
    filterProductsByBrand,
    setProductsLoaded,
    getViewedProducts,
    setProductViewed
} from './products/index'

let mutations = {
    createMagicBtn,
    showNotification,
    blockFormInputs,

    sendGoogleAnalytics,
    changeProgressStep,
    getAllProducts,
    getFilteredProducts,
    addProductToCart,
    getProductModelFilters,
    getProductTypeFilters,
    filterProductsByModel,
    filterProductByQuery,
    getProductById,
    getProductModelBrandFilters,
    filterProductsByPrinterType,
    filterProductsByBrand,
    setProductsLoaded,
    getViewedProducts,
    setProductViewed,

    setOfertaPolicyState(state, val) {
        state.ofertaPolicy = val;
    },
    setDeliveryAdress(state, adr) {
        state.deliveryAdress = null;
        state.deliveryAdress = adr;
    },
    setReadyToGo(state, val) {
        state.readyToGo = null;
        state.readyToGo = val;

        console.log('setReadyToGo', val)

        if (state.readyToGo) {
            state.blockDeliveryHelper = true;
        }
    },
    setAdditionalForms(state, str) {
        state.showAditionalForms = null;

        setTimeout(() => (state.showAditionalForms = str), 50);
    },
    proceedWithLastDeliveryAdress(state, adr) {
        state.deliveryAdress = adr;
        state.prevDelAdrAccepted = true;
    },
    getLastDeliveryAdress(state) {
        if (!state.lastDeliveryAdress) {
            $.ajax({
                method: "GET",
                url: '/getLastDeliveryAdress',
                success: function (data) {
                    if (data != '') {
                        let orderInfoAddr = JSON.parse(data.order_info);

                        if (orderInfoAddr) {
                            state.lastDeliveryAdress = orderInfoAddr;
                        }

                    } else {
                        state.lastDeliveryAdress = null;
                    }
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        }
    },
    checkDeliveryAdress(state, {city, street, house, body, building}) {
        let that = this;

        fetch('/checkAdressInDadata', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.token
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify({city, street, house, body, building})
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                state.deliveryType = 'post';
                state.deliveryAllowed = 'post';
                state.deliveryAdress = data.result;

                if (data.result.indexOf('Москва') >= 0) {
                    state.deliveryType = 'any'
                    state.deliveryAllowed = 'any';
                }
            })
            .then(() => {
                that.dispatch('SHOW_DELIVERY_TYPE_HELPER');
            })
    },
    setDeliveryIndex(state, data) {
        let that = this;

        state.customerIndex = null;
        state.deliveryType = null;
        state.deliveryAllowed = null;

        fetch('/setIndex', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.token
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify(data)
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                state.customerIndex = data;
                state.deliveryType = 'post';
                state.deliveryAllowed = 'post';

                if (data.suggestedOffice[0]) {
                    state.deliveryAdress = data.suggestedOffice[0].unrestricted_value + `, ${data.suggestedOffice[0].value}`;

                    if (data.suggestedOffice[0].unrestricted_value.indexOf('Москва') >= 0) {
                        state.deliveryType = 'any';
                        state.deliveryAllowed = 'any';
                    }
                }
            })
            .then(() => {
                that.dispatch('SHOW_DELIVERY_TYPE_HELPER');
            })
            .catch(err => {
                console.error('setDeliveryIndex', err)
            })
    },
    applyDeliveryAdress(state, data) {
        state.deliveryAdress = null;

        $.ajax({
            method: "POST",
            url: '/setAdress',
            data,
            success: function (data) {
                state.deliveryAdress = data;
            },
            error: function (error) {
                console.warn(error);
            }
        });
    },
    checkDeliveryPickups(state, {name, adr}) {
        state.stockDeliveryPickup = null;
        state.stockDeliveryPickup = {name, adr};

        fetch('/setStockPickUpPoint', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.token
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify({
                name,
                adr
            })
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                state.pickUpPoint = data;
            })
            .catch((err) => {
                console.log(err);
            })
    },
    removeDeliveryTypeError() {
        let block = document.querySelector('#delivery_type');
        block.classList.remove('deliveryTypeError');
    }
    ,
    deliveryTypeError(state) {
        let block = document.querySelector('#delivery_type');
        block.classList.add('deliveryTypeError');
        state.deliveryType = 'error';
    }
    ,
    getAllInformationPosts(state) {
        fetch('/getAllInformationPosts', {
            method: "GET"
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                state.informationPosts = data;
            });
    }
    ,
    showDeliveryTypeHelper() {
        let helper = document.querySelector('[data-delivery-type_helper]');
        helper.classList.add('no_opacity');
    }
    ,
    catalogLoadMore(state) {
        state.catalogPerPage = state.catalogPerPage + state.catalogPerPage;
    }
    ,
    switchCatalogLayout(state) {
        state.gridCatalog = !state.gridCatalog;
        state.catalogPerPage = state.gridCatalog ? 6 : 16;
    }
    ,
    unitPay(state) {
        let obj = {
            account: state.user.id ? state.user.id : 'unregistered',
            currency: 'RUB',
            desc: "Описание платежа",
            sum: state.cart.totalPrice,
            domainName: "unitpay.ru",
            signature: state.signatureHash,
            publicKey: "315491-97428"
        };

        let payment = new UnitPay();
        payment.createWidget(obj);
        payment.success(function (params) {
            console.log('Успешный платеж');
        });
        payment.error(function (message, params) {
            console.log(message);
        });

        return false;
    }
    ,
    createSignatureHash(state) {
        let that = this;

        fetch('/createSignatureHash', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.token
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify({
                account: state.user.id ? state.user.id : 'unregistered',
                currency: 'RUB',
                desc: "Описание платежа",
                sum: state.cart.totalPrice
            })
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                state.signatureHash = data.hash;
                that.dispatch('UNIT_PAY');
            })
            .catch((err) => {
                console.log(err);
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
            });
    }
    ,
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
    }
    ,
    getOrdersInfo(state) {
        if (state.orders) {
            $.ajax({
                method: "GET",
                url: '/getOrdersInfo',
                success: function (data) {
                    if (typeof data === 'object') {
                        state.orders = data;
                    } else {
                        state.orders = false;
                    }
                },
                error: function (error) {
                    console.warn(error);
                }
            });
        }
    },
    getSingleOrderInfo(state, id) {
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
    }
    ,
    finishContract() {
        console.log('send contract via email')
        // router.push('/success');
        // this.SCROLL_TO_TOP();
    }
    ,
    checkPaymentError() {
        let error = document.querySelector('[data-payment-error]');
        let heading = document.querySelector('[data-payment-head]');
        let head = document.querySelector('.payment_wrap-head');

        heading.classList.add('mb10');
        head.classList.add('mb30');
        error.classList.remove('as-none');
    }
    ,
    finishOrderProcess() {
        router.push('/success');
    }
    ,
    setPickUpPoint(state, obj) {
        state.pickUpPoint = obj;
    }
    ,
    validateDeliveryAdress(state, form) {
        let valid = window.app.validator.formValidate([], $(form));
        state.deliveryAdress = valid;

        return state.deliveryAdress;
    }
    ,
    scrollToTop() {
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
    ,
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
    }
    ,
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

        if (provider.indexOf('Mastercard') >= 0) {
            state.cardPayment = true
            process(card)
        } else {
            state.cardPayment = false
            process(nal)
        }

        $.ajax({
            method: "GET",
            url: '/setPaymentProvider',
            data: {
                provider
            },
            success: function (data) {
                // console.warn(data);
            },
            error: function (error) {
                console.warn(error);
            }
        });

        console.warn('tes', state.paymentProvider)

        return state.paymentProvider;
    }
    ,
    createOrder(state) {
        $.ajax({
            method: "GET",
            url: '/createOrder',
            success: function (data) {
                state.order = data;
            },
            error: function (error) {
                console.warn(error);
            }
        });
    }
    ,
    saveUriksData(state, obj) {
        state.uriksData = obj;
    }
    ,
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
            let coefficients = [7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1];
            let bikRs = bik.toString().slice(-3) + rs;
            let checksum = 0;

            for (let i in coefficients) {
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
    }
    ,
    applyPriceFilter(state, name) {
        state.filteredProducts = _.orderBy(state.filteredProducts, ['price'], [name]);
    }
    ,
    setDeliveryType(state, name) {
        state.deliveryType = null;
        state.deliveryType = name;

        this.dispatch('REMOVE_DELIVERY_TYPE_ERROR');

        return state.deliveryType;
    }
    ,
    checkCartState(state) {
        axios.get('/checkCartState')
            .then(response => {
                state.cart = response.data;
                // localStorage.setItem('cart', JSON.stringify(response.data));
            })

        return state.cart
    },
    refreshCutomerData(state, data) {
        fetch('/home/collectProfileData', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.token
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify(data)
        })
            .then(res => {
            })
            .catch(err => console.error('collectProfileData', err))
    }
    ,
    setUriksInfo(state, obj) {
        if (!state.usersInfo) {
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
        }
    },
    setCustomerFio(state, {firstname, lastname, tel, save}) {
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
    }
    ,
    getUserInfo(state) {
        if (!state.user) {
            axios.get('/getUserInfo')
                .then(response => {
                    state.user = response.data;
                });

            return state.user
        }
    },
    setCloseListener(state, payload) {
        state.closeListener = payload;
    }
}

export default mutations;
