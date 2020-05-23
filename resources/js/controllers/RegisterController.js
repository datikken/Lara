
class RegisterController {
    constructor() {
        let auth = document.querySelector('.auth-decor');

        auth && this._setListeners();
    }

    _agreementCheck() {
        let agreement = document.querySelector('.agreement');
        let check = agreement.querySelector('.checkbox-wrap_arrow');
        let span = agreement.querySelector('span');

        if(check.classList.contains('invisible')) {
            span.classList.add('invalid')
        } else {
            span.classList.remove('invalid')
        }
    }
    _validator(form) {
        app.validator.formValidate([], $(form));

        this._agreementCheck();
    }

    _registerHandler() {}
    _loginHandler() {}

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
                    that._validator(registerForm)
                }
            })
        })
    }
}

export default RegisterController;
