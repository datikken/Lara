class LoginFormController {
    constructor() {
        let wraps = document.querySelectorAll('.password_field');

        wraps.forEach((el) => {
            console.log('wraps.forEac', el);

            let span = el.querySelector('.password_field-label');
                span.addEventListener('click', function() {

                    let input = el.querySelector('input');
                    let attr = input.getAttribute('type');

                    if(attr === 'text') {
                        input.setAttribute('type', 'password');
                    } else {
                        input.setAttribute('type', 'text');
                    }


                   console.warn(input);
                });
        })


    }
}

export default LoginFormController;