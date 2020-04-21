class LoginFormController {
    constructor() {
        let that = this;
        let wraps = document.querySelectorAll('.password_field');
        let formType = document.querySelectorAll('.form_type-item');
        let loginBtn = document.querySelector('.login-btn');

        loginBtn.addEventListener('click', function(e) {
            // that._login(e);
        });

        $('.form_type-item').on('click', function (e) {
            that._pickFaceType(e)
        });

        wraps.forEach((el) => {
            let span = el.querySelector('.password_field-label');
            let clicked = false;

                span.addEventListener('click', function() {
                    let input = el.querySelector('input');
                    let attr = input.getAttribute('type');

                    if(!clicked) {
                        input.setAttribute('type', 'text');
                        clicked = true;
                    } else {
                        input.setAttribute('type', 'password');
                        clicked = false;
                    }
                });
        })
    }
    _login(e) {
        e.preventDefault();
        let form = document.querySelector('.login-form');

        let url = form.querySelector('form').getAttribute('action');
        let token = form.querySelector('[name="_token"]').value;
        let login = form.querySelector('[name="email"]').value;
        let password = form.querySelector('[name="password"]').value;

        console.log(url, token, login, password);

        $.ajax({
            method: "post",
            url: `${url}`,
            data: {
                email: login,
                password,
                token
            },
            success: function (data, status, XHR) {
                console.log(status)
            },
            error: function (error, status, XHR) {
                console.warn(error);
            }
        });


    }
    _register() {

    }
    _pickFaceType(etc) {
        let inputs = document.querySelectorAll('.form_type-item');
        let el = etc.currentTarget;

        inputs.forEach((el) => {
            el.classList.remove('activeFormItem');

            let faceInput = document.querySelector('[name="face"]');
            let text = el.querySelector('.form_type-itemText_inner');

            if(text) faceInput.setAttribute('value', '');
        });

        el.classList.toggle('activeFormItem');
    }
}

export default LoginFormController;
