(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[26],{

/***/ "./resources/js/controllers/ProfileController.js":
/*!*******************************************************!*\
  !*** ./resources/js/controllers/ProfileController.js ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_Notifications__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/Notifications */ "./resources/js/components/Notifications.js");
/* harmony import */ var _vue_store_store__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../vue/store/store */ "./resources/js/vue/store/store.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }





var ProfileController = /*#__PURE__*/function () {
  _createClass(ProfileController, [{
    key: "_passwordReset",
    value: function _passwordReset(el) {
      var form = el.querySelector('.dchange').querySelector('form');
      var inputs = form.querySelectorAll('input');
      var url = form.getAttribute('action');
      var btn = el.querySelector('.dchange_btn');
      var notParams = {
        status: 'success',
        pos: 'top-center',
        timeout: 5000
      };

      function clearInputValues() {
        inputs.forEach(function (npt) {
          npt.value = '';
        });
      }

      btn.addEventListener('click', function () {
        var dataObj = {};
        inputs.forEach(function (el) {
          var name = el.getAttribute('name');
          var val = el.value;
          dataObj[name] = val;
        });
        jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
          method: 'POST',
          url: "".concat(url),
          data: dataObj,
          success: function success(status) {
            notParams.message = 'Пароль успешно изменен.';
            notParams.status = 'success';
            var notification = new _components_Notifications__WEBPACK_IMPORTED_MODULE_1__["default"](notParams);
            notification.show();
            clearInputValues();
          },
          error: function error(_error) {
            notParams.message = 'Что-то пошло не так, попробуйте еще раз.';
            notParams.status = 'danger';
            var notification = new _components_Notifications__WEBPACK_IMPORTED_MODULE_1__["default"](notParams);
            notification.show();
          }
        });
      });
    }
  }, {
    key: "_ajaxInputsSubmit",
    value: function _ajaxInputsSubmit(el) {
      var formGroups = el.querySelectorAll('.one_input_form');
      formGroups.forEach(function (el, i) {
        var btn = el.querySelector('button');
        btn.addEventListener('click', function (e) {
          e.preventDefault();
          var method = 'post';
          var url = formGroups[i].getAttribute('action');
          var a = formGroups[i].querySelector('.input_wrap').querySelector('input');
          var name = a.getAttribute('name');
          var val = a.value;
          var dataObj = {};
          dataObj[name] = val;
          jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
            method: method,
            url: "".concat(url),
            data: dataObj,
            success: function success(status) {
              var params = {
                message: status.message,
                status: 'success',
                pos: 'top-center',
                timeout: 1000
              };
              var notification = new _components_Notifications__WEBPACK_IMPORTED_MODULE_1__["default"](params);
              notification.show();
            },
            error: function error(_error2) {
              console.warn(_error2);
            }
          });
        });
      });
    }
  }, {
    key: "_setListeners",
    value: function _setListeners(el) {
      var imageWrap = el.querySelector('.dfill_wrap-form_top-left');
      imageWrap.addEventListener('click', function (e) {
        var target = e.currentTarget;
        var input = target.querySelector('.upload_file');
        var form = target.querySelector('form');
        input.click();
        input.addEventListener('change', function () {
          form.submit();
        });
      });
    }
  }]);

  function ProfileController() {
    _classCallCheck(this, ProfileController);

    var el = document.querySelector('.dfill');

    if (el) {
      this._setListeners(el);

      this._ajaxInputsSubmit(el);

      this._passwordReset(el);
    }
  }

  return ProfileController;
}();

/* harmony default export */ __webpack_exports__["default"] = (ProfileController);

/***/ })

}]);