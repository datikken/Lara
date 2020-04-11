class Checkbox {
    constructor() {
        let inited = false;
        let checkboxes = document.querySelectorAll('.checkbox');

        if(!inited) {
            this.changeState(checkboxes);
        }
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