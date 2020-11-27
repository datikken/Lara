(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[21],{

/***/ "./resources/js/controllers/LandingController.js":
/*!*******************************************************!*\
  !*** ./resources/js/controllers/LandingController.js ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var gsap__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! gsap */ "./node_modules/gsap/index.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var LandingController = /*#__PURE__*/function () {
  function LandingController() {
    _classCallCheck(this, LandingController);

    var el = document.querySelector('.animland');
    var slider = document.querySelector('.economslider');

    if (el) {
      this._setListeners(el);

      this._sliderActivate(slider);
    }
  }

  _createClass(LandingController, [{
    key: "_priceController",
    value: function _priceController(val, el) {
      var economy = el.querySelector('.economslider_economy');
      economy.innerText = "".concat(val, "0000");
    }
  }, {
    key: "_sliderActivate",
    value: function _sliderActivate(el) {
      var line = el.querySelector('.economslider_breaks');
      var fill = el.querySelector('.economslider_line_inner');
      var pointer = el.querySelector('.economslider_label-center');
      var that = this;
      line.addEventListener('click', function (e) {
        var val = parseFloat(e.target.classList.value.split('-')[1]);
        var left = el.querySelector('.economslider_label-left');
        var rigth = el.querySelector('.economslider_label-right');

        that._priceController(val, el);

        fill.style.width = "".concat(val, "0%");
        pointer.style.left = "".concat(val, "0%");

        if (val === 1) {
          left.style.opacity = '0';
          pointer.innerText = "".concat(val, " \u0433\u043E\u0434");
        }

        if (val >= 2 && val < 5) {
          left.style.opacity = '1';
          pointer.innerText = "".concat(val, " \u0433\u043E\u0434\u0430");
        }

        if (val >= 5) {
          left.style.opacity = '1';
          pointer.innerText = "".concat(val, " \u043B\u0435\u0442");
        }

        if (val === 10 || val === 9) {
          rigth.style.opacity = '0';
        } else {
          rigth.style.opacity = '1';
        }
      });
    }
  }, {
    key: "_setListeners",
    value: function _setListeners(el) {
      var icon = el.querySelector('.animland_icon_inner');
      var testlist = document.querySelectorAll('.animland'),
          test = Array.prototype.slice.call(testlist, 0);
      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.intersectionRatio > 0) {
            gsap__WEBPACK_IMPORTED_MODULE_0__["default"].to(icon, 2, {
              x: 100,
              ease: "power3.out",
              left: "45%"
            });
          } else {
            icon.style.left = '-600px';
          }
        });
      }, {
        rootMargin: '0px 0px'
      });
      test.forEach(function (test) {
        observer.observe(test);
      });
    }
  }]);

  return LandingController;
}();

/* harmony default export */ __webpack_exports__["default"] = (LandingController);

/***/ })

}]);