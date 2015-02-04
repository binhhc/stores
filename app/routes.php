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
Route::post('/sort_item', 'UserItemController@sort_item');
Route::post('/set_status', 'UserItemController@set_status');
Route::post('/set_store_follow', array('before' => 'auth', 'uses' => 'StoreController@set_store_follow'));
Route::post('/set_public_flag', array('before' => 'auth', 'uses' => 'StoreController@set_public_flag'));
Route::post('/set_promotion', array('before' => 'auth', 'uses' => 'StoreController@set_promotion'));
Route::post('/delete_store_about', array('before' => 'auth', 'uses' => 'StoreController@delete_store_about'));
Route::post('/delete_trade_law', array('before' => 'auth', 'uses' => 'StoreController@delete_trade_law'));

Route::get('/list_item_ajax', 'UserItemController@list_item_ajax');
Route::get('/send_email', 'UserController@send_email');
Route::post('/delete_item', 'UserItemController@delete_item');
Route::get('/update_sort/{id}/{order}', 'UserItemController@update_sort');

//add new item
Route::get('/add_item', array('before' => 'auth', 'uses' => 'UserItemController@show_add_item'));
Route::post('/add_item', array('before' => 'auth', 'uses' => 'UserItemController@add_item'));
//edit item
Route::get('/edit_item/{id}', array('before' => 'auth', 'uses' => 'UserItemController@get_item'));
Route::post('/edit_item', array('before' => 'auth', 'uses' => 'UserItemController@edit_item'));

//add new category
Route::post('/create_category', array('before' => 'auth', 'uses' => 'UserItemController@create_category'));
//delete category
Route::post('/delete_category', array('before' => 'auth', 'uses' => 'UserItemController@delete_category'));


//edit store
Route::get('/edit', array('before' => 'auth', 'uses' => 'StoreController@edit'));
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
Route::get('/update_email', array('uses' => 'UserController@update_email'));
Route::post('/update_email', array('before' => 'auth', 'uses' => 'UserController@doUpdateEmail'));

//change password
Route::get('/update_password', array('before' => 'auth', 'uses' => 'UserController@changePassword'));
Route::post('/update_password', array('before' => 'auth', 'uses' => 'UserController@doChangePassword'));

//change profile
Route::get('/change_profile', array('before' => 'auth', 'uses' => 'UserController@registerProfile'));
Route::post('/change_profile', array('before' => 'auth', 'uses' => 'UserController@doRegisterProfile'));

//change shipping
Route::get('/change_shipping', array('before' => 'auth', 'uses' => 'UserController@changeShipping'));
//change credit card
Route::get('/change_credit_card', array('before' => 'auth', 'uses' => 'UserController@changeCreaditCard'));
//change destination account
Route::get('/change_destination_account', array('before' => 'auth', 'uses' => 'UserController@changeDestinationAccount'));
//change Mail notification settings
Route::get('/change_mail_notification_setting', array('before' => 'auth', 'uses' => 'UserController@changeMailNotificationSetting'));
Route::post('/ajax_mail_notification_setting', array('before' => 'auth', 'uses' => 'UserController@ajax_mail_notification_setting'));

//Withdrawal
Route::get('/withdrawal', array('before' => 'auth', 'uses' => 'UserController@withdrawal'));



Route::post('/register' , array('as' => 'register', 'uses' => 'UserController@register'));
Route::post('/send_email' , array('as' => 'send_email', 'uses' => 'UserController@send_email'));

Route::get('/active/{token}' , array('as' => 'active', 'uses' => 'UserController@active'));


Route::get('/forgetPassword', 'UserController@showForgetPassword');
Route::post('/forgetPassword', 'UserController@doForgetPassword');

//Reset password
Route::post('/resetPassword', 'UserController@resetPassword');




// Route::post('/checkEmailJson', 'UserController@checkEmailJson');
//Blade::setContentTags('<%', '%>');        // for variables and all things Blade
//Blade::setEscapedContentTags('<%%', '%%>');   // for escaped data
