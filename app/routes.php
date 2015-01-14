<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'MainController@main');
Route::get('/commercial_law', 'StoreController@commercial_law');
Route::get('/store_setting', 'StoreController@store_setting');
Route::get('/payment_method', 'StoreController@payment_method');
Route::get('/setting_domain', 'StoreController@setting_domain');
Route::get('/store_about', 'StoreController@store_about');
Route::get('/store_url', 'StoreController@store_url');
Route::get('/item_management', 'StoreController@item_management');
Route::get('/dashboard', 'StoreController@dashboard');
Route::get('/welcome', 'HomeController@showWelcome');

Route::get('/login', 'UserController@showLogin');
Route::get('/doLogin', 'UserController@doLogin');
Route::get('/register', 'UserController@register');

Route::get('/forgetPassword', 'UserController@showForgetPassword');

