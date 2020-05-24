import IMask from 'imask';

class DeliveryAuthController {
    constructor() {
        let form = document.querySelector('.cart_check');

        if(form) {
            this._focusClearListeners();
            this.validate(form);

            var phoneMask = IMask(
                document.querySelector('.masked'), {
                    mask: '+{7}(000)000-00-00'
                });
        }
    }
    _focusClearListeners() {
        let groups = document.querySelectorAll('.cart_check-wrap_item-group');
    }
    _makeCall() {
        let url = document.querySelector('.cart_check-wrap').getAttribute('data-href');
        let _token = document.querySelector('[name="_token"]').getAttribute('value');
        let inputs = document.querySelectorAll('input');
        let dataObj = {};

        inputs.forEach((npt,i) => {
                let name = npt.getAttribute('name');
                let val = $(npt).val();
                dataObj[name] = val;

                if(name === 'save') {
                    if(npt.getAttribute('checked')) {
                        dataObj.save = true;
                    } else {
                        dataObj.save = false;
                    }
                }
        });

        $.ajax({
            method: "GET",
            url: url,
            data: {
                token: _token,
                ...dataObj
            },
            success: function (data, status, XHR) {
                let host = window.location.host;
                let protocol = window.location.protocol;

                window.location.href = protocol + '//' + host + `/product/deliveryForm`;
            },
            error: function (error, status, XHR) {
                console.warn(error);
            }
        });
    }
    validate(form) {
        let submit = form.querySelector('[type="submit"]');
        let groups = form.querySelectorAll('.cart_check-wrap_item-group');
        let tel = form.querySelector('[name="tel"]')
        let that = this;

        groups.forEach((el) => {
            let input = el.querySelector('input');
            let label = el.querySelector('[data-err]');

            input && input.addEventListener('focus', () => {
                input.classList.remove('errorBorder')
                label.classList.add('invisible')
            })
        })

        submit.addEventListener('click', function(e) {
            e.preventDefault();
            groups.forEach((group) => {
                let input = group.querySelector('input');
                let label = group.querySelector('.invisible');
                let btn = form.querySelector('.cart_check-button');
                let item = form.querySelector('.cart_check-wrap_item');

                if(input && input.value === '') {
                    input.classList.add('errorBorder');
                    label && label.classList.remove('invisible');
                }
            });

            let fform = $(form)
            let valid = app.validator.formValidate([], fform);

            valid && that._makeCall();
        });
    }
}
export default DeliveryAuthController;
