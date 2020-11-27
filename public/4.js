(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[4],{

/***/ "./resources/js/components/Notifications.js":
/*!**************************************************!*\
  !*** ./resources/js/components/Notifications.js ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/*
    @message - displayed in notification
    @status - notification style
    @pos
    @timeout
 */
var Notifications = /*#__PURE__*/function () {
  _createClass(Notifications, [{
    key: "checkPosition",
    value: function checkPosition() {
      var fixedTop = document.querySelector('.topFixedMenu');
      var notification = document.querySelector('.uk-notification');

      if (fixedTop) {
        notification.style.top = '50px';
      }

      window.addEventListener('scroll', function () {
        var notification = document.querySelector('.uk-notification');

        if (window.pageYOffset >= 60) {
          if (notification) {
            notification.style.top = '50px';
          }
        } else {
          if (notification) {
            notification.style.top = '56px';
          }
        }
      });
    }
  }, {
    key: "show",
    value: function show() {
      var defParams = {
        message: status.message,
        status: 'primary',
        pos: 'top-center',
        timeout: 5000
      };

      if (this.params) {
        defParams = this.params;
      }

      UIkit.notification(defParams);
      this.checkPosition();
    }
  }, {
    key: "hide",
    value: function hide() {
      UIkit.notification.closeAll();
    }
  }]);

  function Notifications(params) {
    _classCallCheck(this, Notifications);

    this.params = params;
  }

  return Notifications;
}();

/* harmony default export */ __webpack_exports__["default"] = (Notifications);

/***/ }),

