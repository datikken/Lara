(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[23],{

/***/ "./resources/js/controllers/ProductDetailsMenuController.js":
/*!******************************************************************!*\
  !*** ./resources/js/controllers/ProductDetailsMenuController.js ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _vue_store_store__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../vue/store/store */ "./resources/js/vue/store/store.js");
/* harmony import */ var _components_MagicButton__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/MagicButton */ "./resources/js/components/MagicButton.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/* eslint-disable */



var ProductDetailsMenuController = /*#__PURE__*/function () {
  function ProductDetailsMenuController() {
    _classCallCheck(this, ProductDetailsMenuController);

    this.store = _vue_store_store__WEBPACK_IMPORTED_MODULE_0__["default"];
    var container = document.querySelector('.details');
    container && this._initialize(document);

    if (container) {
      var block = document.querySelector('.pdetails_menu');

      this._amountListeners();

      this.addToCart();

      this._setListeners(block, container);

      this._setProductViewed(container);

      this._activateBtn();
    }
  }

  _createClass(ProductDetailsMenuController, [{
    key: "_activateBtn",
    value: function _activateBtn() {
      var btn = document.querySelector('.text_buy-btn');
      btn && new _components_MagicButton__WEBPACK_IMPORTED_MODULE_1__["default"](btn);
    }
  }, {
    key: "_setProductViewed",
    value: function _setProductViewed(el) {
      var pid = el.querySelector('[data-pid]').dataset.pid;
      this.store.dispatch('SET_PRODUCT_VIEWED', {
        pid: pid
      });
    }
  }, {
    key: "_initialize",
    value: function _initialize(container) {
      this.prcp = container.querySelector('.prcp');
      this.prdch = container.querySelector('.prdch');
      this.prdesc = container.querySelector('.prdesc');
      this.pfeedback = container.querySelector('.pfeedback');
      this.quantity = container.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity');
    }
  }, {
    key: "addToCart",
    value: function addToCart() {
      var id = document.querySelector('[data-pid]').getAttribute('data-pid');
      var btn = document.querySelector('.details_wrap-info_item-right');
      var that = this;
      btn.addEventListener('click', function () {
        var amount = parseInt(document.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity').innerText);
        that.store.dispatch('ADD_PRODUCT_TO_CART', {
          id: id,
          amount: amount
        });
      });
    }
  }, {
    key: "_amountListeners",
    value: function _amountListeners() {
      var block = document.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items');
      var quantVal = parseInt(this.quantity.innerText);
      var links = block.querySelectorAll('a');
      var that = this;
      links.forEach(function (el) {
        el.addEventListener('click', function (e) {
          e.preventDefault();
          var target = e.target.classList.value;

          if (target.indexOf('plus') > 0) {
            quantVal = quantVal + 1;
          } else {
            if (quantVal > 1) {
              quantVal = quantVal - 1;
            }
          }

          that.quantity.innerText = quantVal;
        });
      });
    }
  }, {
    key: "_setListeners",
    value: function _setListeners(el, block) {
      var that = this;
      var items = el.querySelectorAll('.pdetails_menu_item');
      items.forEach(function (el) {
        el.addEventListener('click', function (e) {
          var item = e.currentTarget;
          var id = parseInt(item.getAttribute('data-id'));
          items.forEach(function (el) {
            el.classList.remove('menu_active');
          });
          item.classList.add('menu_active');

          that._showHideElements(id, block);
        });
      });
    }
  }, {
    key: "_showHideElements",
    value: function _showHideElements(id, block) {
      var items = [this.prcp, this.prdch, this.prdesc, this.pfeedback];
      items.forEach(function (el, i) {
        el.classList.add('as-none');

        if (i === id) {
          el.classList.remove('as-none');
        }
      });
    }
  }]);

  return ProductDetailsMenuController;
}();

/* harmony default export */ __webpack_exports__["default"] = (ProductDetailsMenuController);

/***/ })

}]);