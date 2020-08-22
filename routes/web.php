<?php
//Auth routes
Auth::routes(['verify' => true]);
Route::group(['middleware' => 'restrictToAdmin'], function () {
//ORDERS
    Route::get('/admin/changeOrderStatus/{id}', ['uses' => 'AdminOrdersController@changeOrderStatus', 'as' => 'changeOrderStatus']);
    Route::get('/getOrdersInfo', ['uses' => 'OrdersController@ordersHistory', 'as' => 'GetOrdersInfo']);
    Route::get('/checkoutProducts', ['uses' => 'ProductsController@checkoutProducts', 'as' => 'checkoutProducts']);
    Route::get('/getSingleOrderInfo/{id}', ['uses' => 'OrdersController@getOrderInfo', 'as' => 'getSingleOrderInfo']);

//Tracking
    Route::get('tracking', ['uses' => 'TrackingController@index', 'as' => 'tracking']);
});

Route::group(['middleware' => 'ajax'], function () {
    //Search page
    Route::get('search', ['uses' => "ProductsController@search", 'as' => 'searchProducts']);
});

//PRODUCTS
Route::group(['middleware' => 'checkUserRole'], function () {
    Route::post('/admin/sliderCreate', ['uses' => 'AdminMainSliderController@create', 'as' => 'AdminCreateMainSlider']);
    Route::get('/admin', ['uses' => "AdminProductsController@main", 'as' => 'adminMainPage']);
    Route::get('/admin/products', ['uses' => "AdminProductsController@index", 'as' => 'adminDisplayProducts']);
    Route::get('/admin/users', ['uses' => "AdminUsersController@index", 'as' => 'adminDisplayUsers']);
//Display Edit Product form
    Route::get('/admin/editProductForm/{id}', ['uses' => "AdminProductsController@editProductForm", 'as' => 'adminEditProductForm']);
//Display edit Product form
//    Route::get('/admin/editProductImageForm/{id}', ['uses' => "AdminProductsController@editProductImageForm", 'as' => 'adminEditProductImageForm']);
//update product image
//    Route::post('/admin/updateProductImage/{id}', ['uses' => 'AdminProductsController@updateProductImage', 'as' => 'adminUpdateProductImage']);
//update product fields
    Route::post('/admin/updateProduct/{id}', ['uses' => 'AdminProductsController@updateProduct', 'as' => 'adminUpdateProduct']);
//Display create Product form
    Route::get('/admin/createProductForm', ['uses' => "AdminProductsController@createProductForm", 'as' => 'adminCreateProductForm']);
//send data create Product form
    Route::post('/admin/sendCreateProductForm', ['uses' => "AdminProductsController@sendCreateProductForm", 'as' => 'adminSendCreateProductForm']);
//Delete product
    Route::get('/admin/deleteProduct/{id}', ['uses' => 'AdminProductsController@deleteProduct', 'as' => 'adminDeleteProduct']);
//Load multiple images for product
    Route::get('/admin/dropZone/{id}', ['uses' => 'AdminProductsController@dropZoneForm', 'as' => 'dropZoneForm']);
    Route::post('/admin/addMultipleProductImages/{id}', ['uses' => 'AdminProductsController@addMultipleProductImages', 'as' => 'addMultipleProductImages']);
    Route::get('/admin/cleanProductImages/{id}', ['uses' => 'AdminProductsController@cleanProductImages', 'as' => 'cleanProductImages']);

//BANNERS
    Route::get('/admin/adminCreateBannerForm', ['uses' => "AdminBannersController@createBannerForm", 'as' => 'adminCreateBannerForm']);
    Route::get('/admin/banners', ['uses' => "AdminBannersController@index", 'as' => 'setBanner']);

//INFORMATION
    Route::get('/admin/information', ['uses' => "AdminInformationController@index", 'as' => 'informationList']);
    Route::get('/admin/createInformation', ['uses' => 'AdminInformationController@showCreateInfoForm', 'as' => 'adminCreateInfo']);
    Route::get('/admin/deleteInfo/{id}', ['uses' => 'AdminInformationController@deleteInfo', 'as' => 'adminDeleteInfo']);
    Route::get('/admin/editInformation/{id}', ['uses' => "AdminInformationController@editInformation", 'as' => 'adminEditInformation']);
    Route::post('/admin/createInfo', ['uses' => 'AdminInformationController@createInfo', 'as' => 'adminSaveCreateInfo']);
    Route::post('/admin/editInformationForm/{id}', ['uses' => "AdminInformationController@editInformationForm", 'as' => 'editInformationForm']);

//EMAILS
    Route::get('/admin/sendemail', 'SendEmailController@index');
    Route::post('/admin/sendemail/send', 'SendEmailController@send');
});

