class ContactsFormController {
    constructor() {
        $(document).ready(function() {
            $('.cfeedback_wrap-row_item-row_inner').on('click', (e) => {
                $('.cfeedback_wrap-row_item-row_inner').each( (i, el) => {
                    // console.log(el)
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
