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
import CartController from './controllers/CartController'

$(document).ready(function() {
    new LoginFormController();
    new ContactsFormController();
    new SearchController();

    cart = document.querySelector('.cart');

    let domEl, map, dform, cart, pgrid;
        pgrid = document.querySelector('.products_grid');
        if(!pgrid) pgrid = document.querySelector('.cart_wrap');

        domEl = document.querySelector('.ymap-coords');

    cart && new DeliveryController();
    pgrid && new CartController(pgrid);

    if(domEl) map = new SimpleMap();
       domEl && map._simpleMap(domEl);

       dform = document.querySelector('.dform');

       if(dform) {
            new DeliveryFormController(dform);
       }
});