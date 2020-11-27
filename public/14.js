(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[14],{

/***/ "./resources/js/controllers/RegisterController.js":
/*!********************************************************!*\
  !*** ./resources/js/controllers/RegisterController.js ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _functions_validateEmail__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../functions/validateEmail */ "./resources/js/functions/validateEmail.js");
/* harmony import */ var _components_Notifications__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/Notifications */ "./resources/js/components/Notifications.js");
/* harmony import */ var _vue_store_store__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../vue/store/store */ "./resources/js/vue/store/store.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }






var RegisterController = /*#__PURE__*/function () {
  function RegisterController() {
    _classCallCheck(this, RegisterController);

    var auth = document.querySelector('.auth-decor');
    this.modal = document.querySelector('#passReset');
    this.passResetForm = document.querySelector('#passResetForm');
    this.store = _vue_store_store__WEBPACK_IMPORTED_MODULE_3__["default"];
    var that = this;
    auth && this._setListeners();
    auth && this._showHidePassword();
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('.form_type-item').on('click', function (e) {
      that._pickFaceType(e);
    });

    if (auth) {
      this.passReset();
      this.testIfUserFromPasswordResetEmail();
    }
  }

  _createClass(RegisterController, [{
    key: "passResetHandler",
    value: function passResetHandler() {
      var _this = this;

      var inputs = this.passResetForm.querySelectorAll('input');
      var btn = this.passResetForm.querySelector('[data-passresetbtn]');
      var that = this;
      var notParams = {
        status: 'success',
        pos: 'top-center',
        timeout: 3000
      };
      btn.addEventListener('click', function () {
        var dataObj = {};
        var that = _this;
        inputs.forEach(function (npt) {
          var name = npt.getAttribute('name');
          var val = npt.value;
          dataObj[name] = val;
        });
        dataObj.email = _this.email;

        if (dataObj.new_password === dataObj.new_password_confirm) {
          jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
            method: 'POST',
            url: "/StoreNewPasswordEmail",
            data: dataObj,
            success: function success(status) {
              notParams.message = 'Пароль успешно изменен.';
              notParams.status = 'success';
              var notification = new _components_Notifications__WEBPACK_IMPORTED_MODULE_2__["default"](notParams);
              notification.show();
              UIkit.modal(that.passResetForm).hide();
            },
            error: function error(_error) {
              notParams.message = 'Что-то пошло не так, попробуйте еще раз.';
              notParams.status = 'danger';
              var notification = new _components_Notifications__WEBPACK_IMPORTED_MODULE_2__["default"](notParams);
              notification.show();
            }
          });
        } else {
          notParams.message = 'Пароли должны совпадать.';
          notParams.status = 'danger';
          var notification = new _components_Notifications__WEBPACK_IMPORTED_MODULE_2__["default"](notParams);
          notification.show();
        }
      });
    }
  }, {
    key: "checkTokenExpireDate",
    value: function checkTokenExpireDate() {
      var token, email, curUrl;
      var that = this;
      curUrl = window.location.href;
      token = curUrl.split('?')[1].split('=')[1];
      email = curUrl.split('?')[2].split('=')[1];
      this.email = email;
      jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
        method: 'post',
        url: '/checkTokenExpireDate',
        data: {
          token: token,
          email: email
        },
        success: function success(data) {
          if (data.status === 200) {
            that.passResetHandler();
          } else {
            var params = {
              message: 'Ссылка просрочена, попробуйте заново.',
              status: 'danger',
              pos: 'top-center',
              timeout: 2000
            };
            UIkit.modal(that.passResetForm).hide();
            var notification = new _components_Notifications__WEBPACK_IMPORTED_MODULE_2__["default"](params);
            notification.show();
          }
        },
        error: function error(_error2) {
          console.error('pass reset ajax error', _error2);
        }
      });
    }
  }, {
    key: "openChangePassModal",
    value: function openChangePassModal() {
      UIkit.modal(this.passResetForm).show();
      this.checkTokenExpireDate();
    }
  }, {
    key: "testIfUserFromPasswordResetEmail",
    value: function testIfUserFromPasswordResetEmail() {
      var url = window.location.href;

      if (url.indexOf('token') >= 0) {
        this.openChangePassModal();
      }
    }
  }, {
    key: "passReset",
    value: function passReset() {
      var emailSentPopup = document.querySelector('#emailHasBeenSent');
      var btn = this.modal.querySelector('[data-resetPassEmail]');
      var formGroup = this.modal.querySelector('.form_group');
      var that = this;
      btn && btn.addEventListener('click', function (e) {
        var email = that.modal.querySelector('input').value;
        var valid = Object(_functions_validateEmail__WEBPACK_IMPORTED_MODULE_1__["validateEmail"])(email);

        if (!valid) {
          formGroup.classList.add('form_group-error');
        } else {
          jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
            method: 'POST',
            url: '/sendPasswordResetEmail',
            data: {
              email: email
            },
            success: function success(data) {
              if (data.status == '200') {
                UIkit.modal(that.modal).hide();
                UIkit.modal(emailSentPopup).show();
              }
            },
            error: function error(_error3) {
              console.error('pass reset ajax error');
            }
          });
        }
      });
    }
  }, {
    key: "_showHidePassword",
    value: function _showHidePassword() {
      var fields = document.querySelectorAll('.password_field');
      fields.forEach(function (field) {
        var icon = field.querySelector('.password_field-label');
        var input = field.querySelector('.password_input');
        var clicked = false;
        icon.addEventListener('click', function () {
          if (!clicked) {
            input.setAttribute('type', 'text');
            clicked = true;
          } else {
            input.setAttribute('type', 'password');
            clicked = false;
          }
        });
      });
    }
  }, {
    key: "_setError",
    value: function _setError(str, type) {
      var item;
      var jsonStr = JSON.stringify(str);

      if (type === 'register') {
        item = document.querySelector('[data-register]');
      } else {
        item = document.querySelector('[data-auth]');
      }

      item.classList.add('invalid');

      if (jsonStr.indexOf('required') >= 0) {
        item.innerText = 'Проверьте пароль.';
        return;
      }

      if (jsonStr.indexOf('email') >= 0) {
        item.innerText = 'Проверьте почту.';
        return;
      }

      if (jsonStr.indexOf('invalid') >= 0) {
        item.innerText = 'Проверьте правильность введенных данных.';
        return;
      }

      if (jsonStr.indexOf('taken') >= 0) {
        item.innerText = 'Почтовый ящик уже зарегистрирован.';
        return;
      }

      if (jsonStr.indexOf('least') >= 0) {
        item.innerText = 'Пароль должен быть не короче 8 символов.';
        return;
      }
    }
  }, {
    key: "_pickFaceType",
    value: function _pickFaceType(etc) {
      var inputs = document.querySelectorAll('.form_type-item');
      var el = etc.currentTarget;
      var text = el.querySelector('.form_type-itemText_inner').innerText;
      inputs.forEach(function (el) {
        el.classList.remove('activeFormItem');
        var faceInput = document.querySelector('[name="face"]');
        var name;

        if (text === 'Физ. лицо') {
          name = 'fizik';
        } else {
          name = 'urik';
        }

        if (text) faceInput.setAttribute('value', name);
      });
      el.classList.toggle('activeFormItem');
    }
  }, {
    key: "_agreementCheck",
    value: function _agreementCheck() {
      var item = document.querySelector('[data-register]');
      var agreement = document.querySelector('.agreement');
      var check = agreement.querySelector('.checkbox-wrap_arrow');
      var span = agreement.querySelector('span');

      if (check.classList.contains('invisible')) {
        span.classList.add('invalid');
        item.innerText = 'Вам необходимо принять пользовательское соглашение.';
        return false;
      } else {
        span.classList.remove('invalid');
        item.innerText = 'Зарегистрируйте свой аккаунт используя любой способ.';
        return true;
      }
    }
  }, {
    key: "_validator",
    value: function _validator(form) {
      var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
      var status = false;

      if (type != '') {
        status = this._agreementCheck();
      } else {
        status = true;
      }

      status && this._ajaxCall(form);

      try {
        window.app.validator.formValidate([], jquery__WEBPACK_IMPORTED_MODULE_0___default()(form));
      } catch (err) {
        this._setError(err.message, type);
      }
    }
  }, {
    key: "_sendGAevent",
    value: function _sendGAevent(type) {
      window.ga("send", "event", "auth", type);
    }
  }, {
    key: "showUnverifiedPopup",
    value: function showUnverifiedPopup() {
      document.location.reload();
    }
  }, {
    key: "_ajaxCall",
    value: function _ajaxCall(form) {
      var url = form.getAttribute('action');
      var method = form.getAttribute('method');
      var inputs = form.querySelectorAll('input');
      var that = this;
      var dataObj = {};
      inputs.forEach(function (npt) {
        var name = npt.getAttribute('name');
        var val = jquery__WEBPACK_IMPORTED_MODULE_0___default()(npt).val();
        dataObj[name] = val;
      });
      jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
        method: method,
        url: "".concat(url),
        data: dataObj,
        success: function success() {
          var host = window.location.host;
          var protocol = window.location.protocol;
          window.location.href = protocol + '//' + host + "/home";
        },
        error: function error(_error4) {
          console.warn(_error4, 'login action');

          if (_error4.status === 403) {
            that.showUnverifiedPopup();
            return;
          }

          if (_error4.responseText.indexOf('taken') > 0 || _error4.responseText.indexOf('least') > 0) {
            that._setError(_error4.responseText, 'register');
          } else {
            that._setError(_error4.responseText, 'login');
          }
        }
      });
    }
  }, {
    key: "_setListeners",
    value: function _setListeners() {
      var loginForm = document.querySelector('[data-loginform]');
      var registerForm = document.querySelector('[data-registerform]');
      var loginSubmit = loginForm.querySelector('.yellow_btn');
      var regSubmit = registerForm.querySelector('.yellow_btn');
      var that = this;
      var arr = [loginSubmit, regSubmit];
      arr.forEach(function (el) {
        el.addEventListener('click', function (e) {
          e.preventDefault();

          if (e.target.dataset.loginform) {
            that._validator(loginForm);

            that._sendGAevent('login');
          }

          if (e.target.dataset.registerform) {
            that._validator(registerForm, 'register');

            that._sendGAevent('register');
          }
        });
      });
    }
  }]);

  return RegisterController;
}();

/* harmony default export */ __webpack_exports__["default"] = (RegisterController);

/***/ }),

/***/ "./resources/js/functions/validateEmail.js":
/*!*************************************************!*\
  !*** ./resources/js/functions/validateEmail.js ***!
  \*************************************************/
/*! exports provided: validateEmail */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "validateEmail", function() { return validateEmail; });
function validateEmail(email) {
  var re = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
  return re.test(email);
}



/***/ })

}]);