/***/ "./resources/js/vue/store/actions/actions.js":
/*!***************************************************!*\
  !*** ./resources/js/vue/store/actions/actions.js ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

var actions = {
  SET_OFERTA_POLICY_STATE: function SET_OFERTA_POLICY_STATE(context, val) {
    context.commit('setOfertaPolicyState', val);
  },
  SET_DELIVERY_ADRESS: function SET_DELIVERY_ADRESS(context, adr) {
    context.commit('setDeliveryAdress', adr);
  },
  PROCEED_WITH_LAST_DELIVERY_ADRESS: function PROCEED_WITH_LAST_DELIVERY_ADRESS(context, adr) {
    context.commit('proceedWithLastDeliveryAdress', adr);
  },
  CREATE_MAGIC_BTN: function CREATE_MAGIC_BTN(context, btn) {
    context.commit('createMagicBtn', btn);
  },
  SET_READY_TO_GO: function SET_READY_TO_GO(context, val) {
    context.commit('setReadyToGo', val);
  },
  SET_ADDITIONAL_FORMS: function SET_ADDITIONAL_FORMS(context, str) {
    context.commit('setAdditionalForms', str);
  },
  VALIDATE_POST_DELIVERY_FORM: function VALIDATE_POST_DELIVERY_FORM(context) {
    context.commit('validatePostDeliveryForm');
  },
  GET_LAST_DELIVERY_ADRESS: function GET_LAST_DELIVERY_ADRESS(context) {
    context.commit('getLastDeliveryAdress');
  },
  BLOCK_FORM_INPUTS: function BLOCK_FORM_INPUTS(context, el) {
    context.commit('blockFormInputs', el);
  },
  REFRESH_CUTOMER_DATA: function REFRESH_CUTOMER_DATA(context, data) {
    context.commit('refreshCutomerData', data);
  },
  CHECK_DELIVERY_ADRESS: function CHECK_DELIVERY_ADRESS(context, adrObj) {
    context.commit('checkDeliveryAdress', adrObj);
  },
  CHECK_DELIVERY_PICKUPS: function CHECK_DELIVERY_PICKUPS(context, pickup) {
    context.commit('checkDeliveryPickups', pickup);
  },
  GET_ALL_INFORMATION_POSTS: function GET_ALL_INFORMATION_POSTS(context) {
    context.commit('getAllInformationPosts');
  },
  SHOW_DELIVERY_TYPE_HELPER: function SHOW_DELIVERY_TYPE_HELPER(context) {
    context.commit('showDeliveryTypeHelper');
  },
  SEND_GOOGLE_ANALYTICS: function SEND_GOOGLE_ANALYTICS(context, obj) {
    context.commit('sendGoogleAnalytics', obj);
  },
  CATALOG_LOAD_MORE: function CATALOG_LOAD_MORE(context) {
    context.commit('catalogLoadMore');
  },
  SWITCH_CATALOG_LAYOUT: function SWITCH_CATALOG_LAYOUT(context) {
    context.commit('switchCatalogLayout');
  },
  UNIT_PAY: function UNIT_PAY(context) {
    context.commit('unitPay');
  },
  CREATE_SIGNATURE_HASH: function CREATE_SIGNATURE_HASH(context, obj) {
    context.commit('createSignatureHash', obj);
  },
  GET_VIEWED_PRODUCTS: function GET_VIEWED_PRODUCTS(context) {
    context.commit('getViewedProducts');
  },
  SET_PRODUCT_VIEWED: function SET_PRODUCT_VIEWED(context, id) {
    context.commit('setProductViewed', id);
  },
  GET_TWO_YEARS_INFO_BY_SELECT: function GET_TWO_YEARS_INFO_BY_SELECT(context, year) {
    context.commit('getTwoYearsInfoBySelect', year);
  },
  GET_ABOUTS_YEARS: function GET_ABOUTS_YEARS(context) {
    context.commit('getAboutYears');
  },
  GET_SINGLE_ORDER_INFO: function GET_SINGLE_ORDER_INFO(context, id) {
    context.commit('getSingleOrderInfo', id);
  },
  FINISH_CONTRACT: function FINISH_CONTRACT(context) {
    context.commit('finishContract');
  },
  FINISH_ORDER_PROCESS: function FINISH_ORDER_PROCESS(context) {
    context.commit('finishOrderProcess');
  },
  SET_PICKUP_POINT: function SET_PICKUP_POINT(context, obj) {
    context.commit('setPickUpPoint', obj);
  },
  VALIDATE_DELIVERY_ADRESS: function VALIDATE_DELIVERY_ADRESS(context, form) {
    context.commit('validateDeliveryAdress', form);
  },
  GET_ALL_PRODUCTS: function GET_ALL_PRODUCTS(context) {
    context.commit('getAllProducts');
  },
  GET_ORDERS_INFO: function GET_ORDERS_INFO(context) {
    context.commit('getOrdersInfo');
  },
  SCROLL_TO_TOP: function SCROLL_TO_TOP(context) {
    context.commit('scrollToTop');
  },
  PAY_WITH_CARD: function PAY_WITH_CARD(context, obj) {
    context.commit('payWithCard', obj);
  },
  SET_PAYMENT_PROVIDER: function SET_PAYMENT_PROVIDER(context, provider) {
    context.commit('setPaymentProvider', provider);
  },
  CREATE_ORDER: function CREATE_ORDER(context) {
    context.commit('createOrder');
  },
  SET_URIKS_INFO: function SET_URIKS_INFO(context, obj) {
    context.commit('setUriksInfo', obj);
  },
  SAVE_URIKS_DATA: function SAVE_URIKS_DATA(context, obj) {
    context.commit('saveUriksData', obj);
  },
  VALIDATE_RS: function VALIDATE_RS(context, obj) {
    context.commit('RSValidation', obj);
  },
  SET_DELIVERY_INDEX: function SET_DELIVERY_INDEX(context, obj) {
    context.commit('setDeliveryIndex', obj);
  },
  REMOVE_DELIVERY_TYPE_ERROR: function REMOVE_DELIVERY_TYPE_ERROR(context) {
    context.commit('removeDeliveryTypeError');
  },
  DELIVERY_TYPE_ERROR: function DELIVERY_TYPE_ERROR(context) {
    context.commit('deliveryTypeError');
  },
  APPLY_DELIVERY_ADRESS: function APPLY_DELIVERY_ADRESS(context, data) {
    context.commit('applyDeliveryAdress', data);
  },
  PRICE_FILTER: function PRICE_FILTER(context, name) {
    context.commit('applyPriceFilter', name);
  },
  SET_DELIVERY_TYPE: function SET_DELIVERY_TYPE(context, name) {
    context.commit('setDeliveryType', name);
  },
  CHECK_CART_STATE: function CHECK_CART_STATE(context) {
    context.commit('checkCartState');
  },
  CHANGE_PROGRESS_STEP: function CHANGE_PROGRESS_STEP(context, text) {
    context.commit('changeProgressStep', text);
  },
  SET_CUSTOMER_FIO: function SET_CUSTOMER_FIO(context, obj) {
    context.commit('setCustomerFio', obj);
  },
  GET_USERS_INFO: function GET_USERS_INFO(context) {
    context.commit('getUserInfo');
  },
  ADD_PRODUCT_TO_CART: function ADD_PRODUCT_TO_CART(context, _ref) {
    var id = _ref.id,
        amount = _ref.amount;
    context.commit('addProductToCart', {
      id: id,
      amount: amount
    });
  },
  GET_PRODUCT_BY_ID: function GET_PRODUCT_BY_ID(context, id) {
    context.commit('getProductById', id);
  },
  SWITCH_PRODUCTS_LOADER: function SWITCH_PRODUCTS_LOADER(context) {
    context.commit('setProductsLoaded');
  },
  FILTER_PRODUCTS: function FILTER_PRODUCTS(context, data) {
    context.commit('filterProductByQuery', data);
  },
  FILTER_PRODUCTS_BY_BRAND: function FILTER_PRODUCTS_BY_BRAND(context, query) {
    context.commit('filterProductsByBrand', query);
  },
  FILTER_PRODUCTS_BY_MODEL: function FILTER_PRODUCTS_BY_MODEL(context, query) {
    context.commit('filterProductsByModel', query);
  },
  FILTER_PRODUCTS_BY_PRINTERTYPE: function FILTER_PRODUCTS_BY_PRINTERTYPE(context, query) {
    context.commit('filterProductsByPrinterType', query);
  },
  COLLECT_FILTERS: function COLLECT_FILTERS(context) {
    context.commit('getProductTypeFilters');
    context.commit('getProductModelBrandFilters');
  },
  GET_MODEL_BRAND_FILTERS: function GET_MODEL_BRAND_FILTERS(context) {
    context.commit('getProductModelBrandFilters');
  },
  SHOW_NOTIFICATION: function SHOW_NOTIFICATION(context, msg, type) {
    context.commit('showNotification', msg, type);
  },
  fixCartStatus: function fixCartStatus(state, _ref2) {
    var data = _ref2.data;
    var amount = data.totalQuantity;
    var price = data.totalPrice;
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('[data-cartIcon]').attr('src', '/images/menu/cart.svg');
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('[data-cartamountval]').text(amount);
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('[data-cartpriceval]').text(price);
  }
};
/* harmony default export */ __webpack_exports__["default"] = (actions);

/***/ }),

