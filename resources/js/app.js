require('./bootstrap');
// window.Vue = require('vue');
import './components/Menu';
import './components/Swiper';
import './components/Search';
import './components/Form';

import SimpleMap from './components/Map';
import ContactsFormController from './controllers/ContactsFormController'
import LoginFormController from './controllers/LoginFormController'
import SearchController from './controllers/SearchController'

let form = new ContactsFormController();
let search = new SearchController();

$(document).ready(function() {
    let map = new SimpleMap();
    let domEl = $('.ymap-coords');
        domEl && map._simpleMap(domEl);

    let login = new LoginFormController();
});