(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[28],{

/***/ "./resources/js/controllers/cart/CartController.js":
/*!*********************************************************!*\
  !*** ./resources/js/controllers/cart/CartController.js ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _vue_router_router__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../vue/router/router */ "./resources/js/vue/router/router.js");
/* harmony import */ var _components_MagicButton__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../components/MagicButton */ "./resources/js/components/MagicButton.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }





var CartController = /*#__PURE__*/function () {
  function CartController(el) {
    _classCallCheck(this, CartController);

    var that = this;
    this.el = el;
    var btns = document.querySelectorAll('.ajaxGETproduct');
    var cart = document.querySelector('.cart');
    var cartCont = document.querySelector('.cart_content');

    if (cartCont) {
      this._createMagicBtn();
    }

    if (cart) {
      this._setDeleteListeners();

      this._setAmountListeners();

      btns.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
          that.addToCart(e);
        });
      });
    }
  }

  _createClass(CartController, [{
    key: "_createMagicBtn",
    value: function _createMagicBtn() {
      var magicBtn = document.querySelector('.magic_btn');
      var btn = new _components_MagicButton__WEBPACK_IMPORTED_MODULE_2__["default"](magicBtn);
    }
  }, {
    key: "_pushToOrderProcess",
    value: function _pushToOrderProcess() {
      _vue_router_router__WEBPACK_IMPORTED_MODULE_1__["default"].push('/checkoutProducts');
    }
  }, {
    key: "_fixCartTotalState",
    value: function _fixCartTotalState() {
      var url = window.location.origin + '/checkCartState';
      var headingAmount = document.querySelector('[data-cartamountval]');
      var headingPrice = document.querySelectorAll('[data-cartpriceval]');
      jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
        method: "get",
        url: "".concat(url),
        success: function success(data) {
          headingAmount.innerText = data.totalQuantity;
          headingPrice.forEach(function (el) {
            return el.innerText = data.totalPrice;
          });
        },
        error: function error(_error) {
          console.warn(_error);
        }
      });
    }
  }, {
    key: "_changeConcreteItem",
    value: function _changeConcreteItem(a) {
      var cartRows = document.querySelectorAll('.cart_item_row');
      cartRows.forEach(function (row) {
        var id = parseInt(row.getAttribute('data-id'));

        if (a.data.id === id) {
          var totalCost = row.querySelector('.cart_wrap-item_inner-table_row-col_total');
          var quantity = row.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity');
          quantity.innerText = a.quantity;
          totalCost.innerText = a.totalPrice;
        }
      });
    }
  }, {
    key: "_findItemInCart",
    value: function _findItemInCart(data, el) {
      var id = parseInt(el.getAttribute('data-prid'));
      var itemToReturn;
      var objects = data.items;

      for (var _i = 0, _Object$values = Object.values(objects); _i < _Object$values.length; _i++) {
        var item = _Object$values[_i];

        if (item.data.id === id) {
          itemToReturn = item;
        }
      }

      return itemToReturn;
    }
  }, {
    key: "_setAmountListeners",
    value: function _setAmountListeners() {
      var that = this;
      var block = document.querySelectorAll('.cart_wrap-item_inner-table_row-col_btns-btn-items');
      block.forEach(function (el) {
        var links = el.querySelectorAll('a');
        links.forEach(function (el) {
          el.addEventListener('click', function (e) {
            var url = e.currentTarget.getAttribute('href');
            e.preventDefault();
            jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
              method: "get",
              url: "".concat(url),
              success: function success(data) {
                var changeItemData = that._findItemInCart(data, el);

                that._changeConcreteItem(changeItemData);

                that._fixCartTotalState();
              },
              error: function error(_error2) {
                console.warn(_error2);
              }
            });
          });
        });
      });
    }
  }, {
    key: "_setDeleteListeners",
    value: function _setDeleteListeners() {
      var that = this;
      var closes = document.querySelectorAll('.remove_icon');
      closes && closes.forEach(function (el, i) {
        el.addEventListener('click', function () {
          that._deleteFromCart(closes[i], el);
        });
      });
    }
  }, {
    key: "_deleteFromCart",
    value: function _deleteFromCart(item) {
      var url = item.getAttribute('data-href');

      var _token = jquery__WEBPACK_IMPORTED_MODULE_0___default()('input[name="_token"]').val();

      var that = this;
      jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
        method: "GET",
        url: url,
        data: {
          token: _token
        },
        success: function success(data) {
          if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(data).hasClass('empty_cart')) {
            var cart = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.cart_wrap');
            jquery__WEBPACK_IMPORTED_MODULE_0___default()(cart).html(data);

            that._fixDeletion('', '', 'addClass');
          } else {
            var _item = jquery__WEBPACK_IMPORTED_MODULE_0___default()(data).find('.cart_wrap-item_inner-table');

            var price = _item[0].dataset.cartprice;
            var amount = _item[0].dataset.cartamount;

            var _cart = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.cart_content');

            jquery__WEBPACK_IMPORTED_MODULE_0___default()(_cart).html(jquery__WEBPACK_IMPORTED_MODULE_0___default()(data)[0]);

            that._fixDeletion(amount, price);

            that._setDeleteListeners();
          }
        },
        error: function error(_error3) {
          console.warn(_error3);
        }
      });
    }
  }, {
    key: "_fixDeletion",
    value: function _fixDeletion(cart, price) {
      var type = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('[data-cartamountval]').html(cart);
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('[data-cartpriceval]').html(price);

      if (type != 0) {
        jquery__WEBPACK_IMPORTED_MODULE_0___default()('[data-cartIcon]').attr('src', '/images/menu/empty_cart.svg');
        jquery__WEBPACK_IMPORTED_MODULE_0___default()('.menu_wrapper-item_cart_currency').addClass('invisible');
      } else {
        jquery__WEBPACK_IMPORTED_MODULE_0___default()('.menu_wrapper-item_cart_currency').removeClass('invisible');
      }
    }
  }, {
    key: "addToCart",
    value: function addToCart(e) {
      var amount = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 1;
      e.preventDefault();
      var that = this;
      var url = e.currentTarget.getAttribute('data-url');
      var executed = false;

      if (!executed) {
        executed = true;
        jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
          method: "GET",
          url: url,
          data: {
            token: window.token,
            amount: amount
          },
          success: function success(data) {
            that._fixDeletion(data.totalQuantity, data.totalPrice);
          },
          error: function error(_error4) {
            console.warn(_error4);
          }
        });
      }
    }
  }]);

  return CartController;
}();

/* harmony default export */ __webpack_exports__["default"] = (CartController);

/***/ })

}]);