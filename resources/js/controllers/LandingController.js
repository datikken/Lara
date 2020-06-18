import TweenMax, { Bounce } from 'gsap';

class LandingController {
    constructor() {
        let el = document.querySelector('.animland');
        let slider = document.querySelector('.economslider');

        if(el) {
            this._setListeners(el);
            this._sliderActivate(slider);
        }
    }

    _priceController(val, el) {
        let economy = el.querySelector('.economslider_economy');

        economy.innerText = `${val}0000`;
    }
    _sliderActivate(el) {
        let line = el.querySelector('.economslider_breaks');
        let fill = el.querySelector('.economslider_line_inner');
        let pointer = el.querySelector('.economslider_label-center');
        let that = this;

        line.addEventListener('click', (e) => {
            let val = parseFloat(e.target.classList.value.split('-')[1]);
            let left = el.querySelector('.economslider_label-left');
            let rigth = el.querySelector('.economslider_label-right');

            that._priceController(val,el);

                fill.style.width = `${val}0%`;
                pointer.style.left = `${val}0%`;

                if(val === 1) {
                    left.style.opacity = '0';
                    pointer.innerText = `${val} год`;
                }

                if(val >= 2 && val < 5) {
                    left.style.opacity = '1';
                    pointer.innerText = `${val} года`;
                }

                if(val >= 5) {
                    left.style.opacity = '1';
                    pointer.innerText = `${val} лет`;
                }

                if(val === 10 || val === 9) {
                    rigth.style.opacity = '0';
                } else {
                    rigth.style.opacity = '1';
                }
        });
    }
    _setListeners(el) {
        let icon = el.querySelector('.animland_icon_inner');

        var testlist = document.querySelectorAll('.animland'),
            test = Array.prototype.slice.call(testlist,0);

        var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.intersectionRatio > 0) {
                        TweenMax.to(icon, 2, {
                            x:100,
                            ease: Bounce.easeOut,
                            left: `-20%`,
                        });
                    } else {
                        icon.style.left = '-600px'
                    }
                });
            },
            {
                rootMargin: '0px 0px'
            });

        test.forEach(function (test) {
            observer.observe(test);
        });
    }
}

export default LandingController;
