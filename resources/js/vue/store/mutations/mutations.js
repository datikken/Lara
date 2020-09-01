import $ from "jquery";
import router from "../../router/router";
import _ from "lodash";
import axios from "axios/index";

let mutations = {
    sendGoogleAnalytics(state, {category, eventAction, eventLabel, eventValue}) {
        window.ga('send', 'event', category, eventAction, eventLabel, eventValue);
        console.warn('ga event', category, eventAction, eventLabel, eventValue);
    },
    catalogLoadMore(state) {
        state.catalogPerPage = state.catalogPerPage + state.catalogPerPage;
    },
    switchCatalogLayout(state) {
        state.gridCatalog = !state.gridCatalog;
        state.catalogPerPage = state.gridCatalog ? 6 : 16;
    },
    unitPay(state) {
        let obj = {
            account: state.user.id,
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
    },
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
                account: state.user.id,
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': window.token
            }
        });

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
            });

        return state.user
    },
    getProductById(state, id) {
        let amount = document.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity');
        let product = state.products.filter((el) => el.id === id)

        state.singleProduct = product[0];

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
        let arrOfArrays = [[], [], []];

        function separate(prod) {
            if (prod.params.printertype === "Принтер струйный") {
                arrOfArrays[0].push(prod)
            }
            if (prod.params.printertype === "Принтер лазерный") {
                arrOfArrays[1].push(prod)
            }
            if (prod.params.printertype === "Принтер матричный") {
                arrOfArrays[2].push(prod)
            }
        }

        products.forEach((prod) => {
            if (prod.name.indexOf(payload) >= 0) {
                separate(prod)
            }

            Object.keys(prod.cape).forEach((cape) => {
                if ((cape).indexOf(payload) >= 0) {
                    separate(prod)
                }
            })
        });

        function removeDuplicates(myArr, prop) {
            return myArr.filter((obj, pos, arr) => {
                return arr.map(mapObj => mapObj[prop]).indexOf(obj[prop]) === pos;
            });
        }

        arrOfArrays.forEach((arr, ind) => {
            arrOfArrays[ind] = removeDuplicates(arr, 'id');
        })

        state.searchProducts = arrOfArrays;
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

export default mutations;