/***/ "./resources/js/vue/store/getters/getters.js":
/*!***************************************************!*\
  !*** ./resources/js/vue/store/getters/getters.js ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var getters = {
  user: function user(state) {
    return state.user;
  },
  searchProducts: function searchProducts(state) {
    return state.searchProducts;
  },
  filteredProducts: function filteredProducts(state) {
    return state.filteredProducts;
  },
  allProducts: function allProducts(state) {
    return state.products;
  },
  deliveryType: function deliveryType(state) {
    return state.deliveryType;
  },
  urikValidation: function urikValidation(state) {
    return state.urikValidation;
  },
  orders: function orders(state) {
    return state.orders;
  },
  pickUpPoint: function pickUpPoint(state) {
    return state.pickUpPoint;
  },
  orderPaid: function orderPaid(state) {
    return state.orderPaid;
  },
  paymentProvider: function paymentProvider(state) {
    return state.paymentProvider;
  },
  aboutData: function aboutData(state) {
    return state.aboutData;
  },
  lastTwoYearsInfo: function lastTwoYearsInfo(state) {
    return state.lastTwoYearsInfo;
  },
  gridCatalog: function gridCatalog(state) {
    return state.gridCatalog;
  },
  catalogPerPage: function catalogPerPage(state) {
    return state.catalogPerPage;
  },
  cart: function cart(state) {
    return state.cart;
  },
  informationPosts: function informationPosts(state) {
    return state.informationPosts;
  },
  customerIndex: function customerIndex(state) {
    return state.customerIndex;
  },
  stockDeliveryPickup: function stockDeliveryPickup(state) {
    return state.stockDeliveryPickup;
  },
  lastDeliveryAdress: function lastDeliveryAdress(state) {
    return state.lastDeliveryAdress;
  },
  deliveryAdress: function deliveryAdress(state) {
    return state.deliveryAdress;
  },
  showAditionalForms: function showAditionalForms(state) {
    return state.showAditionalForms;
  },
  readyToGo: function readyToGo(state) {
    return state.readyToGo;
  },
  deliveryAllowed: function deliveryAllowed(state) {
    return state.deliveryAllowed;
  },
  blockDeliveryHelper: function blockDeliveryHelper(state) {
    return state.blockDeliveryHelper;
  },
  prevDelAdrAccepted: function prevDelAdrAccepted(state) {
    return state.prevDelAdrAccepted;
  },
  ofertaPolicy: function ofertaPolicy(state) {
    return state.ofertaPolicy;
  },
  cartStep: function cartStep(state) {
    return state.cartStep;
  },
  viewedProducts: function viewedProducts(state) {
    return state.viewedProducts;
  }
};
/* harmony default export */ __webpack_exports__["default"] = (getters);

/***/ }),

/***/ "./resources/js/vue/store/mutations/cart/utils.js":
/*!********************************************************!*\
  !*** ./resources/js/vue/store/mutations/cart/utils.js ***!
  \********************************************************/
/*! exports provided: changeProgressStep */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "changeProgressStep", function() { return changeProgressStep; });
var changeProgressStep = function changeProgressStep(state, text) {
  state.cartStep = text;
};



/***/ }),

/***/ "./resources/js/vue/store/mutations/mutations.js":
/*!*******************************************************!*\
  !*** ./resources/js/vue/store/mutations/mutations.js ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _router_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../router/router */ "./resources/js/vue/router/router.js");
/* harmony import */ var _utils_index__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./utils/index */ "./resources/js/vue/store/mutations/utils/index.js");
/* harmony import */ var _utils_analytics__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./utils/analytics */ "./resources/js/vue/store/mutations/utils/analytics.js");
/* harmony import */ var _cart_utils__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./cart/utils */ "./resources/js/vue/store/mutations/cart/utils.js");
/* harmony import */ var _products_index__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./products/index */ "./resources/js/vue/store/mutations/products/index.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }









