<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'uses' => 'MainController@getIndex',
    'as' => 'home.index'
]);

// Registration Routes
Route::post('auth/register', [
    'uses' => 'Auth\EmailConfirmController@sendConfirmEmail',
    'as' => 'register.sendconfrimemail'
]);
Route::get('/auth/register/activate/{token}', [
    'uses' => 'Auth\EmailConfirmController@confirmEmail',
    'as' => 'register.confrimemail'
]);
// Route::post('auth/register', [
//     'uses' => 'Auth\RegisterController@register',
//     'as' => 'register'
// ]);

//Authentication Routes
Route::post('auth/login', [ 
    'uses' => 'Auth\LoginController@login',
    'as' => 'login'
]);
Route::get('auth/logout', [
    'uses' => 'Auth\LoginController@logout',
    'as' => 'logout',
]);

// Password Reset Toutes
Route::post('password/email', [
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail',
    'as' => 'postPasswordEmail'
]);
Route::get('password/reset/{token?}', [
     'uses' => 'Auth\ResetPasswordController@showResetForm',
     'as' => 'getPasswordReset'
]);
Route::post('password/reset', [
    'uses' => 'Auth\ResetPasswordController@reset',
    'as' => 'postPasswordReset'
]);

//Map and menu lists search
Route::post('/maplist', [
    'uses' => 'MapListController@postMaplist',
    'as' => 'maplist'
]);
Route::post('/maplist/detailed', [
    'uses' => 'MapListController@postMaplistDetailed',
    'as' => 'maplist.detailed'
]);
Route::get('/maplist/search', [
    'uses' => 'MapListController@getMaplistSearch',
    'as' => 'maplist.search.get'
]);

//shopping cart
Route::get('product/{id}/{datetime_id}', [
    'uses' => 'ProductController@getProductShow',
    'as' => 'product.show'
]);
Route::post('product/cart/{meal_id}/{datetime_id}', [
    'uses' => 'ProductController@postAddToCart',
    'as' => 'product.cart'
]);
Route::get('product/cart/show/{id}', [
    'uses' => 'ProductController@getCartShow',
    'as' => 'product.cart.show'
]);
Route::post('product/cart/remove', [
    'uses' => 'ProductController@postCartRemove',
    'as' => 'product.cart.remove'
]);
Route::post('product/cart/store', [
    'uses' => 'ProductController@postCartStore',
    'as' => 'product.cart.store'
]);
Route::get('product/cart/checkout/{id}', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'product.cart.checkout'
]);
Route::post('product/cart/buynexttime', [
    'uses' => 'ProductController@postAddToBuyNextTime',
    'as' => 'product.cart.buynexttime'
]);
Route::post('product/cart/addreversemeal', [
    'uses' => 'ProductController@postAddReserveMeal',
    'as' => 'product.cart.addreversemeal'
]);
Route::post('product/cart/cancelreversemeal', [
    'uses' => 'ProductController@postCancelReserveMeal',
    'as' => 'product.cart.cancelreversemeal'
]);
Route::get('product/cart/otherdays/{meal_id}', [
    'uses' => 'ProductController@getOtherDays',
    'as' => 'product.cart.otherdays'
]);

//check out
Route::get('product/cart/bindingcard/{id}', [
    'uses' => 'CashierController@getBindingCard',
    'as' => 'product.cart.bindingcard'
]);
Route::post('product/cart/bindingpayment', [
    'uses' => 'CashierController@postBindingCheckout',
    'as' => 'product.cart.bindingpayment'
]);
Route::post('product/cart/onetimepayment', [
    'uses' => 'CashierController@postOneTimeCheckout',
    'as' => 'product.cart.onetimepayment'
]);

//order
Route::get('order/user_order/{id}', [
    'uses' => 'OrderController@getUserOrder',
    'as' => 'order.userorder'
]);
Route::get('order/chef_order/{id}', [
    'uses' => 'OrderController@getChefOrder',
    'as' => 'order.cheforder'
]);
Route::get('order/accept/get/{id}', [
    'uses' => 'OrderController@getAccept',
    'as' => 'order.accept.get'
]);
Route::post('order/accept/post', [
    'uses' => 'OrderController@postAccept',
    'as' => 'order.accept.post'
]);
Route::get('order/reject/{id}', [
    'uses' => 'OrderController@getReject',
    'as' => 'order.reject'
]);
Route::get('order/cancel/{id}', [
    'uses' => 'OrderController@getCancel',
    'as' => 'order.cancel'
]);

//evaluation
Route::get('evaluation/create/{meal_id}', [
    'uses' => 'EvaluationController@create',
    'as' => 'evaluation.create'
]);
Route::post('evaluation/store/{meal_id}', [
    'uses' => 'EvaluationController@store',
    'as' => 'evaluation.store'
]);

//Chef login
Route::post('/chef_login', [
    'uses' => 'MainController@chefLogin',
    'as' => 'main.cheflogin'
]);

//Facebook login
Route::get('auth/facebook', 'Auth\OAuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\OAuthController@handleProviderCallback');

//Chef CRUD and profile
Route::get('/chef_content', 'MainController@getChefContent');
Route::get('chef/datetimepeople/{id}', [
    'uses' => 'ChefController@getDateTimePeople',
    'as' => 'chef.datetimepeople.get'
]);
Route::post('chef/datetimepeople/{id}', [
    'uses' => 'ChefController@postDateTimePeople',
    'as' => 'chef.datetimepeople.post'
]);
Route::resource('chef', 'ChefController');
Route::resource('chef_profile', 'ChefProfileController', [
    'only' => ['index', 'edit', 'update', 'destroy']
]);

//Image 
Route::get('image/index/{id}', [
    'uses' => 'ImageController@index',
    'as' => 'image.index'
]);
Route::get('image/finish/{id}/', [
    'uses' => 'ImageController@finish',
    'as' => 'image.finish'
]);
Route::post('image/upload/{chef_id}', [
    'uses' => 'ImageController@upload',
    'as' => 'image.upload'
]);
Route::delete('image/delete/{chef_id}', [
    'uses' => 'ImageController@delete',
    'as' => 'image.delete'
]);

//User CRUD and profile
Route::resource('user_profile', 'UserProfileController', [
    'except' => ['store', 'show']
]);
Route::post('user_reset_password', [
    'uses' => 'UserProfileController@resetPassword',
    'as' => 'user.resetpassword'
]);
Route::post('user_payment_create', [
    'uses' => 'UserProfileController@postPaymentCreate',
    'as' => 'user.payment.create'
]);
Route::post('user_payment_edit', [
    'uses' => 'UserProfileController@postPaymentEdit',
    'as' => 'user.payment.edit'
]);
Route::get('user_payment_delete/{id}', [
    'uses' => 'UserProfileController@getPaymentDelete',
    'as' => 'user.payment.delete'
]);

// Page Control
Route::get('contact', [
    'uses' => 'PageController@getContact',
    'as' => 'contact.get'
]);
Route::post('contact', [
    'uses' => 'PageController@postContact',
    'as' => 'contact.post'
]);
Route::get('about', [
    'uses' => 'PageController@getAbout',
    'as' => 'about.get'
]);
Route::get('press', [
    'uses' => 'PageController@getPress',
    'as' => 'press.get'
]);
Route::get('career', [
    'uses' => 'PageController@getCareer',
    'as' => 'career.get'
]);
Route::get('help', [
    'uses' => 'PageController@getHelp',
    'as' => 'help.get'
]);

// Chang Language
Route::get('/language', [
    'uses' => 'LangController@changeLang',
    'as' => 'language.change'
]);