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
Route::post('/store_about', 'StoreController@save_store_about');
Route::get('/store_domain', 'StoreController@store_domain');
Route::post('/store_domain', 'StoreController@save_domain');
Route::get('/item_management', 'UserItemController@item_management');
Route::get('/dashboard/', 'StoreController@dashboard');
Route::get('/dashboard/{id}', 'StoreController@dashboard');
Route::get('/addon', 'AddonController@addon');
Route::get('/sort_item', 'UserItemController@sort_item');
Route::get('/set_status', 'UserItemController@set_status');

Route::get('/list_item_ajax', 'UserItemController@list_item_ajax');
Route::get('/send_email', 'UserController@send_email');
Route::get('/delete_item', 'UserItemController@delete_item');
Route::get('/update_sort/{id}/{order}', 'UserItemController@update_sort');

//edit store
Route::get('/edit', array('before' => 'auth', 'uses' => 'StoreController@edit'));
Route::get('/styles', array('before' => 'auth', 'uses' => 'StoreController@styles'));

//Login
Route::get('/login', 'UserController@showLogin');
Route::post('/login', 'UserController@doLogin');

//login facebook
Route::get('/facebook_login', 'UserController@loginFacebook');
Route::post('/facebook', 'UserController@doLoginFacebook');

//logout
Route::get('/logout', 'UserController@doLogout');

//account setting
Route::get('/account_setting', array('before' => 'auth', 'uses' => 'UserController@accountSetting'));

//change email
Route::get('/change_email', array('before' => 'auth', 'uses' => 'UserController@changeEmail'));
//change password
Route::get('/change_password', array('before' => 'auth', 'uses' => 'UserController@changePassword'));
//change profile
Route::get('/change_profile', array('before' => 'auth', 'uses' => 'UserController@changeProfile'));
//change profile
Route::get('/change_shipping', array('before' => 'auth', 'uses' => 'UserController@changeShipping'));
//change profile
Route::get('/change_credit_card', array('before' => 'auth', 'uses' => 'UserController@changeCreaditCard'));
//change profile
Route::get('/change_destination_account', array('before' => 'auth', 'uses' => 'UserController@changeProfile'));




Route::post('/register' , array('as' => 'register', 'uses' => 'UserController@register'));
Route::post('/send_email' , array('as' => 'send_email', 'uses' => 'UserController@send_email'));

Route::get('/active/{token}' , array('as' => 'active', 'uses' => 'UserController@active'));


Route::get('/forgetPassword', 'UserController@showForgetPassword');
Route::post('/forgetPassword', 'UserController@doForgetPassword');


// Route::post('/checkEmailJson', 'UserController@checkEmailJson');