var mutations = {
  createMagicBtn: _utils_index__WEBPACK_IMPORTED_MODULE_4__["createMagicBtn"],
  showNotification: _utils_index__WEBPACK_IMPORTED_MODULE_4__["showNotification"],
  blockFormInputs: _utils_index__WEBPACK_IMPORTED_MODULE_4__["blockFormInputs"],
  sendGoogleAnalytics: _utils_analytics__WEBPACK_IMPORTED_MODULE_5__["sendGoogleAnalytics"],
  changeProgressStep: _cart_utils__WEBPACK_IMPORTED_MODULE_6__["changeProgressStep"],
  getAllProducts: _products_index__WEBPACK_IMPORTED_MODULE_7__["getAllProducts"],
  getFilteredProducts: _products_index__WEBPACK_IMPORTED_MODULE_7__["getFilteredProducts"],
  addProductToCart: _products_index__WEBPACK_IMPORTED_MODULE_7__["addProductToCart"],
  getProductModelFilters: _products_index__WEBPACK_IMPORTED_MODULE_7__["getProductModelFilters"],
  getProductTypeFilters: _products_index__WEBPACK_IMPORTED_MODULE_7__["getProductTypeFilters"],
  filterProductsByModel: _products_index__WEBPACK_IMPORTED_MODULE_7__["filterProductsByModel"],
  filterProductByQuery: _products_index__WEBPACK_IMPORTED_MODULE_7__["filterProductByQuery"],
  getProductById: _products_index__WEBPACK_IMPORTED_MODULE_7__["getProductById"],
  getProductModelBrandFilters: _products_index__WEBPACK_IMPORTED_MODULE_7__["getProductModelBrandFilters"],
  filterProductsByPrinterType: _products_index__WEBPACK_IMPORTED_MODULE_7__["filterProductsByPrinterType"],
  filterProductsByBrand: _products_index__WEBPACK_IMPORTED_MODULE_7__["filterProductsByBrand"],
  setProductsLoaded: _products_index__WEBPACK_IMPORTED_MODULE_7__["setProductsLoaded"],
  getViewedProducts: _products_index__WEBPACK_IMPORTED_MODULE_7__["getViewedProducts"],
  setProductViewed: _products_index__WEBPACK_IMPORTED_MODULE_7__["setProductViewed"],
  setOfertaPolicyState: function setOfertaPolicyState(state, val) {
    state.ofertaPolicy = val;
  },
  setDeliveryAdress: function setDeliveryAdress(state, adr) {
    state.deliveryAdress = null;
    state.deliveryAdress = adr;
  },
  setReadyToGo: function setReadyToGo(state, val) {
    state.readyToGo = null;
    state.readyToGo = val;
    console.log('setReadyToGo', val);

    if (state.readyToGo) {
      state.blockDeliveryHelper = true;
    }
  },
  setAdditionalForms: function setAdditionalForms(state, str) {
    state.showAditionalForms = null;
    setTimeout(function () {
      return state.showAditionalForms = str;
    }, 50);
  },
  proceedWithLastDeliveryAdress: function proceedWithLastDeliveryAdress(state, adr) {
    state.deliveryAdress = adr;
    state.prevDelAdrAccepted = true;
  },
  getLastDeliveryAdress: function getLastDeliveryAdress(state) {
    if (!state.lastDeliveryAdress) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
        method: "GET",
        url: '/getLastDeliveryAdress',
        success: function success(data) {
          if (data != '') {
            var orderInfoAddr = JSON.parse(data.order_info);

            if (orderInfoAddr) {
              state.lastDeliveryAdress = orderInfoAddr;
            }
          } else {
            state.lastDeliveryAdress = null;
          }
        },
        error: function error(_error) {
          console.warn(_error);
        }
      });
    }
  },
  checkDeliveryAdress: function checkDeliveryAdress(state, _ref) {
    var city = _ref.city,
        street = _ref.street,
        house = _ref.house,
        body = _ref.body,
        building = _ref.building;
    var that = this;
    fetch('/checkAdressInDadata', {
      method: "POST",
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': window.token
      },
      redirect: 'follow',
      referrerPolicy: 'no-referrer',
      body: JSON.stringify({
        city: city,
        street: street,
        house: house,
        body: body,
        building: building
      })
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      state.deliveryType = 'post';
      state.deliveryAllowed = 'post';
      state.deliveryAdress = data.result;

      if (data.result.indexOf('Москва') >= 0) {
        state.deliveryType = 'any';
        state.deliveryAllowed = 'any';
      }
    }).then(function () {
      that.dispatch('SHOW_DELIVERY_TYPE_HELPER');
    });
  },
  setDeliveryIndex: function setDeliveryIndex(state, data) {
    var that = this;
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
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      state.customerIndex = data;
      state.deliveryType = 'post';
      state.deliveryAllowed = 'post';
      console.warn(data);

      if (data.suggestedOffice[0]) {
        state.deliveryAdress = data.suggestedOffice[0].unrestricted_value + ", ".concat(data.suggestedOffice[0].value);

        if (data.suggestedOffice[0].unrestricted_value.indexOf('Москва') >= 0) {
          state.deliveryType = 'any';
          state.deliveryAllowed = 'any';
        }
      }
    }).then(function () {
      that.dispatch('SHOW_DELIVERY_TYPE_HELPER');
    })["catch"](function (err) {
      console.error('setDeliveryIndex', err);
    });
  },
  applyDeliveryAdress: function applyDeliveryAdress(state, data) {
    state.deliveryAdress = null;
    jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
      method: "POST",
      url: '/setAdress',
      data: data,
      success: function success(data) {
        state.deliveryAdress = data;
      },
      error: function error(_error2) {
        console.warn(_error2);
      }
    });
  },
  checkDeliveryPickups: function checkDeliveryPickups(state, _ref2) {
    var name = _ref2.name,
        adr = _ref2.adr;
    state.stockDeliveryPickup = null;
    state.stockDeliveryPickup = {
      name: name,
      adr: adr
    };
    fetch('/setStockPickUpPoint', {
      method: "POST",
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': window.token
      },
      redirect: 'follow',
      referrerPolicy: 'no-referrer',
      body: JSON.stringify({
        name: name,
        adr: adr
      })
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      state.pickUpPoint = data;
    })["catch"](function (err) {
      console.log(err);
    });
  },
  removeDeliveryTypeError: function removeDeliveryTypeError() {
    var block = document.querySelector('#delivery_type');
    block.classList.remove('deliveryTypeError');
  },
  deliveryTypeError: function deliveryTypeError(state) {
    var block = document.querySelector('#delivery_type');
    block.classList.add('deliveryTypeError');
    state.deliveryType = 'error';
  },
  getAllInformationPosts: function getAllInformationPosts(state) {
    fetch('/getAllInformationPosts', {
      method: "GET"
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      state.informationPosts = data;
    });
  },
  showDeliveryTypeHelper: function showDeliveryTypeHelper() {
    var helper = document.querySelector('[data-delivery-type_helper]');
    helper.classList.add('no_opacity');
  },
  catalogLoadMore: function catalogLoadMore(state) {
    state.catalogPerPage = state.catalogPerPage + state.catalogPerPage;
  },
  switchCatalogLayout: function switchCatalogLayout(state) {
    state.gridCatalog = !state.gridCatalog;
    state.catalogPerPage = state.gridCatalog ? 6 : 16;
  },
  unitPay: function unitPay(state) {
    var obj = {
      account: state.user.id ? state.user.id : 'unregistered',
      currency: 'RUB',
      desc: "Описание платежа",
      sum: state.cart.totalPrice,
      domainName: "unitpay.ru",
      signature: state.signatureHash,
      publicKey: "315491-97428"
    };
    var payment = new UnitPay();
    payment.createWidget(obj);
    payment.success(function (params) {
      state.orderPaid = true;
      console.log('Успешный платеж');
    });
    payment.error(function (message, params) {
      console.log(message);
    });
    return false;
  },
  createSignatureHash: function createSignatureHash(state) {
    var that = this;
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
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      state.signatureHash = data.hash;
      that.dispatch('UNIT_PAY');
    })["catch"](function (err) {
      console.log(err);
    });
  },
  getTwoYearsInfoBySelect: function getTwoYearsInfoBySelect(state, year) {
    fetch('/getTwoYearsInfoBySelect', {
      method: "POST",
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': window.token
      },
      redirect: 'follow',
      referrerPolicy: 'no-referrer',
      body: JSON.stringify({
        year: year
      })
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      state.lastTwoYearsInfo = data;
    });
  },
  getAboutYears: function getAboutYears(state) {
    fetch('/getAboutYears', {
      method: "GET"
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      state.aboutData = data;
    });
  },
  getOrdersInfo: function getOrdersInfo(state) {
    if (state.orders) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
        method: "GET",
        url: '/getOrdersInfo',
        success: function success(data) {
          if (_typeof(data) === 'object') {
            state.orders = data;
          } else {
            state.orders = false;
          }
        },
        error: function error(_error3) {
          console.warn(_error3);
        }
      });
    }
  },
  getSingleOrderInfo: function getSingleOrderInfo(state, id) {
    jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
      method: "GET",
      url: "/getSingleOrderInfo/".concat(id),
      success: function success(data) {
        state.orders.last_order = data.order;
        state.orders.last_order.id = id;
        state.orders.last_order.total = data.total; //XXX

        document.querySelector('.order_totalPrice').innerText = data.total;
      },
      error: function error(_error4) {
        console.warn(_error4);
      }
    });
    return state.orders.last_order;
  },
  finishContract: function finishContract() {
    console.log('send contract via email'); // router.push('/success');
    // this.SCROLL_TO_TOP();
  },
  checkPaymentError: function checkPaymentError() {
    var error = document.querySelector('[data-payment-error]');
    var heading = document.querySelector('[data-payment-head]');
    var head = document.querySelector('.payment_wrap-head');
    heading.classList.add('mb10');
    head.classList.add('mb30');
    error.classList.remove('as-none');
  },
  finishOrderProcess: function finishOrderProcess(state) {
    state.cart = null;
    state.customerIndex = null;
    state.deliveryAdress = null;
    state.deliveryAllowed = null;
    state.deliveryType = null;
    state.paymentProvider = null;
    state.showAditionalForms = null;
    state.signatureHash = null;
    state.stockDeliveryPickup = null;
    state.cartStep = 0;
    _router_router__WEBPACK_IMPORTED_MODULE_3__["default"].push('/success');
  },
  setPickUpPoint: function setPickUpPoint(state, obj) {
    state.pickUpPoint = obj;
  },
  validateDeliveryAdress: function validateDeliveryAdress(state, form) {
    var valid = window.app.validator.formValidate([], jquery__WEBPACK_IMPORTED_MODULE_0___default()(form));
    state.deliveryAdress = valid;
    return state.deliveryAdress;
  },
  scrollToTop: function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  },
  payWithCard: function payWithCard(state, obj) {
    var valid = {
      status: false,
      errors: []
    };

    if (parseInt(obj.month) === 'NaN') {
      valid.errors.push('Месяц не выбран');
    }

    if (parseInt(obj.year) === 'NaN') {
      valid.errors.push('Год не выбран');
    }

    if (obj.card_num === '') {
      valid.errors.push('Неправильный номер карты');
    }

    if (obj.cvv === '') {
      valid.errors.push('Незаполнен cvv');
    }

    if (obj.card_name === '') {
      valid.errors.push('Незаполнено имя карты');
    }

    if (valid.errors.length === 0) {
      valid.status = true;
    }

    var checkout = new cp.Checkout("test_api_00000000000000000000001", document.getElementById("paymentFormSample"));

    function createCryptogram() {
      var result = checkout.createCryptogramPacket();

      if (result.success) {
        state.orderPaid = true;
      } else {
        for (var msgName in result.messages) {
          alert(result.messages[msgName]);
        }
      }
    }

    if (valid) {
      createCryptogram();
    }
  },
  setPaymentProvider: function setPaymentProvider(state, provider) {
    state.paymentProvider = null;
    setTimeout(function () {
      return state.paymentProvider = provider;
    }, 50);
    var paymentBlock = document.querySelector('.payment_wrap');
    var checkboxes = paymentBlock.querySelectorAll('.checkbox');
    var nal = paymentBlock.querySelector('[ data-checkNal]');
    var card = paymentBlock.querySelector('[data-checkCard]');
    checkboxes.forEach(function (box) {
      var img = box.querySelector('img');
      img.classList.add('invisible');
      box.setAttribute('checked', false);
    });

    function process(item) {
      var box = item.querySelector('.checkbox');
      var img = item.querySelector('img');
      box.setAttribute('checked', true);
      img.classList.remove('invisible');
    }

    if (provider.indexOf('Mastercard') >= 0) {
      state.cardPayment = true;
      process(card);
    } else {
      state.cardPayment = false;
      process(nal);
    }

    jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
      method: "GET",
      url: '/setPaymentProvider',
      data: {
        provider: provider
      },
      success: function success(data) {// console.warn(data);
      },
      error: function error(_error5) {
        console.warn(_error5);
      }
    });
    return state.paymentProvider;
  },
  createOrder: function createOrder(state) {
    jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
      method: "GET",
      url: '/createOrder',
      success: function success(data) {
        state.order = data;
      },
      error: function error(_error6) {
        console.warn(_error6);
      }
    });
  },
  saveUriksData: function saveUriksData(state, obj) {
    state.uriksData = obj;
  },
  RSValidation: function RSValidation(state, obj) {
    var rs = obj.rs;
    var bik = obj.bik;
    var result = false;
    var error = {};

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

    var returnObj = {
      result: result,
      error: error
    };
    state.urikValidation = returnObj;
    this.dispatch('SAVE_URIKS_DATA', obj);
    return returnObj;
  },
  applyPriceFilter: function applyPriceFilter(state, name) {
    state.filteredProducts = lodash__WEBPACK_IMPORTED_MODULE_1___default.a.orderBy(state.filteredProducts, ['price'], [name]);
  },
  setDeliveryType: function setDeliveryType(state, name) {
    state.deliveryType = null;
    state.deliveryType = name;
    this.dispatch('REMOVE_DELIVERY_TYPE_ERROR');
    return state.deliveryType;
  },
  checkCartState: function checkCartState(state) {
    axios__WEBPACK_IMPORTED_MODULE_2___default.a.get('/checkCartState').then(function (response) {
      state.cart = response.data; // localStorage.setItem('cart', JSON.stringify(response.data));
    });
    return state.cart;
  },
  refreshCutomerData: function refreshCutomerData(state, data) {
    fetch('/home/collectProfileData', {
      method: "POST",
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': window.token
      },
      redirect: 'follow',
      referrerPolicy: 'no-referrer',
      body: JSON.stringify(data)
    }).then(function (res) {})["catch"](function (err) {
      return console.error('collectProfileData', err);
    });
  },
  setUriksInfo: function setUriksInfo(state, obj) {
    if (!state.usersInfo) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
        method: "get",
        url: '/setUrikInfo',
        data: obj,
        success: function success(data) {
          state.usersInfo = data;
        },
        error: function error(_error7) {
          console.warn(_error7);
        }
      });
    }
  },
  setCustomerFio: function setCustomerFio(state, _ref3) {
    var firstname = _ref3.firstname,
        lastname = _ref3.lastname,
        tel = _ref3.tel,
        save = _ref3.save;
    jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
      method: "get",
      url: '/setCustomerFio',
      data: {
        firstname: firstname,
        lastname: lastname,
        tel: tel,
        save: save
      },
      success: function success(data) {
        state.usersInfo = data;
      },
      error: function error(_error8) {
        console.warn(_error8);
      }
    });
  },
  getUserInfo: function getUserInfo(state) {
    if (!state.user) {
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.get('/getUserInfo').then(function (response) {
        state.user = response.data;
      });
      return state.user;
    }
  },
  setCloseListener: function setCloseListener(state, payload) {
    state.closeListener = payload;
  }
};
/* harmony default export */ __webpack_exports__["default"] = (mutations);

