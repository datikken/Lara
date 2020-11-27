(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[15],{

/***/ "./resources/js/controllers/BlogPostController.js":
/*!********************************************************!*\
  !*** ./resources/js/controllers/BlogPostController.js ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var BlogPostController = /*#__PURE__*/function () {
  _createClass(BlogPostController, [{
    key: "_setListeners",
    value: function _setListeners(btn, id) {
      console.warn(btn, 'test');
      btn.addEventListener('click', function (e) {
        var form = document.querySelector('#blogCom');
        form.setAttribute('data-commentRespId', id);
        window.location.href = '#blogCom';
      });
    }
  }, {
    key: "_declare",
    value: function _declare() {
      this.comments = document.querySelectorAll('[data-commentId]');
      var that = this;
      this.comments.forEach(function (el) {
        var btn = el.querySelector('[data-commentRespond]');
        var id = el.getAttribute('data-commentId');

        that._setListeners(btn, id);
      });
    }
  }]);

  function BlogPostController() {
    _classCallCheck(this, BlogPostController);

    this._declare();
  }

  return BlogPostController;
}();

/* harmony default export */ __webpack_exports__["default"] = (BlogPostController);

/***/ })

}]);