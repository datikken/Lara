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
    _clearCheckboxes(item) {
        let img = item.querySelector('img');
        let input = item.querySelector('input');
            input.removeAttribute('checked');
            img.classList.add('invisible');
    }
    _helperController(el) {
        let that = this;
        let checkboxes = el.querySelectorAll('.checkbox');

            checkboxes.forEach((el) => {
                let clicked = false;

                el.addEventListener('click', function(e) {
                    let img = e.currentTarget.querySelector('img');
                    let input = e.currentTarget.querySelector('input');

                    console.log(img, input);

                    checkboxes.forEach((box)=> {
                        that._clearCheckboxes(box);
                        clicked = false;
                    });

                    if(!clicked) {
                        img.classList.remove('invisible');
                        input.setAttribute('checked', true);

                        clicked = true;
                    } else {
                        img.classList.add('invisible');
                        input.removeAttribute('checked', true);

                        clicked = false;
                    }
                });
            });
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
                let input = a.querySelector('input');
                let img = e.target.querySelector('img');

                if(!clicked) {
                    img.classList.add('invisible');
                    input.removeAttribute('checked');
                    clicked = true;
                } else {
                    img && img.classList.remove('invisible');
                    input.setAttribute('checked', true);
                    clicked = false;
                }
            });
        })
    }
}

export default Checkbox;