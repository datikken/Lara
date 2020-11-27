(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[27],{

/***/ "./resources/js/controllers/TrackingFeed.js":
/*!**************************************************!*\
  !*** ./resources/js/controllers/TrackingFeed.js ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/* eslint-disable */


var TrackingFeed = /*#__PURE__*/function () {
  _createClass(TrackingFeed, [{
    key: "_makeCall",
    value: function _makeCall(el, theme) {
      var message = el.querySelector('textarea').value;
      var url = el.querySelector('.trackfeed_content').getAttribute('action');
      var token = el.querySelector('[name="_token"]').value;
      var dataObj = {
        theme: theme,
        message: message
      };
      jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
        method: "post",
        url: url,
        data: dataObj,
        headers: {
          'X-CSRF-TOKEN': token
        },
        success: function success(status) {// console.log(status)
        },
        error: function error(_error) {
          console.warn(_error);
        }
      });
    }
  }, {
    key: "_setListeners",
    value: function _setListeners(el) {
      var themeBtns = el.querySelectorAll('.trackfeed_feedItem');
      var input = el.querySelector('[name="feed_theme"]');
      var submit = el.querySelector('.action_btn ');
      var that = this;
      themeBtns.forEach(function (el) {
        el.addEventListener('click', function (e) {
          themeBtns.forEach(function (el) {
            el.classList.remove('feedActive');
          });
          e.currentTarget.classList.add('feedActive');
          var text = e.currentTarget.innerText;
          input.value = text;
        });
      });
      submit.addEventListener('click', function () {
        that._makeCall(el, input.value);
      });
    }
  }]);

  function TrackingFeed() {
    _classCallCheck(this, TrackingFeed);

    var el = document.querySelector('.trackfeed');

    if (el) {
      this._setListeners(el);
    }
  }

  return TrackingFeed;
}();

/* harmony default export */ __webpack_exports__["default"] = (TrackingFeed);

/***/ })

}]);