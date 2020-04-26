class ProductFeedbackController {
    constructor() {
        let el = document.querySelector('.pfeedback');

        if(el) {
            this.setListeners(el);
            this._checkBoxHandler(el);
        }
    }
    _disableEnableBlocks(type, el) {
        let fblock = el.querySelector('.pfeedback_features');
        let mblock = el.querySelector('.pfeedback_minuses');

        function blockInput(el, type) {
            let input = el.querySelector('input');

            if(type === 'disable') {
                input.setAttribute('disabled', true);
            } else {
                input.removeAttribute('disabled');
            }
        }

        if(type === 'yes') {
            fblock.style.opacity = .5;
            mblock.style.opacity = 1;

            blockInput(fblock, 'disable');
            blockInput(mblock, 'enable');
        } else {
            fblock.style.opacity = 1;
            mblock.style.opacity = .5;

            blockInput(fblock, 'enable');
            blockInput(mblock, 'disable');
        }
    }

    _checkBoxHandler(el) {
        let b = el.querySelectorAll('.rcheckbox');
        let that = this;

        b.forEach((box) => {
            box.addEventListener('click', function(e) {
                let target = e.currentTarget;

                b.forEach((el) => {
                    let img = el.querySelector('img');
                    let input = el.querySelector('input');
                        input.value = '';
                        img.classList.add('invisible');
                });

                let input = target.querySelector('input');
                let img = target.querySelector('img');
                    img.classList.toggle('invisible');
                    input.value = 'true';

                    if(target.dataset.block != 'yes') {
                        that._disableEnableBlocks('no',el);
                    } else {
                        that._disableEnableBlocks('yes',el);
                    }
            })
        });
    }

    setListeners(el) {
        let that = this;
        let btn = el.querySelector('.action_btn');
        let inputs = el.querySelectorAll('input');

        btn && btn.addEventListener('click', function(e) {
           inputs.forEach((inpt) => {
               if(inpt.value != '') {
                   console.log('input', inpt);
               }
           })
        });
    }
}

export default ProductFeedbackController;
