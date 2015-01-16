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
Route::get('/addon', 'StoreController@addon');
Route::get('/sort_item', 'UserItemController@sort_item');
Route::get('/set_status', 'UserItemController@set_status');

Route::get('/list_item_ajax', 'UserItemController@list_item_ajax');
Route::get('/send_email', 'UserController@send_email');
Route::get('/update_sort/{$id}/{$order}', 'UserItemController@update_sort');

//edit store
Route::get('/edit', 'StoreController@edit');
Route::get('/styles', 'StoreController@styles');

//Login
Route::get('/login', 'UserController@showLogin');
Route::post('/login', 'UserController@doLogin');

//account setting
Route::get('/account_setting', 'UserController@accountSetting');

//change email
Route::get('/change_email', 'UserController@changeEmail');
//change password
Route::get('/change_password', 'UserController@changePassword');
//change profile
Route::get('/change_profile', 'UserController@changeProfile');
//change profile
Route::get('/change_shipping', 'UserController@changeShipping');
//change profile
Route::get('/change_credit_card', 'UserController@changeCreaditCard');
//change profile
Route::get('/change_destination_account', 'UserController@changeProfile');



Route::get('/register', 'UserController@register');

Route::post('/register' , array('as' => 'register', 'uses' => 'UserController@register'));
Route::post('/send_email' , array('as' => 'send_email', 'uses' => 'UserController@send_email'));



Route::get('/forgetPassword', 'UserController@showForgetPassword');
Route::post('/forgetPassword', 'UserController@doForgetPassword');


// Route::post('/checkEmailJson', 'UserController@checkEmailJson');
