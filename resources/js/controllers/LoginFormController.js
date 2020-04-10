class LoginFormController {
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
    constructor() {
        let that = this;
        let wraps = document.querySelectorAll('.password_field');
        let formType = document.querySelectorAll('.form_type-item');

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
}

export default LoginFormController;