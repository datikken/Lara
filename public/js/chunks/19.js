(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[19],{

/***/ "./resources/js/controllers/FastViewController.js":
/*!********************************************************!*\
  !*** ./resources/js/controllers/FastViewController.js ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var FastViewController = /*#__PURE__*/function () {
  _createClass(FastViewController, [{
    key: "_fillFastViewInfo",
    value: function _fillFastViewInfo(el, data) {
      var res = el.querySelector('[data-paramres]');
      res.innerText = data.params.res;
    }
  }, {
    key: "_getProductJson",
    value: function _getProductJson(el) {
      var pid = el.querySelector('[data-prid]').dataset.prid;
      var url = "/product/".concat(pid);
      var that = this;
      jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
        method: "get",
        url: "".concat(url),
        data: {},
        success: function success(data) {
          that._fillFastViewInfo(el, data);
        },
        error: function error(_error) {
          console.warn(_error);
        }
      });
    }
  }, {
    key: "_addToCartProcessor",
    value: function _addToCartProcessor(el) {
      var btn = el.querySelector('.prdet_wrap-icons_ctas-buy');
      btn.addEventListener('click', function () {
        var amount = el.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity').innerText;
        var url = btn.dataset.url;
        var pid = el.querySelector('[data-prid]').dataset.prid;
        jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
          method: "get",
          url: "".concat(url),
          data: {
            id: pid,
            amount: amount
          },
          success: function success(data) {
            var amount = data.totalQuantity;
            var price = data.totalPrice;
            jquery__WEBPACK_IMPORTED_MODULE_0___default()('.menu_wrapper-item_cart_icon-amount').text(amount);
            jquery__WEBPACK_IMPORTED_MODULE_0___default()('[data-cartpriceval]').text(price);
          },
          error: function error(_error2) {
            console.warn(_error2);
          }
        });
      });
    }
  }, {
    key: "_amountProcessor",
    value: function _amountProcessor(el) {
      var btns = el.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items');
      var links = btns.querySelectorAll('a');
      var amountBlock = el.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity');

      function fixAmount(url) {
        var amountValue = parseInt(amountBlock.innerText);

        if (url.indexOf('increase') >= 0) {
          amountValue = amountValue + 1;
        } else {
          if (amountValue > 1) {
            amountValue = amountValue - 1;
          } else {
            return;
          }
        }

        amountBlock.innerText = amountValue;
      }

      links.forEach(function (a) {
        a.addEventListener('click', function (e) {
          e.preventDefault();
          var url = a.getAttribute('href');
          fixAmount(url);
        });
      });
    }
  }]);

  function FastViewController(el) {
    _classCallCheck(this, FastViewController);

    var id = el.getAttribute('href').replace('#', '');
    var modal = document.querySelector("#".concat(id));

    if (modal) {
      this._amountProcessor(modal);

      this._addToCartProcessor(modal);

      this._getProductJson(modal);
    }
  }

  return FastViewController;
}();

/* harmony default export */ __webpack_exports__["default"] = (FastViewController);

/***/ })

}]);