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

//shopping cart and check out
Route::get('product/{id}/{datetime_id}', [
    'uses' => 'ProductController@getProductShow',
    'as' => 'product.show'
]);
Route::post('product/cart/{meal_id}/{datetime_id}', [
    'uses' => 'ProductController@postAddToCart',
    'as' => 'product.cart'
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
Route::resource('chef', 'ChefController');
Route::resource('chef_profile', 'ChefProfileController', [
    'only' => ['index', 'edit', 'update', 'destroy']
]);

//User CRUD and profile
Route::resource('user_profile', 'UserProfileController', [
    'except' => ['store', 'show']
]);
Route::post('user_reset_password', [
    'uses' => 'UserProfileController@resetPassword',
    'as' => 'user.resetpassword'
]);