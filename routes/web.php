<?php
//Auth routes
Auth::routes();

//Main page
Route::get('/',['uses' => "ProductsController@showIndex", 'as' => 'index']);
//Catalog page
Route::get('catalog', ['uses' => "ProductsController@index", 'as' => 'allProducts']);
//Search page
Route::get('search', ['uses'=> "ProductsController@search", 'as' => 'searchProducts']);
//Cart page
Route::get('cart', ['uses' => "ProductsController@showCart", 'as' => 'cartItems']);
    //Add items to cart
Route::get('product/AddToCart/{id}', ['uses' => 'ProductsController@addProductToCart', 'as' => 'AddToCartProduct']);
    //Remove items from cart
Route::get('product/deleteItemFromCart/{id}', ['uses' => 'ProductsController@deleteItemFromCart', 'as' => 'DeleteItemFromCart']);
Route::get('product/details/{id}',['uses' => 'ProductsController@productDetails', 'as' => 'ShowProductDetails']);
//Tracking
Route::get('tracking', ['uses' => 'TrackingController@index', 'as' => 'tracking'])->middleware('restrictToAdmin');

//PROFILE
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/fillProfile', ['uses' => 'HomeController@showFillProfileForm', 'as' => 'fillProfile']);
Route::get('/home/fillAdressesForm', ['uses' => 'HomeController@showFillAdressesForm', 'as' => 'fillAdresses']);
Route::get('/home/fillAdresses', ['uses' => 'HomeController@FillAdresses', 'as' => 'FillAdressesDB']);
Route::post('/home/userAvatar', ['uses' => 'HomeController@setUsersAvatar', 'as' => 'FillUserAvatar']);
Route::get('/home/collectProfileData', ['uses' => 'HomeController@collectProfileData', 'as' => 'collectProfileData']);
Route::get('/home/orders',['uses'=> 'HomeController@displayOrders', 'as'=>'displayUserOrders']);

//Blog
Route::get('blog', ['uses' => 'BlogController@index', 'as' => 'blog']);
Route::get('blog/{id}', ['uses' => 'BlogController@postDetails', 'as' => 'postDetails']);

//PAGES
Route::get('/information', 'InformationController@index');
Route::get('/hits', 'HitsController@index');
Route::get('/about', 'AboutController@index');
Route::get('/landing', 'LandingController@index',['as' => 'landing']);
Route::get('/landingt2', 'LandingController@second',['as' => 'landingt2']);
Route::get('/contacts', 'ContactsController@index');

//Contacts feedback
Route::post('/contacts/feedback', 'ContactsController@collectFeedback');
Route::get('/product/feedback', 'ProductFeedbackController@index');

//CART
Route::get('product/increaseSingleProduct/{id}', ['uses' => 'ProductsController@increaseSingleProduct', 'as' => 'IncreaseSingleProduct']);
Route::get('product/decreaseSingleProduct/{id}', ['uses' => 'ProductsController@decreaseSingleProduct', 'as' => 'DecreaseSingleProduct']);
Route::get('products/addToCartAjaxGet/{id}', ['uses' => 'ProductsController@addToCartAjaxGet', 'as' => 'AddToCartAjaxGet']);

//ORDERS
Route::get('product/checkoutProducts/', ['uses' => 'ProductsController@checkoutProducts', 'as'=> 'checkoutProducts'])->middleware('restrictToAdmin');
Route::get('product/setCustomerFio',['uses' => 'ProductsController@setCustomerFio','as'=>'setCustomerFio']);
Route::get('product/delivery',['uses' => 'ProductsController@setDelivery','as'=>'setDelivery']);
Route::get('product/deliveryForm',['uses' => 'ProductsController@deliveryForm','as'=>'deliveryForm']);
Route::post('product/setIndex',['uses' => 'ProductsController@setIndex','as'=>'setIndex']);
Route::get('product/setAddress',['uses' => 'ProductsController@setAddress','as'=>'setAddress']);
Route::post('product/setIssue',['uses' => 'ProductsController@setIssue','as'=>'setIssue']);
Route::get('checkOrderStatus', ['uses' => 'AdminTrackingController@checkOrderStatus', 'as' => 'checkOrderStatus']);
Route::post('fetchProducts',['uses' => 'AdminProductsController@fetchProducts', 'as' => 'fetchProducts']);
Route::get('product/createOrder/', ['uses' => 'ProductsController@createOrder', 'as'=> 'createOrder']);
Route::get('product/repeatOrder/{id}', ['uses' => 'ProductsController@repeatOrder', 'as'=> 'repeatOrder']);
Route::get('product/proceedPayment',['uses' => 'PaymentsController@proceedPayment','as'=>'proceedPayment']);

Route::post('/home/getOrderInfo/{id}',['uses' => 'HomeController@getOrderInfo', 'as' => 'GetOrderInfo']);

//Email Subscriptions
Route::post('subscribe',['uses' => 'SubscriptionsController@subscribe','as'=>'subscribe']);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Reset password
Route::post('reset_password_without_token', 'HomeController@validatePasswordRequest');
Route::post('reset_password_with_token', 'HomeController@resetPassword');

//ADMIN - functionality
//Subscriptions
Route::get('admin/subscriptions',['uses' => 'AdminSubscriptionsController@index', 'as' => 'AdminSubscriptions']);
//Tracking
Route::get('admin/tracking', ['uses' => 'AdminTrackingController@index', 'as' => 'AdminDisplayTracking']);
Route::post('admin/collectData', ['uses' => 'AdminTrackingController@collectData', 'as' => 'AdminCollectTracking']);

//Orders
Route::get('admin/orders', ['uses' => 'AdminOrdersController@index', 'as' => 'AdminDisplayOrders']);
//Users
Route::get('admin/users', ['uses' => 'AdminUsersController@index', 'as' => 'adminDisplayUsers']);