/***/ }),

/***/ "./resources/js/vue/store/mutations/products/index.js":
/*!************************************************************!*\
  !*** ./resources/js/vue/store/mutations/products/index.js ***!
  \************************************************************/
/*! exports provided: getAllProducts, getFilteredProducts, addProductToCart, getProductModelFilters, getProductTypeFilters, filterProductsByModel, filterProductByQuery, getProductById, getProductModelBrandFilters, filterProductsByPrinterType, filterProductsByBrand, setProductsLoaded, getViewedProducts, setProductViewed */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getAllProducts", function() { return getAllProducts; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getFilteredProducts", function() { return getFilteredProducts; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addProductToCart", function() { return addProductToCart; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getProductModelFilters", function() { return getProductModelFilters; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getProductTypeFilters", function() { return getProductTypeFilters; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "filterProductsByModel", function() { return filterProductsByModel; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "filterProductByQuery", function() { return filterProductByQuery; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getProductById", function() { return getProductById; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getProductModelBrandFilters", function() { return getProductModelBrandFilters; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "filterProductsByPrinterType", function() { return filterProductsByPrinterType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "filterProductsByBrand", function() { return filterProductsByBrand; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setProductsLoaded", function() { return setProductsLoaded; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getViewedProducts", function() { return getViewedProducts; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setProductViewed", function() { return setProductViewed; });
/* harmony import */ var axios_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios/index */ "./node_modules/axios/index.js");
/* harmony import */ var axios_index__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios_index__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_1__);
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }




