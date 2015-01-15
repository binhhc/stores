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
Route::resource('user', 'UserController');
Route::model('user', 'User');

//demo
Route::get('/welcome', 'HomeController@showWelcome');

Route::get('/', 'MainController@main');
Route::get('/commercial_law', 'StoreController@commercial_law');
Route::get('/store_setting', 'StoreController@store_setting');
Route::get('/payment_method', 'StoreController@payment_method');
Route::get('/setting_domain', 'StoreController@setting_domain');
Route::get('/store_about', 'StoreController@store_about');
Route::get('/store_url', 'StoreController@store_url');
Route::get('/item_management', 'UserItemController@item_management');
Route::get('/dashboard/', 'StoreController@dashboard');
Route::get('/dashboard/{id}', 'StoreController@dashboard');


//edit store
Route::get('/edit', 'StoreController@edit');
Route::get('/styles', 'StoreController@styles');

//Login
Route::get('/login', array('uses' => 'UserController@showLogin', 'before' => 'user'));
Route::post('/login', array('uses' => 'UserController@doLogin', 'before' => 'user|csrf'));

//account setting
Route::get('/account_setting', 'UserController@accountSetting');

Route::get('/register', 'UserController@register');

Route::post('/register' , array('as' => 'register', 'uses' => 'UserController@register'));
Route::post('/send_email' , array('as' => 'send_email', 'uses' => 'UserController@send_email'));



Route::get('/forgetPassword', 'UserController@showForgetPassword');