//BLOG
Route::get('admin/blog',['uses' => 'AdminPostController@index', 'as' => 'adminDisplayBlog']);
Route::get('admin/createPost',['uses' => 'AdminPostController@showCreateForm', 'as' => 'adminDisplayCreateForm']);
Route::post('admin/sendCreatePost',['uses' => 'AdminPostController@sendCreatePost', 'as' => 'sendCreatePost']);
Route::post('admin/sendCreatePhoto',['uses' => 'AdminPostController@savePostImage', 'as' => 'adminSavePhoto']);
Route::get('admin/deletePost/{id}', ['uses' => "AdminPostController@deletePost", 'as' => 'AdminDeletePost']);
Route::get('admin/editPost/{id}', ['uses' => "AdminPostController@editPost", 'as' => 'AdminEditPost']);

//ABOUT
Route::get('admin/about', ['uses' => "AdminAboutController@index", 'as' => 'adminDisplayAbout']);
Route::get('admin/createAbout', ['uses' => "AdminAboutController@displayCreateAbout", 'as' => 'adminDisplayCreateAbout']);
Route::post('admin/sendCreateAbout', ['uses' => "AdminAboutController@sendCreateAbout", 'as' => 'adminSendCreateAbout']);
Route::get('admin/deleteAbout/{id}', ['uses' => "AdminAboutController@deleteAbout", 'as' => 'AdminDeleteAbout']);

//PRODUCTS
Route::get('admin', ['uses' => "AdminProductsController@main", 'as' => 'adminMainPage'])->middleware('restrictToAdmin');
Route::get('admin/products', ['uses' => "AdminProductsController@index", 'as' => 'adminDisplayProducts'])->middleware('restrictToAdmin');
Route::get('admin/users', ['uses' => "AdminUsersController@index", 'as' => 'adminDisplayUsers'])->middleware('restrictToAdmin');
//Display Edit Product form
Route::get('admin/editProductForm/{id}', ['uses' => "AdminProductsController@editProductForm", 'as' => 'adminEditProductForm'])->middleware('restrictToAdmin');
//Display edit Product form
Route::get('admin/editProductImageForm/{id}', ['uses' => "AdminProductsController@editProductImageForm", 'as' => 'adminEditProductImageForm'])->middleware('restrictToAdmin');
//update product image
Route::post('admin/updateProductImage/{id}', ['uses' => 'AdminProductsController@updateProductImage', 'as' => 'adminUpdateProductImage'])->middleware('restrictToAdmin');
//update product fields
Route::post('admin/updateProduct/{id}', ['uses' => 'AdminProductsController@updateProduct', 'as' => 'adminUpdateProduct'])->middleware('restrictToAdmin');
//Display create Product form
Route::get('admin/createProductForm', ['uses' => "AdminProductsController@createProductForm", 'as' => 'adminCreateProductForm'])->middleware('restrictToAdmin');
//send data create Product form
Route::post('admin/sendCreateProductForm', ['uses' => "AdminProductsController@sendCreateProductForm", 'as' => 'adminSendCreateProductForm'])->middleware('restrictToAdmin');
//Delete product
Route::get('admin/deleteProduct/{id}',['uses' => 'AdminProductsController@deleteProduct', 'as' => 'adminDeleteProduct'])->middleware('restrictToAdmin');
//Load multiple images for product
Route::get('admin/dropZone/{id}', ['uses' => 'AdminProductsController@dropZoneForm', 'as' => 'dropZoneForm'])->middleware('restrictToAdmin');
Route::post('admin/addMultipleProductImages/{id}', ['uses' => 'AdminProductsController@addMultipleProductImages', 'as' => 'addMultipleProductImages'])->middleware('restrictToAdmin');

//BANNERS
Route::get('admin/adminCreateBannerForm', ['uses' => "AdminBannersController@createBannerForm", 'as' => 'adminCreateBannerForm'])->middleware('restrictToAdmin');
Route::get('admin/banners', ['uses' => "AdminBannersController@index", 'as' => 'setBanner'])->middleware('restrictToAdmin')->middleware('restrictToAdmin');

//INFORMATION
Route::get('admin/information', ['uses' => "AdminInformationController@index", 'as' => 'informationList'])->middleware('restrictToAdmin');
Route::get('admin/createInformation', ['uses' => 'AdminInformationController@showCreateInfoForm', 'as' => 'adminCreateInfo'])->middleware('restrictToAdmin');
Route::get('admin/deleteInfo/{id}', ['uses' => 'AdminInformationController@deleteInfo', 'as' => 'adminDeleteInfo'])->middleware('restrictToAdmin');
Route::get('admin/editInformation/{id}', ['uses' => "AdminInformationController@editInformation", 'as' => 'adminEditInformation'])->middleware('restrictToAdmin');
Route::post('admin/createInfo', ['uses' => 'AdminInformationController@createInfo', 'as' => 'adminCreateInfo'])->middleware('restrictToAdmin');
Route::post('admin/editInformationForm/{id}', ['uses' => "AdminInformationController@editInformationForm", 'as' => 'editInformationForm'])->middleware('restrictToAdmin');

//EMAILS
Route::get('admin/sendemail', 'SendEmailController@index')->middleware('restrictToAdmin');
Route::post('admin/sendemail/send', 'SendEmailController@send')->middleware('restrictToAdmin');

//Test file storage
Route::get('/testStorage', function() {
    return "<img src=".Storage::url('product_images/product1.png').">";
});
//Test smtp
Route::get('/mailtest', function() {
    dd(Config::get('mail'));
});
//Test email template
Route::get('/mailtemplate', ['uses' => "SendEmailController@testEmailTemplate", 'as' => 'mailtemplate']);
