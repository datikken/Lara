(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[24],{

/***/ "./resources/js/controllers/ProductDetailsSliderController.js":
/*!********************************************************************!*\
  !*** ./resources/js/controllers/ProductDetailsSliderController.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var swiper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! swiper */ "./node_modules/swiper/dist/js/swiper.js");
/* harmony import */ var swiper__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(swiper__WEBPACK_IMPORTED_MODULE_0__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var ProductDetailsSliderController = /*#__PURE__*/function () {
  function ProductDetailsSliderController() {
    _classCallCheck(this, ProductDetailsSliderController);

    var slider = document.querySelector('.details_wrap-slider');

    if (slider) {
      slider && this._gallery();
    }
  }

  _createClass(ProductDetailsSliderController, [{
    key: "_gallery",
    value: function _gallery() {
      var galleryTop = new swiper__WEBPACK_IMPORTED_MODULE_0___default.a('.gallery-top', {
        spaceBetween: 10,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        },
        loop: true,
        loopedSlides: 4
      });
      var galleryThumbs = new swiper__WEBPACK_IMPORTED_MODULE_0___default.a('.gallery-thumbs', {
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: 'auto',
        touchRatio: 0.2,
        slideToClickedSlide: true,
        loop: true,
        navigation: {
          nextEl: '.gallery-thumbs-next',
          prevEl: '.gallery-thumbs-prev'
        },
        loopedSlides: 4
      });
      galleryTop.controller.control = galleryThumbs;
      galleryThumbs.controller.control = galleryTop;
    }
  }]);

  return ProductDetailsSliderController;
}();

/* harmony default export */ __webpack_exports__["default"] = (ProductDetailsSliderController);

/***/ })

}]);