var getAllProducts = function getAllProducts(state) {
  var that = this;

  if (state.products.length === 0) {
    axios_index__WEBPACK_IMPORTED_MODULE_0___default.a.get('/catalogCartridge').then(function (response) {
      response.data.forEach(function (el) {
        var params = JSON.parse(el.params);
        var cape = JSON.parse(el.cape);
        var newCape = {};
        cape.map(function (obj) {
          Object.keys(obj).forEach(function (key) {
            var str = obj[key];
            newCape[key] = str.trim();
          });
        });
        el.price = Math.ceil(el.price);
        el.params = params;
        el.cape = newCape;
      });
      state.products = response.data;
      state.filteredProducts = state.products;
    }).then(function () {
      that.dispatch('COLLECT_FILTERS');
      that.dispatch('SWITCH_PRODUCTS_LOADER');
    })["catch"](function (err) {
      console.log(err);
    });
  }

  return state.products;
};

var getFilteredProducts = function getFilteredProducts(state, payload) {
  jquery__WEBPACK_IMPORTED_MODULE_1___default.a.ajax({
    method: "get",
    url: '/search',
    data: {
      payload: payload
    },
    success: function success(data) {
      state.searchProducts = data;
    },
    error: function error(_error) {
      console.warn(_error);
    }
  });
  state.closeListener = true;
};

