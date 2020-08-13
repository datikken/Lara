import $ from 'jquery';
``
class ContactsFormController {
    constructor() {
        $(document).ready(function() {
            let themeInput = document.querySelector('[data-theme]');

            $('.cfeedback_wrap-row_item-row_inner').on('click', (e) => {
                $('.cfeedback_wrap-row_item-row_inner').each( (i, el) => {
                    let span = e.currentTarget.querySelector('span').innerText;

                    // console.log('ContactsFormController', span, e.currentTarget)

                    themeInput.value = span;

                    if(el.classList.contains(('active'))) {
                        el.classList.remove('active');
                    }
                });

                e.currentTarget.classList.add('active');
            })
        })
    }
}

export default ContactsFormController;
