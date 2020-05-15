// window.Vue = require('vue');

// import _ from 'lodash';
import './components/Menu';
import './components/Swiper';
import './components/Search';
import './components/Form';

import Validator from './functions/validator';
import SimpleMap from './components/Map'
import ContactsFormController from './controllers/ContactsFormController'
import LoginFormController from './controllers/LoginFormController'
import SearchController from './controllers/SearchController'
import DeliveryController from './controllers/DeliveryController'
import DeliveryFormController from './controllers/DeliveryFormController'
import CartController from './controllers/CartController'
import Checkbox from './components/Checkbox'
import DeliveryAuthController from './controllers/DeliveryAuthController'
import CatalogFiltersController from './controllers/CatalogFiltersController'
import InformationController from './controllers/InformationController'
import ProductDetailsController from './controllers/ProductDetailsController'
import ProductfeedbackController from './controllers/ProductFeedbackController'
import AboutController from './controllers/AboutController'
import CartProgressController from './controllers/CartProgressController'
import ProfileController from './controllers/ProfileController'

$(document).ready(function() {
    new Validator();
    new LoginFormController();
    new ContactsFormController();
    // new SearchController();
    new Checkbox();
    new CartController();
    new DeliveryAuthController();
    new CatalogFiltersController();
    new InformationController();
    new DeliveryFormController();
    new ProductDetailsController();
    new SimpleMap();
    new ProductfeedbackController();
    new AboutController();
    new CartProgressController();
    new ProfileController();
});