var addProductToCart = function addProductToCart(state, _ref) {
  var id = _ref.id,
      amount = _ref.amount;
  var that = this;
  var url = "/products/addToCartAjaxGet/".concat(id);
  jquery__WEBPACK_IMPORTED_MODULE_1___default.a.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': window.token
    }
  });
  jquery__WEBPACK_IMPORTED_MODULE_1___default.a.ajax({
    method: "get",
    url: "".concat(url),
    data: {
      id: id,
      amount: amount
    },
    success: function success(data) {
      that.dispatch('fixCartStatus', {
        data: data
      });
    },
    error: function error(_error2) {
      console.warn(_error2);
    }
  });
  var gObj = {
    category: 'catalog',
    eventAction: 'click',
    eventLabel: 'add product to cart',
    eventValue: "".concat(id, " - ").concat(amount)
  };
  this.dispatch('SEND_GOOGLE_ANALYTICS', gObj);
};

var getProductById = function getProductById(state, id) {
  var product = state.products.filter(function (el) {
    return el.id === id;
  });
  state.singleProduct = product[0];
};

var setProductsLoaded = function setProductsLoaded(state) {
  state.productsLoaded = true;
};

var filterProductsByBrand = function filterProductsByBrand(state, query) {
  var newProducts = [];
  state.products.forEach(function (prdt) {
    var cape = JSON.stringify(Object.keys(prdt.cape));

    if (cape.indexOf(query.brand) >= 0) {
      newProducts.push(prdt);
    }
  });

  if (newProducts.length > 0) {
    state.filteredProducts = newProducts;
  }
};

var filterProductsByPrinterType = function filterProductsByPrinterType(state, query) {
  var newProducts = [];
  state.products.forEach(function (prdt) {
    var param = prdt.params;

    if (param.printertype.indexOf(query.printertype) >= 0) {
      newProducts.push(prdt);
    }
  });
  state.filteredProducts = newProducts;
};

var filterProductsByModel = function filterProductsByModel(state, query) {
  var newProducts = [];
  state.products.forEach(function (prdt) {
    var cape = JSON.stringify(Object.values(prdt.cape));

    if (cape.indexOf(query.model) >= 0) {
      newProducts.push(prdt);
    }
  });

  if (newProducts.length > 0) {
    state.filteredProducts = newProducts;
  }
};

var filterProductByQuery = function filterProductByQuery(state, query) {
  if (query.printertype) {
    this.dispatch('FILTER_PRODUCTS_BY_PRINTERTYPE', query);
  }

  if (query.brand) {
    this.dispatch('FILTER_PRODUCTS_BY_BRAND', query);
  }

  if (query.model) {
    this.dispatch('FILTER_PRODUCTS_BY_MODEL', query);
  }

  if (Object.keys(query).length === 0) {
    state.filteredProducts = state.products;
  }

  this.dispatch('GET_MODEL_BRAND_FILTERS');
};

var getProductTypeFilters = function getProductTypeFilters(state) {
  state.typeFilters = _toConsumableArray(new Set(state.products.map(function (item) {
    return item.params.printertype;
  })));
};

var getProductModelBrandFilters = function getProductModelBrandFilters(state) {
  var allProductBrands = [];
  var allProductModels = [];
  state.filteredProducts.map(function (prdct) {
    var cape = prdct.cape;
    var brands = Object.keys(cape);
    var models = Object.values(cape);
    brands.forEach(function (brand) {
      return allProductBrands.push(brand);
    });
    models.forEach(function (model) {
      return allProductModels.push(model);
    });
  });
  state.brandFilters = _toConsumableArray(new Set(allProductBrands));
  state.modelFilters = _toConsumableArray(new Set(allProductModels));
};

var getProductModelFilters = function getProductModelFilters(state) {
  var data = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
  var newProducts = state.products.filter(function (item) {
    var param = item.params;

    for (var key in data) {
      if (param[key] === undefined || param[key] != data[key]) return false;
    }

    return true;
  });
  state.modelFilters = _toConsumableArray(new Set(newProducts.map(function (item) {
    return item.params.art;
  })));
};

var getViewedProducts = function getViewedProducts(state) {
  fetch("/getViewed", {
    method: "GET",
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': window.token
    },
    redirect: 'follow',
    referrerPolicy: 'no-referrer'
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    state.viewedProducts = data;
  })["catch"](function (err) {
    console.log(err);
  });
};

