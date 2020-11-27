(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[22],{

/***/ "./resources/js/controllers/OrdersHistoryController.js":
/*!*************************************************************!*\
  !*** ./resources/js/controllers/OrdersHistoryController.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var OrdersHistoryController = /*#__PURE__*/function () {
  _createClass(OrdersHistoryController, [{
    key: "_fillItems",
    value: function _fillItems(obj, id, total) {
      var dest = document.querySelector('.order_items_container');
      var btnLink = document.querySelector('.history_wrapper-item_row-total-cta');
      var orderLength = document.querySelector('.history_wrapper-item_row-total_content-value');
      var totalPrice = document.querySelector('.order_totalPrice');
      var row = document.querySelectorAll('.order_items');
      row.forEach(function (el) {
        return el.remove();
      });
      obj.forEach(function (el) {
        var block = "\n                    <div class=\"history_wrapper-item_row order_items\">\n                        <div class=\"history_wrapper-item_row-info\">\n                            <span class=\"history_wrapper-item_row-item_val\">".concat(id, "</span>\n                        </div>\n                        <div class=\"history_wrapper-item_row-info\">\n                            <span class=\"history_wrapper-item_row-item_val\">").concat(el.item_name, "</span>\n                        </div>\n    \n                        <div class=\"history_wrapper-item_row-info\">\n                            <span class=\"history_wrapper-item_row-item_val\">").concat(el.item_price, "</span>\n                        </div>\n                        <div class=\"history_wrapper-item_row-info\">\n                            <span class=\"history_wrapper-item_row-item_val\">").concat(el.quantity, "</span>\n                        </div>\n                    </div>");
        dest.insertAdjacentHTML('beforeend', block);
      });
      orderLength.innerText = "".concat(obj.length, " \u0435\u0434.");
      totalPrice.innerText = "".concat(total, " \u0440.");
      var val = btnLink.getAttribute('href').split('/repeatOrder');
      btnLink.setAttribute('href', val + "/repeatOrder/".concat(id));
    }
  }, {
    key: "_makeCall",
    value: function _makeCall(id) {
      var that = this;
      var dataObj = {
        id: id,
        token: window.token
      };
      var url = '/getSingleOrderInfo';
      jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
        method: "get",
        url: url + "/".concat(id),
        data: dataObj,
        headers: {
          'X-CSRF-TOKEN': window.token
        },
        success: function success(data) {
          // console.warn(data, 'orders controller')
          that._fillItems(data.order, id, data.total);
        },
        error: function error(_error) {
          console.warn(_error);
        }
      });
    }
  }, {
    key: "_setListeners",
    value: function _setListeners(el) {
      var that = this;
      var orders = el.querySelectorAll('.order_values');
      orders.forEach(function (el) {
        el.addEventListener('click', function (e) {
          var id = parseInt(e.currentTarget.querySelector('.order_id').innerText);
          orders.forEach(function (el) {
            el.classList.remove('last_order');
          });
          e.currentTarget.classList.add('last_order');

          that._makeCall(id);
        });
      });
    }
  }]);

  function OrdersHistoryController() {
    _classCallCheck(this, OrdersHistoryController);

    var block = document.querySelector('.history');
    block && this._setListeners(block);
  }

  return OrdersHistoryController;
}();

/* harmony default export */ __webpack_exports__["default"] = (OrdersHistoryController);

/***/ })

}]);