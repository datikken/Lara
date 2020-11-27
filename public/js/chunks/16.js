(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[16],{

/***/ "./resources/js/controllers/ContactsFormController.js":
/*!************************************************************!*\
  !*** ./resources/js/controllers/ContactsFormController.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }


"";

var ContactsFormController = function ContactsFormController() {
  _classCallCheck(this, ContactsFormController);

  jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).ready(function () {
    var themeInput = document.querySelector('[data-theme]');
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('.cfeedback_wrap-row_item-row_inner').on('click', function (e) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('.cfeedback_wrap-row_item-row_inner').each(function (i, el) {
        var span = e.currentTarget.querySelector('span').innerText; // console.log('ContactsFormController', span, e.currentTarget)

        themeInput.value = span;

        if (el.classList.contains('active')) {
          el.classList.remove('active');
        }
      });
      e.currentTarget.classList.add('active');
    });
  });
};

/* harmony default export */ __webpack_exports__["default"] = (ContactsFormController);

/***/ })

}]);