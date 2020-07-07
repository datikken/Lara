window.Vue = require('vue');

import $ from 'jquery';

import Validator from './functions/validator';
import SimpleMap from './components/Map';

import './components/Menu';
import './components/Swiper';
import './components/Search';
import './components/Form';

import ContactsFormController from './controllers/ContactsFormController'
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
import TrackingFeedController from './controllers/TrackingFeedController'
import LandingController from './controllers/LandingController'
import RegisterController from './controllers/RegisterController'
import DadataController from './controllers/DadataController'
import OrdersHistoryController from './controllers/OrdersHistoryController'
import ProductDetailsMenuController from './controllers/ProductDetailsMenuController'
import DashController from './controllers/DashController'
import BlogPostController from './controllers/BlogPostController'
import OwlCarouselController from './controllers/OwlCarouselController'

$(document).ready(function() {
    new OwlCarouselController();
    new Validator();
    new OrdersHistoryController();
    new DadataController();
    new Validator();
    new ContactsFormController();
    new LandingController();
    new SearchController();
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
    new TrackingFeedController();
    new RegisterController();
    new ProductDetailsMenuController();
    new DashController();
    new DeliveryController();
    new BlogPostController();
});
