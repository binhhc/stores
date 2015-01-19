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
Route::model('usersns', 'UserSns');

Route::get('/', 'MainController@main');
Route::get('/commercial_law', array('before' => 'auth', 'uses' => 'StoreController@commercial_law'));
Route::get('/store_setting', array('before' => 'auth', 'uses' => 'StoreController@store_setting'));
Route::get('/payment_method', array('before' => 'auth', 'uses' => 'StoreController@payment_method'));
Route::get('/setting_domain', array('before' => 'auth', 'uses' => 'StoreController@setting_domain'));
Route::get('/store_about', array('before' => 'auth', 'uses' => 'StoreController@store_about'));
Route::get('/store_url', array('before' => 'auth', 'uses' => 'StoreController@store_url'));
Route::get('/item_management', array('before' => 'auth', 'uses' => 'UserItemController@item_management'));
Route::get('/dashboard/', array('before' => 'auth', 'uses' => 'StoreController@dashboard'));
Route::get('/dashboard/{id}', array('before' => 'auth', 'uses' => 'StoreController@dashboard'));
Route::get('/addon', array('before' => 'auth', 'uses' => 'AddonController@addon'));
Route::get('/sort_item', array('before' => 'auth', 'uses' => 'UserItemController@sort_item'));
Route::get('/set_status', array('before' => 'auth', 'uses' => 'UserItemController@set_status'));

Route::get('/list_item_ajax', array('before' => 'auth', 'uses' => 'UserItemController@list_item_ajax'));
Route::get('/send_email', array('before' => 'auth', 'uses' => 'UserController@send_email'));
Route::get('/update_sort/{$id}/{$order}', array('before' => 'auth', 'uses' => 'UserItemController@update_sort'));

//edit store
Route::get('/edit', array('before' => 'auth', 'uses' => 'StoreController@edit'));
Route::get('/styles', array('before' => 'auth', 'uses' => 'StoreController@styles'));

//Login
Route::get('/login', array('uses' => 'UserController@showLogin'));
Route::post('/login', array('uses' => 'UserController@doLogin'));

/*login facebook */
Route::get('login/fb', array('uses' => 'UserController@loginFacebook'));
Route::get('login/fb/callback', array('uses' => 'UserController@facebookCallback'));
/* end login facebook */

//logout
Route::get('/logout', array('uses' => 'UserController@doLogout'));

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



Route::get('/forgetPassword', 'UserController@showForgetPassword');
Route::post('/forgetPassword', 'UserController@doForgetPassword');


// Route::post('/checkEmailJson', 'UserController@checkEmailJson');
