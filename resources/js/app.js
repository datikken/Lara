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
import Checkbox from './components/Checkbox'
import DeliveryAuthController from './controllers/DeliveryAuthController'
// import PageController from './controllers/PagesController'

$(document).ready(function() {
    new LoginFormController();
    new ContactsFormController();
    new SearchController();
    new Checkbox();
    new CartController();
    new DeliveryAuthController();
    // new PageController();

    cart = document.querySelector('.cart');
    let mapEl, map, dform, cart;

        mapEl = document.querySelector('.ymaps');

    cart && new DeliveryController();

    if(mapEl) map = new SimpleMap(mapEl);
       dform = document.querySelector('.dform');

       if(dform) {
         new DeliveryFormController(dform);
       }
});