(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[17],{

/***/ "./resources/js/controllers/DadataController.js":
/*!******************************************************!*\
  !*** ./resources/js/controllers/DadataController.js ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var rxjs_Rx__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! rxjs/Rx */ "./node_modules/rxjs/Rx.js");
/* harmony import */ var rxjs_Rx__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(rxjs_Rx__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var imask__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! imask */ "./node_modules/imask/esm/index.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }




var DadataController = /*#__PURE__*/function () {
  function DadataController() {
    _classCallCheck(this, DadataController);

    var block = document.querySelector('.company');
    block && this._setListeners(block);
  }

  _createClass(DadataController, [{
    key: "_fillFields",
    value: function _fillFields(obj, block) {
      var name = block.querySelector('.company_head_value');
      var shortName = block.querySelector('.company_shhead_value');
      var adress = block.querySelector('.company_adress_value');
      var dir = block.querySelector('.company_dir_value');
      var okvd = block.querySelector('.company_okvd_value');
      var inn = block.querySelector('.company_inn_value');
      var inn2 = block.querySelector('[name="inn"]');
      var ogrn = block.querySelector('.company_ogrn_value');
      var postal = block.querySelector('.company_postal_value');
      name.innerText = obj[0].data.name.full_with_opf;
      shortName.innerText = obj[0].data.name["short"];
      adress.innerText = obj[0].data.address.unrestricted_value;
      dir.innerText = obj[0].data.management.name;
      okvd.innerText = obj[0].data.okved;
      inn.innerText = obj[0].data.inn;
      inn2.value = obj[0].data.inn;
      ogrn.innerText = obj[0].data.ogrn;
      postal.innerText = obj[0].data.address.data.postal_code;
    }
  }, {
    key: "_setListeners",
    value: function _setListeners(block) {
      var url = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/findById/party';
      var bik = block.querySelector('[name="bik"]');
      var that = this;
      Object(imask__WEBPACK_IMPORTED_MODULE_2__["default"])(bik, {
        mask: /^[0-9]\d{0,9}$/
      });

      function postData() {
        return _postData.apply(this, arguments);
      }

      function _postData() {
        _postData = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
          var url,
              data,
              response,
              _args = arguments;
          return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
            while (1) {
              switch (_context.prev = _context.next) {
                case 0:
                  url = _args.length > 0 && _args[0] !== undefined ? _args[0] : '';
                  data = _args.length > 1 && _args[1] !== undefined ? _args[1] : {};
                  _context.next = 4;
                  return fetch(url, {
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    credentials: 'same-origin',
                    headers: {
                      'Authorization': 'Token a799fcceda51c067cdb475e748d7e27e9b4f6fb9',
                      'Content-Type': 'application/json'
                    },
                    redirect: 'follow',
                    referrerPolicy: 'no-referrer',
                    body: JSON.stringify(data)
                  });

                case 4:
                  response = _context.sent;
                  _context.next = 7;
                  return response.json();

                case 7:
                  return _context.abrupt("return", _context.sent);

                case 8:
                case "end":
                  return _context.stop();
              }
            }
          }, _callee);
        }));
        return _postData.apply(this, arguments);
      }

      rxjs_Rx__WEBPACK_IMPORTED_MODULE_1__["Observable"].fromEvent(bik, 'keyup').subscribe(function () {
        // if(bik.value.length === 10)
        postData(url, {
          "query": "".concat(bik.value)
        }).then(function (data) {
          that._fillFields(data.suggestions, block);
        });
      });
    }
  }]);

  return DadataController;
}();

/* harmony default export */ __webpack_exports__["default"] = (DadataController);

/***/ })

}]);