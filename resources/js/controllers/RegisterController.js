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

    _setError(str, type) {
        let item, error;

        if(type === 'register') {
            item = document.querySelector('[data-register]');
        } else {
            item = document.querySelector('[data-auth]');
        }

        if(str.indexOf('required') > 0) {
            item.innerText = 'Проверьте пароль.'
            item.classList.add('invalid');
            error = true;
        }

        if(str.indexOf('email') > 0) {
            item.innerText = 'Проверьте почту.'
            item.classList.add('invalid');
            error = true;
        }

        if(str.indexOf('taken') > 0) {
            item.innerText = 'Почтовый ящик уже зарегистрирован.'
            item.classList.add('invalid');
            error = true;
        }

        if(str.indexOf('invalid') > 0) {
            item.innerText = 'Проверьте правильность введенных данных.';
            item.classList.add('invalid');
            error = true;
        }

        console.warn('_setError', str, str.indexOf('taken'));

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
        let item = document.querySelector('[data-register]');
        let agreement = document.querySelector('.agreement');
        let check = agreement.querySelector('.checkbox-wrap_arrow');
        let span = agreement.querySelector('span');

        if(check.classList.contains('invisible')) {
            span.classList.add('invalid');
            item.innerText = 'Вам необходимо принять пользовательское соглашение.'
            return false;
        } else {
            span.classList.remove('invalid')
            item.innerText = 'Зарегистрируйте свой аккаунт используя любой способ.'
            return true;
        }
    }
    _validator(form, type='') {
        let status = false;

        if(type != '') {
            status = this._agreementCheck();
        } else {
            status = true
        }

        status && this._ajaxCall(form);

        try {
            window.app.validator.formValidate([], $(form));
        } catch(err) {
            this._setError(err.message, type)
        }
    }

    _ajaxCall(form) {
        let url = form.getAttribute('action');
        let method = form.getAttribute('method');
        let inputs = form.querySelectorAll('input');
        let that = this;
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
                console.warn('an error occured in ajax', error.responseJSON);

                if(error.responseText.indexOf('taken') > 0) {
                    that._setError(error.responseText, 'register');
                } else {
                    that._setError(error.responseText, 'login');
                }
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
