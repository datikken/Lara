class DashController {
    constructor() {
        let block = document.querySelector('.dash');
            block && this._setActiveTab();
    }
    _setActiveTab() {
        let location = window.location.href;
        let tabs = document.querySelectorAll('.dash_left-wrap_item');
        let coupons = document.querySelector('.dash_right_coupone');

        tabs.forEach((el) => {
            let activeClass = el.classList.contains('dash_active');
            if(activeClass) {
                el.classList.remove('dash_active');
            }
        });

        if(coupons) {
            tabs[0].classList.add('dash_active');
        }
        if(location.indexOf('orders') >= 0) {
            tabs[1].classList.add('dash_active');
        }
        if(location.indexOf('fillAdressesForm') >= 0) {
            tabs[2].classList.add('dash_active');
        }
        if(location.indexOf('fillProfile') >= 0) {
            tabs[3].classList.add('dash_active');
        }
    }
}

export default DashController;
