(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[13],{

/***/ "./resources/js/components/MagicButton.js":
/*!************************************************!*\
  !*** ./resources/js/components/MagicButton.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var MagicButton = /*#__PURE__*/function () {
  _createClass(MagicButton, [{
    key: "setListener",
    value: function setListener(btn) {
      if (btn) {
        btn.onmousemove = function (e) {
          var x = e.pageX - e.target.offsetLeft;
          var y = e.pageY - e.target.offsetTop;
          e.target.style.setProperty('--x', "".concat(x, "px"));
          e.target.style.setProperty('--y', "".concat(y, "px"));
        };
      }
    }
  }]);

  function MagicButton(btn) {
    _classCallCheck(this, MagicButton);

    this.btn = btn;
    this.setListener(this.btn);
  }

  return MagicButton;
}();

/* harmony default export */ __webpack_exports__["default"] = (MagicButton);

/***/ }),

/***/ "./resources/js/controllers/BlogController.js":
/*!****************************************************!*\
  !*** ./resources/js/controllers/BlogController.js ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_MagicButton__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/MagicButton */ "./resources/js/components/MagicButton.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }




var BlogPostController = /*#__PURE__*/function () {
  _createClass(BlogPostController, [{
    key: "_createMagicButtons",
    value: function _createMagicButtons() {
      var btns = document.querySelectorAll('.magic_btn');
      btns.forEach(function (btn) {
        var mbtn = new _components_MagicButton__WEBPACK_IMPORTED_MODULE_1__["default"](btn);
        console.warn('btns.forEach', mbtn);
      });
    }
  }, {
    key: "_clearForm",
    value: function _clearForm() {
      var inputs = this.commentsForm.querySelectorAll('input');
      var area = this.commentsForm.querySelector('[name="message"]');
      area.value = '';
      inputs.forEach(function (npt) {
        return npt.value = '';
      });
    }
  }, {
    key: "_makeRequest",
    value: function _makeRequest(_ref) {
      var name = _ref.name,
          email = _ref.email,
          message = _ref.message,
          postId = _ref.postId;
      var parentId = document.querySelector('[data-blogcommentpostid]').dataset.blogcommentpostid;
      var that = this;
      fetch(this.route, {
        method: "POST",
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify({
          name: name,
          email: email,
          message: message,
          postId: postId
        })
      }).then(function (response) {
        return response.json();
      }).then(function (data) {
        that._clearForm();
      })["catch"](function (err) {
        return console.error(err.message);
      });
    }
  }, {
    key: "activateComments",
    value: function activateComments() {
      var submit = this.commentsForm.querySelector('.blogCom_submit');
      var inputs = this.commentsForm.querySelectorAll('input');
      var area = this.commentsForm.querySelector('[name="message"]');
      var dataObj = {};
      var that = this;
      submit.addEventListener('click', function () {
        inputs.forEach(function (npt) {
          var name = npt.getAttribute('name');
          var val = npt.value;
          dataObj[name] = val;
        });
        dataObj[area.getAttribute('name')] = area.value;
        dataObj['postId'] = that.postId;

        that._makeRequest(dataObj);
      });
    }
  }, {
    key: "setListenersLikesDislikes",
    value: function setListenersLikesDislikes(block) {
      var posts = block.querySelectorAll('.postList_item');
      posts.forEach(function (el, i) {
        var like = el.querySelector('.postList_like');
        var dislike = el.querySelector('.postList_dislike');
        var like_val = el.querySelector('.postList_like_val');
        var disl_val = el.querySelector('.postList_dislike_val');
        var type;
        var arr = [like, dislike];
        arr.forEach(function (item) {
          item.addEventListener('click', function (e) {
            var id = posts[i].getAttribute('data-id');
            var url = '/blog/like/' + id;
            url = url.replace('#', '');
            var classList = e.currentTarget.classList.value;

            if (classList.indexOf('dis') >= 0) {
              type = 'false';
            } else {
              type = 'true';
            }

            var dataObj = {};
            dataObj.isLike = type;
            dataObj.post_id = id;
            jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': window.token
              }
            });
            jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
              method: "post",
              url: "".concat(url),
              data: dataObj,
              success: function success(data) {
                fixData(data);
              },
              error: function error(_error) {
                var el = document.querySelector('#shouldBeLoggedIn');
                UIkit.modal(el).show();
              }
            });

            function fixData(data) {
              if (data.likes) {
                like_val.innerText = data.likes;
              } else {
                like_val.innerText = 0;
              }

              if (data.dislikes) {
                disl_val.innerText = data.dislikes;
              } else {
                disl_val.innerText = 0;
              }
            }
          });
        });
      });
    }
  }]);

  function BlogPostController() {
    _classCallCheck(this, BlogPostController);

    this.block = document.querySelector('.postList');
    this.commentsForm = document.querySelector('[data-blogCommentsForm]');

    if (this.commentsForm) {
      this.postId = document.querySelector('[data-blogCommentPostId]').dataset.blogcommentpostid;
      this.route = document.querySelector('[data-blogCommentRoute]').dataset.blogcommentroute;
      this.activateComments();
    }

    if (this.block) {
      this._createMagicButtons();

      this.setListenersLikesDislikes(this.block);
    }
  }

  return BlogPostController;
}();

/* harmony default export */ __webpack_exports__["default"] = (BlogPostController);

/***/ })

}]);