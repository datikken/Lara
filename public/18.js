(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[18],{

/***/ "./resources/js/controllers/DashController.js":
/*!****************************************************!*\
  !*** ./resources/js/controllers/DashController.js ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var DashController = /*#__PURE__*/function () {
  function DashController() {
    _classCallCheck(this, DashController);

    var block = document.querySelector('.dash');
    block && this._setActiveTab();
  }

  _createClass(DashController, [{
    key: "_setActiveTab",
    value: function _setActiveTab() {
      var location = window.location.href;
      var tabs = document.querySelectorAll('.dash_left-wrap_item');
      var coupons = document.querySelector('.dash_right_coupone');
      tabs.forEach(function (el) {
        var activeClass = el.classList.contains('dash_active');

        if (activeClass) {
          el.classList.remove('dash_active');
        }
      });

      if (coupons) {
        tabs[0].classList.add('dash_active');
      }

      if (location.indexOf('orders') >= 0) {
        tabs[1].classList.add('dash_active');
      }

      if (location.indexOf('fillAdressesForm') >= 0) {
        tabs[2].classList.add('dash_active');
      }

      if (location.indexOf('fillProfile') >= 0) {
        tabs[3].classList.add('dash_active');
      }
    }
  }]);

  return DashController;
}();

/* harmony default export */ __webpack_exports__["default"] = (DashController);

/***/ })

}]);