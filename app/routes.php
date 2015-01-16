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
Route::get('/commercial_law', array('before' => 'auth', 'StoreController@commercial_law'));
Route::get('/store_setting', array('before' => 'auth', 'StoreController@store_setting'));
Route::get('/payment_method', array('before' => 'auth', 'StoreController@payment_method'));
Route::get('/setting_domain', array('before' => 'auth', 'StoreController@setting_domain'));
Route::get('/store_about', array('before' => 'auth', 'StoreController@store_about'));
Route::get('/store_url', array('before' => 'auth', 'StoreController@store_url'));
Route::get('/item_management', array('before' => 'auth', 'UserItemController@item_management'));
Route::get('/dashboard/', array('before' => 'auth', 'StoreController@dashboard'));
Route::get('/dashboard/{id}', array('before' => 'auth', 'StoreController@dashboard'));
Route::get('/addon', array('before' => 'auth', 'AddonController@addon'));
Route::get('/sort_item', array('before' => 'auth', 'UserItemController@sort_item'));
Route::get('/set_status', 'UserItemController@set_status');

Route::get('/list_item_ajax', array('before' => 'auth', 'UserItemController@list_item_ajax'));
Route::get('/send_email', array('before' => 'auth', 'UserController@send_email'));
Route::get('/update_sort/{$id}/{$order}', array('before' => 'auth', 'UserItemController@update_sort'));

//edit store
Route::get('/edit', array('before' => 'auth', 'StoreController@edit'));
Route::get('/styles', array('before' => 'auth', 'StoreController@styles'));

//Login
Route::get('/login', 'UserController@showLogin');
Route::post('/login', 'UserController@doLogin');

//logout
Route::post('/logout', 'UserController@doLogout');

//account setting
Route::get('/account_setting', array('before' => 'auth', 'UserController@accountSetting'));

//change email in account setting
Route::get('/change_email', array('before' => 'auth', 'UserController@changeEmail'));
//change password in account setting
Route::get('/change_password', array('before' => 'auth', 'UserController@changePassword'));
//change profile
Route::get('/change_profile', array('before' => 'auth', 'UserController@changeProfile'));
//change profile
Route::get('/change_shipping', array('before' => 'auth', 'UserController@changeShipping'));
//change profile
Route::get('/change_credit_card', array('before' => 'auth', 'UserController@changeCreaditCard'));
//change profile
Route::get('/change_destination_account', array('before' => 'auth', 'UserController@changeProfile'));


Route::post('/register' , array('as' => 'register', 'uses' => 'UserController@register'));
Route::post('/send_email' , array('as' => 'send_email', 'uses' => 'UserController@send_email'));



Route::get('/forgetPassword', 'UserController@showForgetPassword');
Route::post('/forgetPassword', 'UserController@doForgetPassword');


// Route::post('/checkEmailJson', 'UserController@checkEmailJson');
