class Checkbox {
    constructor() {
        let inited = false;
        let checkboxes = document.querySelectorAll('.checkbox');
        let helper = document.querySelector('.delivery_type');

        if(!helper) {
            if(!inited) {
                this.changeState(checkboxes);
            }
        } else {
            this._helperController(helper)
        }
    }
    _helperController(el) {
        let checkboxes = el.querySelectorAll('.checkbox');
            checkboxes.forEach((el) => {
                let inited = false;

                el.addEventListener('click', function (e) {
                    let img = el.querySelector('img');
                    let input = el.querySelector('input');
                    console.log(input);
                    //очищает прежние значения
                    checkboxes.forEach((check) => {
                        let input = el.querySelector('input');
                        let img = check.querySelector('img');

                        if(!img.classList.contains('invisible')) {
                            img.classList.add('invisible');
                            input.removeAttribute('checked', '');
                            input.removeAttribute('value', '');
                        }
                    });

                    img.addEventListener('click', function(e) {
                        if(!inited) {
                            img.classList.add('invisible');
                            inited = true;
                        } else {
                            img.classList.remove('invisible');
                            inited = false;
                        }
                    });
                    if(!inited) {
                        img.classList.add('invisible');
                        inited = true;
                    } else {
                        img.classList.remove('invisible');
                        inited = false;
                    }
                });
            });
        // console.warn('helper', el, checkboxes);
    }
    changeState(els) {
        els.forEach((a) => {
            let clicked = false;
            let img = a.querySelector('img');

            img.addEventListener('click', function(e) {
                if(!clicked) {
                    img.classList.add('invisible');
                    clicked = true;
                } else {
                    img.classList.remove('invisible');
                    clicked = false;
                }
            });
            a.addEventListener('click', function (e) {
                let img = e.target.querySelector('img');
                if(!clicked) {
                    img.classList.add('invisible');
                    clicked = true;
                } else {
                    img.classList.remove('invisible');
                    clicked = false;
                }
            });
        })
    }
}

export default Checkbox;