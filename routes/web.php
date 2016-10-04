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
    'uses' => 'Auth\RegisterController@register',
    'as' => 'register'
]);

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

Route::post('/maplist', [
    'uses' => 'MainController@getMaplist',
    'as' => 'main.maplist'
]);
