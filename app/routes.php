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
Route::get('/trade_law', 'StoreController@trade_law');
Route::post('/trade_law', 'StoreController@save_trade_law');
Route::get('/store_setting', 'StoreController@store_setting');
Route::get('/payment_method', 'StoreController@payment_method');
Route::get('/setting_domain', 'StoreController@setting_domain');
Route::get('/store_about', array('before' => 'auth', 'uses' => 'StoreController@store_about'));
Route::post('/store_about', array('before' => 'auth', 'uses' => 'StoreController@save_store_about'));
Route::get('/store_domain', array('before' => 'auth', 'uses' =>'StoreController@store_domain'));
Route::post('/store_domain', array('before' => 'auth', 'uses' =>'StoreController@save_domain'));
Route::post('/ship_setting', array('before' => 'auth', 'uses' =>'StoreController@ship_setting'));
Route::get('/item_management', 'UserItemController@item_management');
Route::get('/dashboard/', 'StoreController@dashboard');
Route::get('/dashboard/{id}', 'StoreController@dashboard');
Route::get('/addon', 'AddonController@addon');
Route::get('/saveaddon/{id}/{flg}', 'AddonController@saveaddon');
Route::get('/sort_item', 'UserItemController@sort_item');
Route::get('/set_status', 'UserItemController@set_status');

Route::get('/list_item_ajax', 'UserItemController@list_item_ajax');
Route::get('/send_email', 'UserController@send_email');
Route::get('/delete_item', 'UserItemController@delete_item');
Route::get('/update_sort/{id}/{order}', 'UserItemController@update_sort');

//edit store
//Route::get('/edit', array('before' => 'auth', 'uses' => 'StoreController@edit'));
//Route::get('/styles', array('before' => 'auth', 'uses' => 'StoreController@styles'));
Route::get('/edit', 'StoreController@edit');
Route::get('/styles', 'StoreController@styles');
Route::get('/items', 'StoreController@items');
Route::get('/categories', 'StoreController@categories');
Route::get('/about', 'StoreController@about');
Route::post('/upload_image', 'StoreController@upload_image');
Route::post('/save', 'StoreController@save');

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

Route::get('/active/{token}' , array('as' => 'active', 'uses' => 'UserController@active'));


Route::get('/forgetPassword', 'UserController@showForgetPassword');
Route::post('/forgetPassword', 'UserController@doForgetPassword');


// Route::post('/checkEmailJson', 'UserController@checkEmailJson');
//Blade::setContentTags('<%', '%>');        // for variables and all things Blade
//Blade::setEscapedContentTags('<%%', '%%>');   // for escaped data
