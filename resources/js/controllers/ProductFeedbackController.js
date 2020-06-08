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
            fblock.style.opacity = 1;
            mblock.style.opacity = .5;

            blockInput(fblock, 'enable');
            blockInput(mblock, 'disable');
        } else {
            fblock.style.opacity = .5;
            mblock.style.opacity = 1;

            blockInput(fblock, 'disable');
            blockInput(mblock, 'enable');
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

                    if(target.dataset.block != 'yes') {
                        input.value = 'false';
                        that._disableEnableBlocks('no',el);
                    } else {
                        input.value = 'true';
                        that._disableEnableBlocks('yes',el);
                    }
            })
        });
    }
    _sayThanks() {
        let thanks = document.querySelector('.thanks');
        let closeThanks = thanks.querySelector('.thanks_wrap_btn');
            closeThanks.addEventListener('click', function() {
                thanks.classList.add('as-none');
            })

            thanks.classList.remove('as-none');
            window.scrollTo(0,0);
    }
    _cleanFields() {
        let inputs = document.querySelectorAll('input');
        let textareas = document.querySelectorAll('textarea')

        let arr = [...inputs, ...textareas];

        arr.forEach((el) => {
            el.value = ''
        });

        this._sayThanks();
    }
    setListeners(el) {
        let that = this;
        let btn = el.querySelector('.action_btn');
        let inputs = el.querySelectorAll('input');
        let txtarea = el.querySelector('textarea');

        btn && btn.addEventListener('click', function(e) {
            e.preventDefault();

            let dataObj = {};

            inputs.forEach((inpt) => {
               if(inpt.value != '') {
                   let name = inpt.getAttribute('name');
                       dataObj[name] = inpt.value;
               }

               if(txtarea.value != '') {
                   let name = txtarea.getAttribute('name');
                   dataObj[name] = txtarea.value;
               }
            })


            let url = el.querySelector('form').getAttribute('action');
            let _token = document.querySelector('[name="_token"]').value;

            console.log(dataObj, url, _token);

            $.ajax({
                method: "get",
                url: `${url}`,
                data: dataObj,
                success: function (data, status, XHR) {
                    that._cleanFields();
                },
                error: function (error, status, XHR) {
                    console.warn(error);
                }
            });
        });
    }
}

export default ProductFeedbackController;
