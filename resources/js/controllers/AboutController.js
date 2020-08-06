import Vue from 'vue';
import About from '../vue/About'

import store from '../vue/store/store'
import router from '../vue/router/router'
import VueRouter from 'vue-router'

class AboutController {
    renderAboutVue(el) {
        Vue.use(VueRouter);

        new Vue({
            render: h => h(About),
            store: store,
            router
        }).$mount('#about_vue')
    }
    _setListeners(nav) {
        let els = nav.querySelectorAll('.navigator_wrap-line_items-item');
        let line = nav.querySelector('.descline_item');
        let headings = nav.querySelectorAll('.aboutc_year');
        let contWraps = nav.querySelectorAll('.aboutc');
        let ww = window.screen.width;

        if(ww < 1000) {
            contWraps[1].style.display = 'none';
        }

        els.forEach((el) => {
            el.addEventListener('click', function (e) {
                let target = e.target;
                let offset = target.offsetLeft;
                let twidth = target.offsetWidth;
                let val = parseFloat(target.outerText);
                let w = offset + twidth;

                line.style.width = `${w}px`;

                headings[0].innerText = val;
                headings[1].innerText = val - 1;
            })
        })
    }

    constructor() {
        const nav = document.querySelector('.navigator');
        let aboutComp = document.querySelector('#about_vue')
            aboutComp && this.renderAboutVue();

        if(nav) {
            this._setListeners(nav);
        }
    }
}

export default AboutController;
