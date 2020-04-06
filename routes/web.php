<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('pages.index');
});
//Catalog
Route::get('catalog', ['uses' => "ProductsController@index", 'as' => 'allProducts']);

//Search
Route::get('search', ['uses'=> "ProductsController@search", 'as' => 'searchProducts']);

//Cart
Route::get('cart', ['uses' => "ProductsController@showCart", 'as' => 'cartItems']);
    //Add items to cart
Route::get('product/AddToCart/{id}', ['uses' => 'ProductsController@addProductToCart', 'as' => 'AddToCartProduct']);
    //Remove items from cart
Route::get('product/deleteItemFromCart/{id}', ['uses' => 'ProductsController@deleteItemFromCart', 'as' => 'DeleteItemFromCart']);

//Auth routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/information', 'InformationController@index');
Route::get('/hits', 'HitsController@index');
Route::get('/about', 'AboutController@index');
Route::get('/landing', 'LandingController@index',['as' => 'landing']);
Route::get('/contacts', 'ContactsController@index');

//Admin pannel
Route::get('admin/products', ['uses' => "AdminProductsController@index", 'as' => 'adminDisplayProducts'])->middleware('restrictToAdmin');

Route::get('product/increaseSingleProduct/{id}', ['uses' => 'ProductsController@increaseSingleProduct', 'as' => 'IncreaseSingleProduct']);
Route::get('product/decreaseSingleProduct/{id}', ['uses' => 'ProductsController@decreaseSingleProduct', 'as' => 'DecreaseSingleProduct']);

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


//Orders
//Create order
Route::get('product/createOrder/', ['uses' => 'ProductsController@createOrder', 'as'=> 'createOrder']);



//Test file storage
Route::get('/testStorage', function() {
    return "<img src=".Storage::url('product_images/product1.png').">";
});