var setProductViewed = function setProductViewed(state, _ref2) {
  var pid = _ref2.pid;
  fetch("/setViewed/".concat(pid), {
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
  }).then(function (response) {
    return response.json();
  });
  var gObj = {
    category: 'catalog modal',
    eventAction: 'click',
    eventLabel: 'catalog modal opened',
    eventValue: pid
  };
  this.dispatch('SEND_GOOGLE_ANALYTICS', gObj);
};



/***/ }),

/***/ "./resources/js/vue/store/mutations/utils/analytics.js":
/*!*************************************************************!*\
  !*** ./resources/js/vue/store/mutations/utils/analytics.js ***!
  \*************************************************************/
/*! exports provided: sendGoogleAnalytics */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "sendGoogleAnalytics", function() { return sendGoogleAnalytics; });
var sendGoogleAnalytics = function sendGoogleAnalytics(state, _ref) {
  var category = _ref.category,
      eventAction = _ref.eventAction,
      eventLabel = _ref.eventLabel,
      eventValue = _ref.eventValue;
  window.ga('send', 'event', category, eventAction, eventLabel, eventValue);
  console.warn('ga event', category, eventAction, eventLabel, eventValue);
};



/***/ }),

/***/ "./resources/js/vue/store/mutations/utils/index.js":
/*!*********************************************************!*\
  !*** ./resources/js/vue/store/mutations/utils/index.js ***!
  \*********************************************************/
/*! exports provided: createMagicBtn, showNotification, blockFormInputs */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "createMagicBtn", function() { return createMagicBtn; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "showNotification", function() { return showNotification; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "blockFormInputs", function() { return blockFormInputs; });
/* harmony import */ var _components_Notifications__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../components/Notifications */ "./resources/js/components/Notifications.js");
/* harmony import */ var _components_MagicButton__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../components/MagicButton */ "./resources/js/components/MagicButton.js");



var createMagicBtn = function createMagicBtn(state, btn) {
  if (btn) {
    btn.classList.remove('disabled_btn');
    new _components_MagicButton__WEBPACK_IMPORTED_MODULE_1__["default"](btn);
  }
};

var showNotification = function showNotification(state, msg, type) {
  state.notParams.status = type;
  state.notParams.message = msg;
  var notification = new _components_Notifications__WEBPACK_IMPORTED_MODULE_0__["default"](state.notParams);
  notification.show();
};

var blockFormInputs = function blockFormInputs(state, el) {
  var inputs = el.querySelectorAll('input');
  inputs && inputs.forEach(function (npt) {
    npt.value = '';
    npt.setAttribute('disabled', '');
  });
};



/***/ }),

/***/ "./resources/js/vue/store/state/state.js":
/*!***********************************************!*\
  !*** ./resources/js/vue/store/state/state.js ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var state = {
  //cart
  cartStep: 1,
  paymentProvider: false,
  signatureHash: false,
  gridCatalog: false,
  lastTwoYearsInfo: false,
  informationPosts: false,
  productsLoaded: false,
  closeListener: false,
  customerIndex: false,
  cardPayment: false,
  orderPaid: false,
  aboutData: false,
  orders: false,
  user: false,
  cart: false,
  showAditionalForms: false,
  readyToGo: false,
  filteredProducts: [],
  searchProducts: [],
  viewedProducts: [],
  modelFilters: [],
  brandFilters: [],
  typeFilters: [],
  products: [],
  urikValidation: {},
  singleProduct: {},
  uriksData: {},
  order: {},
  usersFIO: '',
  catalogPerPage: 16,
  //Delivery
  selfDelivery: null,
  deliveryType: false,
  deliveryAdress: false,
  deliveryAllowed: false,
  lastDeliveryAdress: false,
  prevDelAdrAccepted: null,
  stockDeliveryPickup: false,
  blockDeliveryHelper: false,
  pickUpPoint: false,
  //misc
  ofertaPolicy: null,
  notParams: {
    status: 'success',
    pos: 'top-center',
    timeout: 3000
  }
};
/* harmony default export */ __webpack_exports__["default"] = (state);

/***/ }),

/***/ "./resources/js/vue/store/store.js":
/*!*****************************************!*\
  !*** ./resources/js/vue/store/store.js ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var _state_state__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./state/state */ "./resources/js/vue/store/state/state.js");
/* harmony import */ var _getters_getters__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./getters/getters */ "./resources/js/vue/store/getters/getters.js");
/* harmony import */ var _actions_actions__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./actions/actions */ "./resources/js/vue/store/actions/actions.js");
/* harmony import */ var _mutations_mutations__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./mutations/mutations */ "./resources/js/vue/store/mutations/mutations.js");
/* harmony import */ var vuex_persistedstate__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vuex-persistedstate */ "./node_modules/vuex-persistedstate/dist/vuex-persistedstate.es.js");







vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(vuex__WEBPACK_IMPORTED_MODULE_1__["default"]);
var store = new vuex__WEBPACK_IMPORTED_MODULE_1__["default"].Store({
  state: _state_state__WEBPACK_IMPORTED_MODULE_2__["default"],
  getters: _getters_getters__WEBPACK_IMPORTED_MODULE_3__["default"],
  actions: _actions_actions__WEBPACK_IMPORTED_MODULE_4__["default"],
  mutations: _mutations_mutations__WEBPACK_IMPORTED_MODULE_5__["default"],
  plugins: [Object(vuex_persistedstate__WEBPACK_IMPORTED_MODULE_6__["default"])()]
});
/* harmony default export */ __webpack_exports__["default"] = (store);

/***/ })

}]);