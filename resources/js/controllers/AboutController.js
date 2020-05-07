class AboutController {
    _setListeners(nav) {
        let els = nav.querySelectorAll('.navigator_wrap-line_items-item');
        let line = nav.querySelector('.descline_item');

        els.forEach((el) => {
            el.addEventListener('click', function (e) {
                let target = e.target;
                let offset = target.offsetLeft;
                let twidth = target.offsetWidth;

                let w = offset + twidth;

                line.style.width = `${w}px`;

                console.log(target, target.offsetLeft)
            })
        })
    }

    constructor() {
        const nav = document.querySelector('.navigator');

        if(nav) {
            this._setListeners(nav);
        }
    }
}

export default AboutController;
