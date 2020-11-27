(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[25],{

/***/ "./resources/js/controllers/ProductFeedbackController.js":
/*!***************************************************************!*\
  !*** ./resources/js/controllers/ProductFeedbackController.js ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var ProductFeedbackController = /*#__PURE__*/function () {
  function ProductFeedbackController() {
    _classCallCheck(this, ProductFeedbackController);

    var el = document.querySelector('.pfeedback');

    if (el) {
      this.setListeners(el);

      this._checkBoxHandler(el);

      this.showAllHandler(el);
    }
  }

  _createClass(ProductFeedbackController, [{
    key: "showAllHandler",
    value: function showAllHandler(el) {
      var btn = el.querySelector('.show_all_btn');
      var items = el.querySelectorAll('.pfitem');
      btn && btn.addEventListener('click', function () {
        items.forEach(function (item) {
          item.classList.remove('as-none');
        });
      });
    }
  }, {
    key: "_disableEnableBlocks",
    value: function _disableEnableBlocks(type, el) {
      var fblock = el.querySelector('.pfeedback_features');
      var mblock = el.querySelector('.pfeedback_minuses');

      function blockInput(el, type) {
        var input = el.querySelector('input');

        if (type === 'disable') {
          input.setAttribute('enabled', true);
        } else {
          input.removeAttribute('disabled');
        }
      }

      if (type === 'yes') {
        fblock.style.opacity = 1;
        mblock.style.opacity = .5;
        blockInput(fblock, 'enable');
        blockInput(mblock, 'disable');
      } else {
        fblock.style.opacity = .5;
        mblock.style.opacity = 1;
        blockInput(fblock, 'disable');
        blockInput(mblock, 'enable');
      }
    }
  }, {
    key: "_checkBoxHandler",
    value: function _checkBoxHandler(el) {
      var b = el.querySelectorAll('.rcheckbox');
      var that = this;
      b.forEach(function (box) {
        box.addEventListener('click', function (e) {
          var target = e.currentTarget;
          b.forEach(function (el) {
            var img = el.querySelector('img');
            var input = el.querySelector('input');
            input.value = '';
            img.classList.add('invisible');
          });
          var input = target.querySelector('input');
          var img = target.querySelector('img');
          img.classList.toggle('invisible');

          if (target.dataset.block != 'yes') {
            input.value = 'false';

            that._disableEnableBlocks('no', el);
          } else {
            input.value = 'true';

            that._disableEnableBlocks('yes', el);
          }
        });
      });
    }
  }, {
    key: "_sayThanks",
    value: function _sayThanks() {
      var thanks = document.querySelector('.thanks');
      var closeThanks = thanks.querySelector('.thanks_wrap_btn');
      closeThanks.addEventListener('click', function () {
        thanks.classList.add('as-none');
      });
      thanks.classList.remove('as-none');
      window.scrollTo(0, 0);
    }
  }, {
    key: "_cleanFields",
    value: function _cleanFields() {
      var inputs = document.querySelectorAll('input');
      var textareas = document.querySelectorAll('textarea');
      var arr = [].concat(_toConsumableArray(inputs), _toConsumableArray(textareas));
      arr.forEach(function (el) {
        el.value = '';
      });

      this._sayThanks();
    }
  }, {
    key: "setListeners",
    value: function setListeners(el) {
      var that = this;
      var btn = el.querySelector('.action_btn');
      var inputs = el.querySelectorAll('input');
      var txtarea = el.querySelector('textarea');
      var url = el.querySelector('form').getAttribute('action');
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        var dataObj = {};
        inputs.forEach(function (inpt) {
          if (inpt.value != '') {
            var name = inpt.getAttribute('name');
            dataObj[name] = inpt.value;
          }

          if (txtarea.value != '') {
            var _name = txtarea.getAttribute('name');

            dataObj[_name] = txtarea.value;
          }
        });
        jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': window.token
          }
        });
        jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
          method: "get",
          url: "".concat(url),
          data: dataObj,
          success: function success(data) {
            console.warn('feedback data', data);

            that._cleanFields();
          },
          error: function error(_error) {
            console.warn(_error);
          }
        });
      });
    }
  }]);

  return ProductFeedbackController;
}();

/* harmony default export */ __webpack_exports__["default"] = (ProductFeedbackController);

/***/ })

}]);