//Main page
Route::get('/', ['uses' => "ProductsController@showIndex", 'as' => 'index']);

//Viewed
Route::get('/getViewed', ['uses' => 'ViewedController@index', 'as' => 'getViewed']);
Route::post('/setViewed/{id}', ['uses' => 'ViewedController@create', 'as' => 'createViewed']);
Route::get('/resetViewed', ['uses' => 'ViewedController@reset', 'as' => 'forgetViewed']);

//CATALOG
Route::get('/catalog', ['uses' => "ProductsController@catalogHTML", 'as' => 'allProducts']);

//Catalog cartridge
Route::get('/catalogСartridge', ['uses' => "ProductsController@index", 'as' => 'allCartridges']);
////Catalog page
//Route::get('/catalogPaper', ['uses' => "ProductsController@index", 'as' => 'allProducts']);

Route::get('/getUserInfo', ['uses' => 'UsersController@get_user_info', 'as' => 'getUsersInfo']);
//Cart page
Route::get('cart', ['uses' => "CartController@showCart", 'as' => 'cartItems']);
//Add items to cart
Route::get('product/AddToCart/{id}', ['uses' => 'ProductsController@addProductToCart', 'as' => 'AddToCartProduct']);
//Remove items from cart
Route::get('product/deleteItemFromCart/{id}', ['uses' => 'ProductsController@deleteItemFromCart', 'as' => 'DeleteItemFromCart']);
Route::get('product/{id}', ['uses' => 'ProductsController@productDetails', 'as' => 'ShowProductDetails']);

//PROFILE
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/fillProfile', ['uses' => 'HomeController@showFillProfileForm', 'as' => 'fillProfile']);
Route::get('/home/fillAdressesForm', ['uses' => 'HomeController@showFillAdressesForm', 'as' => 'fillAdresses']);
Route::get('/home/fillAdresses', ['uses' => 'HomeController@FillAdresses', 'as' => 'FillAdressesDB']);
Route::post('/home/userAvatar', ['uses' => 'HomeController@setUsersAvatar', 'as' => 'FillUserAvatar']);
Route::get('/home/collectProfileData', ['uses' => 'HomeController@collectProfileData', 'as' => 'collectProfileData']);
Route::get('/home/orders', ['uses' => 'HomeController@displayOrders', 'as' => 'displayUserOrders']);

//Blog
Route::get('blog', ['uses' => 'BlogController@index', 'as' => 'blog']);
Route::get('blog/{id}', ['uses' => 'BlogController@postDetails', 'as' => 'postDetails']);
Route::post('blog/like/{id}', ['uses' => 'BlogController@like', 'as' => 'blogLike']);

//PAGES
Route::get('/information', 'InformationController@index');
Route::get('/hits', 'HitsController@index');
Route::get('/about', 'AboutController@index');
Route::get('/about/years/{$id}', 'AboutController@getTwoYears');
Route::get('/landing', 'LandingController@index', ['as' => 'landing']);
Route::get('/landingt2', 'LandingController@second', ['as' => 'landingt2']);
Route::get('/contacts', 'ContactsController@index');

//Contacts feedback
Route::post('/contacts/feedback', 'ContactsController@collectFeedback');
Route::get('/productFeedback', 'ProductFeedbackController@index');

