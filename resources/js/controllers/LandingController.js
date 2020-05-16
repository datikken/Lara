class LandingController {
    constructor() {
        let el = document.querySelector('.animland');

        if(el) {
            this._setListeners(el);
        }
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
                            left: `-20%`
                        });
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
