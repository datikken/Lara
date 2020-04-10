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
import DeliveryFormController from './controllers/DeliveryFormController'

let form = new ContactsFormController();
let search = new SearchController();

$(document).ready(function() {
    let domEl, map, dform;
        domEl = document.querySelector('.ymap-coords');

    if(domEl) map = new SimpleMap();
       domEl && map._simpleMap(domEl);

       dform = document.querySelector('.dform');

       if(dform) {
            new DeliveryFormController(dform);
       }

    let login = new LoginFormController();

    let cart, cartController;
        cart = document.querySelector('.cart');
        cart && new DeliveryController();
});