//CART
Route::get('product/increaseSingleProduct/{id}', ['uses' => 'ProductsController@increaseSingleProduct', 'as' => 'IncreaseSingleProduct']);
Route::get('product/decreaseSingleProduct/{id}', ['uses' => 'ProductsController@decreaseSingleProduct', 'as' => 'DecreaseSingleProduct']);
Route::get('products/addToCartAjaxGet/{id}', ['uses' => 'ProductsController@addToCartAjaxGet', 'as' => 'AddToCartAjaxGet']);

Route::get('/setCustomerFio', ['uses' => 'CustomerDataController@setCustomerFio', 'as' => 'setCustomerFio']);
Route::get('/setUrikInfo', ['uses' => 'CustomerDataController@setUrikInfo', 'as' => 'setUrikInfo']);

Route::get('/deliveryForm', ['uses' => 'CustomerDataController@deliveryForm', 'as' => 'deliveryForm']);

Route::post('/setAdress', ['uses' => 'CustomerDataController@setAdress', 'as' => 'setAdress']);
Route::post('/setIndex', ['uses' => 'CustomerDataController@setIndex', 'as' => 'setIndex']);
Route::get('product/setAddress', ['uses' => 'ProductsController@setAddress', 'as' => 'setAddress']);
Route::post('product/setIssue', ['uses' => 'ProductsController@setIssue', 'as' => 'setIssue']);
Route::get('checkOrderStatus', ['uses' => 'AdminTrackingController@checkOrderStatus', 'as' => 'checkOrderStatus']);
Route::post('fetchProducts', ['uses' => 'AdminProductsController@fetchProducts', 'as' => 'fetchProducts']);
Route::get('removeProducts', ['uses' => 'AdminProductsController@removeProducts', 'as' => 'removeProducts']);
Route::get('/createOrder', ['uses' => 'AdminOrdersController@createOrder', 'as' => 'createOrder']);
Route::get('product/repeatOrder/{id}', ['uses' => 'AdminOrdersController@repeatOrder', 'as' => 'repeatOrder']);
Route::get('product/proceedPayment', ['uses' => 'PaymentsController@proceedPayment', 'as' => 'proceedPayment']);

//Email Subscriptions
Route::post('subscribe', ['uses' => 'SubscriptionsController@subscribe', 'as' => 'subscribe']);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//ADMIN - functionality
Route::get('/adminRights/{id}',['uses' => 'AdminUsersController@makeAdmin', 'as' => 'MakeUserAdmin']);

//Utils
Route::get('/admin/show_pickups', ['uses' => 'AdminUtilsController@show', 'as' => 'ShowPickups' ]);
Route::post('/create_pickup', ['uses' => 'AdminUtilsController@create', 'as' => 'CreatePickup' ]);

//Documents
Route::get('/admin/displayDocumentUpload', ['uses' => 'AdminDocumentsController@create', 'as' => 'AdminDisplayDocumentUpload']);
Route::post('/admin/createDocument', ['uses' => 'AdminDocumentsController@store', 'as' => 'AdminCreateDocument']);
Route::get('/admin/displayDocuments', ['uses' => 'AdminDocumentsController@index', 'as' => 'AdminDisplayDocuments']);
Route::get('/admin/deleteDocument/{id}', ['uses' => 'AdminDocumentsController@destroy', 'as' => 'AdminDeleteDocument']);
Route::get('/admin/downloadDocument/{name}', ['uses' => 'AdminDocumentsController@download', 'as' => 'AdminDocumentsDownload']);

//Subscriptions
Route::get('/admin/subscriptions', ['uses' => 'AdminSubscriptionsController@index', 'as' => 'AdminSubscriptions']);
//Tracking
Route::get('/admin/tracking', ['uses' => 'AdminTrackingController@index', 'as' => 'AdminDisplayTracking']);
Route::post('/admin/collectData', ['uses' => 'AdminTrackingController@collectData', 'as' => 'AdminCollectTracking']);

