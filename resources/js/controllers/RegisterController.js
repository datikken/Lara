import $ from 'jquery';

class RegisterController {
    constructor() {
        let auth = document.querySelector('.auth-decor');
        let that = this;

        auth && this._setListeners();

        $('.form_type-item').on('click', function (e) {
            that._pickFaceType(e)
        });
    }

    _setError(str) {
        let item = document.querySelector('.card-greet_text');

        console.warn(str);

        if(str === 'The given data was invalid.') {
            item.innerText = 'Проверьте введенные данные.'
            item.classList.add('invalid');
        }
    }
    _pickFaceType(etc) {
        let inputs = document.querySelectorAll('.form_type-item');
        let el = etc.currentTarget;
        let text = el.querySelector('.form_type-itemText_inner').innerText;

        inputs.forEach((el) => {
            el.classList.remove('activeFormItem');
            let faceInput = document.querySelector('[name="face"]');
            let name;

            if(text === 'Физ. лицо') {
                name = 'fizik'
            } else {
                name = 'urik'
            }

            if(text) faceInput.setAttribute('value', name);
        });

        el.classList.toggle('activeFormItem');
    }

    _agreementCheck() {
        let agreement = document.querySelector('.agreement');
        let check = agreement.querySelector('.checkbox-wrap_arrow');
        let span = agreement.querySelector('span');

        if(check.classList.contains('invisible')) {
            span.classList.add('invalid')
            return false;
        } else {
            span.classList.remove('invalid')
            return true;
        }
    }
    _validator(form, type='') {
        window.app.validator.formValidate([], $(form));
        let status;

        if(type != '') {
            status = this._agreementCheck();
        } else {
            status = true
        }

        status && this._ajaxCall(form);
    }

    _ajaxCall(form) {
        let url = form.getAttribute('action');
        let method = form.getAttribute('method');
        let inputs = form.querySelectorAll('input')
        let dataObj = {};

        inputs.forEach((npt) => {
            let name = npt.getAttribute('name');
            let val = $(npt).val();
            dataObj[name] = val;
        });

        $.ajax({
            method: method,
            url: `${url}`,
            data: dataObj,
            success: function () {
                let host = window.location.host;
                let protocol = window.location.protocol;

                window.location.href = protocol + '//' + host + `/home`;
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    _setListeners() {
        let loginForm = document.querySelector('[data-loginform]');
        let registerForm = document.querySelector('[data-registerform]');

        let loginSubmit = loginForm.querySelector('[type="submit"]');
        let regSubmit = registerForm.querySelector('[type="submit"]');
        let that = this;

        let arr = [loginSubmit,regSubmit];

        arr.forEach((el) => {
            el.addEventListener('click',(e) => {
                e.preventDefault();

                if(e.target.dataset.loginform) {
                    that._validator(loginForm)
                }

                if(e.target.dataset.registerform) {
                    that._validator(registerForm,'register')
                }
            })
        })
    }
}

export default RegisterController;
