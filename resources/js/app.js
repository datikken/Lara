import $ from 'jquery'

import './components/Search'
import './components/Swiper'

import Checkbox from './components/Checkbox'
import Validator from './functions/validator'
import SearchController from './modules/SearchController'
import OwlCarouselController from './modules/OwlCarouselController'
import Catalog from './modules/Catalog'
import InformationController from './modules/InformationController'
import BlogController from './modules/BlogController'
import BlogPostController from './modules/BlogPostController'
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

$(document).ready(function () {
    new Checkbox();
    new Validator();
    new SearchController();
    new OwlCarouselController();
    new Catalog();
    new InformationController();
    new BlogController();
    new BlogPostController();
    new ContactsFormController();
    new SimpleMap();
    new AboutController();
    new ProductDetailsSliderController();
    new OrdersHistoryController();
    new ProductFeedbackController();
    new ProductDetailsMenuController();
    new DashController();
    new ProfileController();
    new CartCheckoutVueApp();
    new CartController();
    new RegisterController();
    new TrackingFeedController();
    new DadataController();
    new LandingController();
    new DeliveryFormController();
});
