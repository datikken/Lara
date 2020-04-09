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
import DeliveryController from './controllers/DeliveryController'

let form = new ContactsFormController();
let search = new SearchController();

$(document).ready(function() {
    let domEl, map;
        domEl = $('.ymap-coords');

    if(domEl) map = new SimpleMap();
       domEl && map._simpleMap(domEl);

    let login = new LoginFormController();

    let cart, cartController;
        cart = $('.cart');
        cart && new DeliveryController();
});