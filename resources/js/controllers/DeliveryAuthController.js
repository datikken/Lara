class DeliveryAuthController {
    constructor() {
        let form = document.querySelector('.cart_check');
        if(form) {
            this.validate(form);
        }
    }
    validate(form) {
        console.log(form);
        let submit = form.querySelector('[type="submit"]');
        let groups = form.querySelectorAll('.cart_check-wrap_item-group');

        submit.addEventListener('click', function(e) {
            e.preventDefault();

            groups.forEach((group) => {
                let input = group.querySelector('input');
                let label = group.querySelector('.invisible');
                let btn = form.querySelector('.cart_check-button');
                let item = form.querySelector('.cart_check-wrap_item');

                if(input.value == '') {
                    input.classList.add('errorBorder');
                    label && label.classList.remove('invisible');
                    btn.style.alignSelf = 'center';
                    item.style.marginBottom = 0;
                }

                console.warn(input.value);
            });

        });
    }
}
export default DeliveryAuthController;