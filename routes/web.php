<?php
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

//Auth routes
Auth::routes();

//PROFILE
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/fillProfile', ['uses' => 'HomeController@showFillProfileForm', 'as' => 'fillProfile']);
Route::get('/home/fillAdressesForm', ['uses' => 'HomeController@showFillAdressesForm', 'as' => 'fillAdresses']);
Route::get('/home/fillAdresses', ['uses' => 'HomeController@FillAdresses', 'as' => 'FillAdressesDB']);

//PAGES
Route::get('/information', 'InformationController@index');
Route::get('/hits', 'HitsController@index');
Route::get('/about', 'AboutController@index');
Route::get('/landing', 'LandingController@index',['as' => 'landing']);
Route::get('/contacts', 'ContactsController@index');

//Contacts feedback
Route::post('/contacts/feedback', 'ContactsController@collectFeedback');
Route::get('/product/feedback', 'ProductFeedbackController@index');

//ADMIN - functionality

    //PRODUCTS
Route::get('admin/products', ['uses' => "AdminProductsController@index", 'as' => 'adminDisplayProducts'])->middleware('restrictToAdmin');
    //Display Edit Product form
    Route::get('admin/editProductForm/{id}', ['uses' => "AdminProductsController@editProductForm", 'as' => 'adminEditProductForm']);
    //Display edit Product form
    Route::get('admin/editProductImageForm/{id}', ['uses' => "AdminProductsController@editProductImageForm", 'as' => 'adminEditProductImageForm']);
    //update product image
    Route::post('admin/updateProductImage/{id}', ['uses' => 'AdminProductsController@updateProductImage', 'as' => 'adminUpdateProductImage']);
    //update product fields
    Route::post('admin/updateProduct/{id}', ['uses' => 'AdminProductsController@updateProduct', 'as' => 'adminUpdateProduct']);
    //Display create Product form
    Route::get('admin/createProductForm', ['uses' => "AdminProductsController@createProductForm", 'as' => 'adminCreateProductForm']);
    //send data create Product form
    Route::post('admin/sendCreateProductForm', ['uses' => "AdminProductsController@sendCreateProductForm", 'as' => 'adminSendCreateProductForm']);
    //Delete product
    Route::get('admin/deleteProduct/{id}',['uses' => 'AdminProductsController@deleteProduct', 'as' => 'adminDeleteProduct']);
    //Load multiple images for product
    Route::get('admin/dropZone/{id}', ['uses' => 'AdminProductsController@dropZoneForm', 'as' => 'dropZoneForm']);
    Route::post('admin/addMultipleProductImages/{id}', ['uses' => 'AdminProductsController@addMultipleProductImages', 'as' => 'addMultipleProductImages']);

//BANNERS
Route::get('admin/adminCreateBannerForm', ['uses' => "AdminBannersController@createBannerForm", 'as' => 'adminCreateBannerForm']);
    //banners
    Route::get('admin/banners', ['uses' => "AdminBannersController@index", 'as' => 'setBanner'])->middleware('restrictToAdmin');

//INFORMATION
Route::get('admin/information', ['uses' => "AdminInformationController@index", 'as' => 'informationList']);
    Route::get('admin/createInformation', ['uses' => 'AdminInformationController@showCreateInfoForm', 'as' => 'adminCreateInfo']);
    Route::get('admin/deleteInfo/{id}', ['uses' => 'AdminInformationController@deleteInfo', 'as' => 'adminDeleteInfo']);
    Route::get('admin/editInformation/{id}', ['uses' => "AdminInformationController@editInformation", 'as' => 'adminEditInformation']);

    Route::post('admin/createInfo', ['uses' => 'AdminInformationController@createInfo', 'as' => 'adminCreateInfo']);
    Route::post('admin/editInformationForm/{id}', ['uses' => "AdminInformationController@editInformationForm", 'as' => 'editInformationForm']);

//CART
Route::get('product/increaseSingleProduct/{id}', ['uses' => 'ProductsController@increaseSingleProduct', 'as' => 'IncreaseSingleProduct']);
Route::get('product/decreaseSingleProduct/{id}', ['uses' => 'ProductsController@decreaseSingleProduct', 'as' => 'DecreaseSingleProduct']);
    //Route::post('products/addToCartAjaxPost', ['uses' => 'ProductsController@addToCartAjaxPost', 'as' => 'AddToCartAjaxPost']);
    Route::get('products/addToCartAjaxGet/{id}', ['uses' => 'ProductsController@addToCartAjaxGet', 'as' => 'AddToCartAjaxGet']);

//EMAILS
    Route::get('admin/sendemail', 'SendEmailController@index');
    Route::post('admin/sendemail/send', 'SendEmailController@send');

//ORDERS
Route::get('product/checkoutProducts/', ['uses' => 'ProductsController@checkoutProducts', 'as'=> 'checkoutProducts']);
Route::get('product/createOrder/', ['uses' => 'ProductsController@createOrder', 'as'=> 'createOrder']);
Route::get('product/setCustomerFio',['uses' => 'ProductsController@setCustomerFio','as'=>'setCustomerFio']);
Route::get('product/delivery',['uses' => 'ProductsController@setDelivery','as'=>'setDelivery']);
Route::get('product/deliveryForm',['uses' => 'ProductsController@deliveryForm','as'=>'deliveryForm']);
Route::post('product/setIndex',['uses' => 'ProductsController@setIndex','as'=>'setIndex']);
Route::get('product/proceedPayment',['uses' => 'PaymentsController@proceedPayment','as'=>'proceedPayment']);
Route::get('product/setAddress',['uses' => 'ProductsController@setAddress','as'=>'setAddress']);
Route::post('product/setIssue',['uses' => 'ProductsController@setIssue','as'=>'setIssue']);

//Email Subscriptions
Route::post('subscribe',['uses' => 'SubscriptionsController@subscribe','as'=>'subscribe']);

//Test file storage
Route::get('/testStorage', function() {
    return "<img src=".Storage::url('product_images/product1.png').">";
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/mailtest', function()
{
    dd(Config::get('mail'));
});
