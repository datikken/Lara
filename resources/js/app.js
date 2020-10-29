import $ from 'jquery'

import './components/Search'
import './components/Swiper'

import Checkbox from './components/Checkbox'
import Validator from './functions/validator'
import SearchController from './modules/SearchController'

//main page
import OwlCarouselController from './modules/OwlCarouselController'
//catalog page
import Catalog from './modules/Catalog'
//information
import InformationController from './modules/InformationController'
//hits

//blog
import BlogController from './modules/BlogController'
import BlogPostController from './modules/BlogPostController'

//contacts
import ContactsFormController from './modules/ContactsFormController'
import SimpleMap from './components/Map';

import CartController from './modules/cart/CartController'
import ProductDetailsSliderController from './modules/ProductDetailsSliderController'
import ProductFeedbackController from './modules/ProductFeedbackController'
import AboutController from './modules/AboutController'
import ProfileController from './modules/ProfileController'
import TrackingFeedController from './modules/TrackingFeedController'
import RegisterController from './modules/RegisterController'
import OrdersHistoryController from './modules/OrdersHistoryController'
import ProductDetailsMenuController from './modules/ProductDetailsMenuController'
import DashController from './modules/DashController'
import CartCheckoutVueApp from './modules/CartCheckoutVueApp';

import DeliveryFormController from './modules/DeliveryFormController'
import LandingController from './modules/LandingController'
import DadataController from './modules/DadataController'


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': window.token
    }
});

$(document).ready(function() {
    //every page
    new Checkbox();
    new Validator();
    new SearchController();

    let path = window.location.pathname;

    //main page
    if(path === '/') {
        new OwlCarouselController();
    }

    if(path === '/catalog') {
        new Catalog();
    }

    if(path === '/information') {
        new InformationController();
    }

    if(path === '/blog') {
        new BlogController();
        new BlogPostController();
    }

    if(path === '/contacts') {
        new ContactsFormController();
        new SimpleMap();
    }

    if(path === '/about') {
        new AboutController();
    }

    if(path.indexOf('product') >= 0) {
        new ProductDetailsSliderController();
        new OrdersHistoryController();
        new ProductFeedbackController();
        new ProductDetailsMenuController();
    }

    if(path === '/dash') {
        new DashController();
        new ProfileController();
    }

    if(path === '/cart') {
        new CartCheckoutVueApp();
        new CartController();
    }

    if(path === '/login') {
        new RegisterController();
    }

    if(path === '/tracking') {
        new TrackingFeedController();
    }

    // new DadataController();
    // new LandingController();

    //information page
    // new DeliveryFormController();


});