//Main slider
Route::get('/admin/slider', ['uses' => 'AdminMainSliderController@display', 'as' => 'AdminMainSlider']);
Route::get('/admin/slider/{id}', ['uses' => 'AdminMainSliderController@delete', 'as' => 'AdminDeleteMainSlider']);
Route::get('/admin/sliderDisplayCreate', ['uses' => 'AdminMainSliderController@showCreateForm', 'as' => 'AdminDisplayCreateMainSlider']);

//Orders
Route::get('/admin/orders', ['uses' => 'AdminOrdersController@index', 'as' => 'AdminDisplayOrders']);
//Users
Route::get('/admin/users', ['uses' => 'AdminUsersController@index', 'as' => 'adminDisplayUsers']);

//BLOG
Route::get('/admin/blog', ['uses' => 'AdminPostController@index', 'as' => 'adminDisplayBlog']);
Route::get('/admin/createPost', ['uses' => 'AdminPostController@showCreateForm', 'as' => 'adminDisplayCreateForm']);
Route::post('/admin/sendCreatePost', ['uses' => 'AdminPostController@sendCreatePost', 'as' => 'sendCreatePost']);

Route::post('/admin/sendCreatePhoto', ['uses' => 'AdminPostController@savePostImage', 'as' => 'adminSavePhoto']);
Route::get('/admin/deletePost/{id}', ['uses' => "AdminPostController@deletePost", 'as' => 'AdminDeletePost']);
Route::get('/admin/editPost/{id}', ['uses' => "AdminPostController@editPost", 'as' => 'AdminEditPost']);
Route::post('/admin/updatePost/{id}', ['uses' => 'AdminPostController@updatePost', 'as' => 'updateCreatedPost']);

//ABOUT
Route::get('/admin/about', ['uses' => "AdminAboutController@index", 'as' => 'adminDisplayAbout']);
Route::get('/admin/createAbout', ['uses' => "AdminAboutController@displayCreateAbout", 'as' => 'adminDisplayCreateAbout']);
Route::post('/admin/sendCreateAbout', ['uses' => "AdminAboutController@sendCreateAbout", 'as' => 'adminSendCreateAbout']);
Route::get('/admin/deleteAbout/{id}', ['uses' => "AdminAboutController@deleteAbout", 'as' => 'AdminDeleteAbout']);
Route::get('/createYearToDescribe', ['uses' => 'AdminAboutController@createYearToDescribe', 'as' => 'CreateYearToDescribe']);
Route::get('/getAboutYears', ['uses' => 'AdminAboutController@getAboutYears', 'as' => 'GetAboutYears']);
Route::post('/getTwoYearsInfoBySelect', ['uses' => 'AdminAboutController@getTwoYearsInfoBySelect', 'as' => 'getTwoYearsInfoBySelect']);

Route::get('/setPaymentProvider', ['uses' => 'PaymentsController@setPaymentProvider', 'as' => 'setPaymentProvider']);

//TECH ROUTES
Route::get('/checkCartState', ['uses' => 'CartController@checkCartState', 'as' => 'checkCartState']);

//Session
Route::get('/getSessionInfo', ['uses' => 'CustomerDataController@getSessionInfo', 'as' => 'getSessionInfo']);

//Test file storage
Route::get('/testStorage', function () {
    return "<img src=" . Storage::url('product_images/product1.png') . ">";
});

//Test smtp
Route::get('/mailtest', function () {
    dd(Config::get('mail'));
});

Route::get('change-password', 'ChangePasswordController@index');
Route::post('StoreNewPassword', ['uses' => 'ChangePasswordController@store', 'as' => 'StoreNewPassword']);

//Test email template
Route::get('/mailtemplate', ['uses' => "SendEmailController@testEmailTemplate", 'as' => 'mailtemplate']);

Route::get('/custinfo', ['uses' => 'CustomerDataController@getSessionInfo']);
