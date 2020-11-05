import $ from 'jquery';

let actions = {
    SET_OFERTA_POLICY_STATE(context, val) {
        context.commit('setOfertaPolicyState', val);
    },
    SET_DELIVERY_ADRESS(context, adr) {
        context.commit('setDeliveryAdress', adr);
    },
    PROCEED_WITH_LAST_DELIVERY_ADRESS(context, adr) {
        context.commit('proceedWithLastDeliveryAdress', adr);
    },
    CREATE_MAGIC_BTN(context,btn) {
        context.commit('createMagicBtn',btn);
    },
    SET_READY_TO_GO(context, val) {
        context.commit('setReadyToGo', val);
    },
    SET_ADDITIONAL_FORMS(context, str) {
        context.commit('setAdditionalForms', str);
    },
    VALIDATE_POST_DELIVERY_FORM(context) {
        context.commit('validatePostDeliveryForm')
    },
    GET_LAST_DELIVERY_ADRESS(context) {
        context.commit('getLastDeliveryAdress');
    },
    BLOCK_FORM_INPUTS(context, el) {
        context.commit('blockFormInputs', el);
    },
    REFRESH_CUTOMER_DATA(context, data) {
        context.commit('refreshCutomerData', data)
    },
    CHECK_DELIVERY_ADRESS(context, adrObj) {
        context.commit('checkDeliveryAdress', adrObj);
    },
    CHECK_DELIVERY_PICKUPS(context, pickup) {
        context.commit('checkDeliveryPickups', pickup);
    },
    GET_ALL_INFORMATION_POSTS(context) {
        context.commit('getAllInformationPosts');
    },
    SHOW_DELIVERY_TYPE_HELPER(context) {
        context.commit('showDeliveryTypeHelper');
    },
    SEND_GOOGLE_ANALYTICS(context, obj) {
        context.commit('sendGoogleAnalytics', obj);
    },
    CATALOG_LOAD_MORE(context) {
        context.commit('catalogLoadMore');
    },
    SWITCH_CATALOG_LAYOUT(context) {
        context.commit('switchCatalogLayout');
    },
    UNIT_PAY(context) {
        context.commit('unitPay');
    },
    CREATE_SIGNATURE_HASH(context, obj) {
        context.commit('createSignatureHash', obj);
    },
    GET_VIEWED_PRODUCTS(context) {
        context.commit('getViewedProducts');
    },
    SET_PRODUCT_VIEWED(context, id) {
        context.commit('setProductViewed', id);
    },
    GET_TWO_YEARS_INFO_BY_SELECT(context, year) {
        context.commit('getTwoYearsInfoBySelect', year);
    },
    GET_ABOUTS_YEARS(context) {
        context.commit('getAboutYears');
    },
    GET_SINGLE_ORDER_INFO(context, id) {
        context.commit('getSingleOrderInfo', id)
    },
    FINISH_CONTRACT(context) {
        context.commit('finishContract');
    },
    FINISH_ORDER_PROCESS(context) {
        context.commit('finishOrderProcess');
    },
    SET_PICKUP_POINT(context, obj) {
        context.commit('setPickUpPoint', obj);
    },
    VALIDATE_DELIVERY_ADRESS(context, form) {
        context.commit('validateDeliveryAdress', form);
    },
    GET_ALL_PRODUCTS(context) {
        context.commit('getAllProducts');
    },
    GET_ORDERS_INFO(context) {
        context.commit('getOrdersInfo');
    },
    SCROLL_TO_TOP(context) {
        context.commit('scrollToTop')
    },
    PAY_WITH_CARD(context, obj) {
        context.commit('payWithCard', obj);
    },
    SET_PAYMENT_PROVIDER(context, provider) {
        context.commit('setPaymentProvider', provider)
    },
    CREATE_ORDER(context) {
        context.commit('createOrder');
    },
    SET_URIKS_INFO(context, obj) {
        context.commit('setUriksInfo', obj);
    },
    SAVE_URIKS_DATA(context, obj) {
        context.commit('saveUriksData', obj)
    },
    VALIDATE_RS(context, obj) {
        context.commit('RSValidation', obj);
    },
    SET_DELIVERY_INDEX(context, obj) {
        context.commit('setDeliveryIndex', obj);
    },
    REMOVE_DELIVERY_TYPE_ERROR(context) {
        context.commit('removeDeliveryTypeError');
    },
    DELIVERY_TYPE_ERROR(context) {
        context.commit('deliveryTypeError');
    },
    APPLY_DELIVERY_ADRESS(context, data) {
        context.commit('applyDeliveryAdress', data);
    },
    PRICE_FILTER(context, name) {
        context.commit('applyPriceFilter', name);
    },
    SET_DELIVERY_TYPE(context, name) {
        context.commit('setDeliveryType', name);
    },
    CHECK_CART_STATE(context) {
        context.commit('checkCartState');
    },
    CHANGE_PROGRESS_STEP(context, text) {
        context.commit('changeProgressStep', text);
    },
    SET_CUSTOMER_FIO(context, obj) {
        context.commit('setCustomerFio', obj);
    },
    GET_USERS_INFO(context) {
        context.commit('getUserInfo');
    },
    ADD_PRODUCT_TO_CART(context, {id, amount}) {
        context.commit('addProductToCart', {id, amount})
    },
    GET_PRODUCT_BY_ID(context, id) {
        context.commit('getProductById', id);
    },
    SWITCH_PRODUCTS_LOADER(context) {
        context.commit('setProductsLoaded');
    },
    FILTER_PRODUCTS(context, data) {
        context.commit('filterProductByQuery', data);
    },
    FILTER_PRODUCTS_BY_BRAND(context, query) {
        context.commit('filterProductsByBrand', query);
    },
    FILTER_PRODUCTS_BY_MODEL(context, query) {
        context.commit('filterProductsByModel', query);
    },
    FILTER_PRODUCTS_BY_PRINTERTYPE(context, query) {
        context.commit('filterProductsByPrinterType', query);
    },
    COLLECT_FILTERS(context) {
        context.commit('getProductTypeFilters');
        context.commit('getProductModelBrandFilters');
    },
    GET_MODEL_BRAND_FILTERS(context) {
        context.commit('getProductModelBrandFilters');
    },
    SHOW_NOTIFICATION(context, msg, type) {
        context.commit('showNotification', msg, type);
    },
    fixCartStatus(state, {data}) {
        let amount = data.totalQuantity;
        let price = data.totalPrice;

        $('[data-cartIcon]').attr('src', '/images/menu/cart.svg');

        $('[data-cartamountval]').text(amount);
        $('[data-cartpriceval]').text(price);
    }
};

export default actions;
