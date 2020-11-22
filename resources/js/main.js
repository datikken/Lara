import $ from 'jquery'
import './components/Search'
import './components/Swiper'

import Application from './Application';
import Checkbox from './components/Checkbox'
import Validator from './functions/validator'

// import SearchController from './controllers/SearchController'
// import OwlCarouselController from './controllers/OwlCarouselController'
// import Catalog from './controllers/Catalog'

// import InformationController from './controllers/InformationController'
// import BlogController from './controllers/BlogController'
// import BlogPostController from './controllers/BlogPostController'
// import ContactsFormController from './controllers/ContactsFormController'
// import SimpleMap from './components/Map';
// import CartController from './controllers/cart/CartController'
// import ProductDetailsSliderController from './controllers/ProductDetailsSliderController'
// import ProductFeedbackController from './controllers/ProductFeedbackController'
// import AboutController from './controllers/AboutController'
// import ProfileController from './controllers/ProfileController'
// import TrackingFeed from './controllers/TrackingFeedController'
// import RegisterController from './controllers/RegisterController'
// import OrdersHistoryController from './controllers/OrdersHistoryController'
// import ProductDetailsMenuController from './controllers/ProductDetailsMenuController'
// import DashController from './controllers/DashController'
// import CartCheckoutVueApp from './controllers/CartCheckoutVueApp';
//
// import LandingController from './controllers/LandingController'
// import DadataController from './controllers/DadataController'

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': window.token
    }
});

$(document).ready(function () {
    new Checkbox();
    new Validator();
    new Application();
});
