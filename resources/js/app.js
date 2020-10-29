import $ from 'jquery';

import Validator from './functions/validator';
import SimpleMap from './components/Map';

import './components/Swiper';
import './components/Search';
import './components/Form';

import ContactsFormController from './controllers/ContactsFormController'
import SearchController from './controllers/SearchController'

import DeliveryController from './controllers/DeliveryController'
import DeliveryFormController from './controllers/DeliveryFormController'

import CartController from './controllers/CartController'

import Checkbox from './components/Checkbox'
import InformationController from './controllers/InformationController'

import ProductDetailsSliderController from './controllers/ProductDetailsSliderController'
import ProductFeedbackController from './controllers/ProductFeedbackController'
import AboutController from './controllers/AboutController'
import ProfileController from './controllers/ProfileController'
import TrackingFeedController from './controllers/TrackingFeedController'
import LandingController from './controllers/LandingController'
import RegisterController from './controllers/RegisterController'

import DadataController from './controllers/DadataController'

import OrdersHistoryController from './controllers/OrdersHistoryController'
import ProductDetailsMenuController from './controllers/ProductDetailsMenuController'
import DashController from './controllers/DashController'

import BlogController from './controllers/BlogController'
import BlogPostController from './controllers/BlogPostController'

import OwlCarouselController from './controllers/OwlCarouselController'
import CatalogController from './controllers/CatalogController'

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': window.token
    }
});

$(document).ready(function() {
    //main page
    new OwlCarouselController();
    new Validator();
    new SearchController();

    new ProductDetailsSliderController();
    new CatalogController();
    new OrdersHistoryController();

    //todo vue
    // new DadataController();

    //blog page
    // new BlogController();
    // new BlogPostController();

    new ContactsFormController();
    new LandingController();

    // new Checkbox();

    new CartController();

    //information page
    // new InformationController();

    // new DeliveryFormController();

    //contacts page
    new SimpleMap();

    //product details

    new ProductFeedbackController();
    new ProductDetailsMenuController();

    //about page
    new AboutController();

    //dash
    new ProfileController();

    //tracking
    new TrackingFeedController();

    //auth page
    new RegisterController();
    new DashController();

});
