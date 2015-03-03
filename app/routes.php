<?php

Route::group(array('domain' => '{account}.stores.dev.srv'), function()
{
    Route::get('/', function($account)
    {
        return App::make('StoreController')->ownerStore($account);

    });

    Route::get('/partials/c/items/index', 'StoreController@index');

    Route::get('/partials/c/items/show', 'StoreController@show');

    Route::get('/partials/c/stores/about', 'StoreController@aboutDetail');

    Route::get('/store/{account}/about_detail', function($account)
    {
        return App::make('StoreController')->about_detail($account);
    });

    Route::get('/store/{account}/categories', function($account)
    {
        return App::make('StoreController')->storeCategories($account);
    });

    Route::get('/store/{account}/about', function($account)
    {
        return App::make('StoreController')->storeAbout($account);
    });

    Route::get('/store/{account}/virtual_store', function($account)
    {
        return App::make('StoreController')->virtual_store($account);
    });

     Route::get('/store/{account}/delivery_methods', function($account)
    {
        return App::make('StoreController')->delivery_methods($account);
    });

     Route::get('/store/{account}/shipping_fee', function($account)
    {
        return App::make('StoreController')->shipping_fee($account);
    });

    Route::get('/store_style', function($account)
    {
        return App::make('StoreController')->store_style($account);
    });

    Route::get('/current_user', function($account)
    {
        return App::make('StoreController')->current_user($account);
    });

    Route::get('/items_pager', function($account)
    {
        return App::make('StoreController')->items_pager($account);
    });

    Route::get('/items/{id}', function($domain, $id)
    {
        return App::make('StoreController')->itemDetail($id);
    });

    Route::get('/profile/{id}', function($id)
    {
        return App::make('StoreController')->profile($id);
    });

    Route::get('/iframe/store/cart_popup', function($id)
    {
        return App::make('StoreController')->cart_popup($id);
    });

    Route::get('/iframe/store/favorite_item_button/{id}', function($id)
    {
        return App::make('StoreController')->favorite_item_button($id);
    });

    Route::get('/partials/c/items/checkout', function($id)
    {
        return App::make('StoreController')->checkout($id);

    });

    Route::get('/payment_maintenance', function($id)
    {
        return App::make('StoreController')->payment_maintenance($id);
    });

    Route::get('/store/{account}/enable_coupon', function($id)
    {
        return App::make('StoreController')->enable_coupon($id);
    });

    Route::get('/store/{account}/payment_methods', function($id)
    {
        return App::make('StoreController')->payment_methods($id);
    });

    Route::get('/iframe/store/follow_about', function($id)
    {
        return App::make('StoreController')->follow_about($id);
    });

    Route::get('/partials/c/shared/receive_method', function($id)
    {
        return App::make('StoreController')->receive_method($id);
    });

    Route::get('/partials/c/shared/checkout_card', function($id)
    {
        return App::make('StoreController')->checkout_card($id);
    });

    Route::get('/partials/c/shared/checkout_shipping', function($id)
    {
        return App::make('StoreController')->checkout_shipping($id);
    });

    Route::get('/partials/c/shared/checkout_other_shipping', function($id)
    {
        return App::make('StoreController')->checkout_other_shipping($id);
    });

    Route::get('/profile_address', function($id)
    {
        return App::make('StoreController')->profile_address($id);
    });

    Route::get('/user_cc', function($id)
    {
        return App::make('StoreController')->user_cc($id);
    });

    Route::get('/partials/c/items/checkout_confirm', function($id)
    {
        return App::make('StoreController')->checkout_confirm($id);
    });
     Route::get('/orders', function($id)
    {
        return App::make('StoreController')->orders($id);
    });

    Route::get('/partials/c/stores/tokushoho', function($id)
    {
        return App::make('StoreController')->tokushoho($id);
    });
});

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
Route::get('/support', 'MainController@support');
Route::get('/referral', 'MainController@referral');
Route::get('/referral/{id}', 'MainController@referral');
Route::post('/invitation', 'MainController@invitation');
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
Route::post('/sortable_item', 'UserItemController@sortable_item');
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
Route::post('/remove_image', array('before' => 'auth', 'uses' => 'UserItemController@remove_image'));

//edit item
Route::get('/edit_item/{id}', array('before' => 'auth', 'uses' => 'UserItemController@get_item'));
Route::post('/edit_item', array('before' => 'auth', 'uses' => 'UserItemController@edit_item'));
// Sort category
Route::post('/sort_category', array('before' => 'auth', 'uses' => 'UserItemController@sort_category'));
Route::post('/upload_image_item', array('before' => 'auth', 'uses' => 'UserItemController@upload_image_item'));
// App::error(function(MethodNotAllowedHttpException $e) {
//     echo 1;exit;
//     Log::warning('MethodNotAllowedHttpException', array('context' => $exception->getMessage()));
//     return View::make('errors.show', array('code' => 'http_error_404'), 404);
// });

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

//register facebook
Route::get('register/fb', array('uses' => 'UserController@registerFacebook'));
Route::get('login/fb/register', array('uses' => 'UserController@facebookRegister'));

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

Route::get('/auth_gmail', array('uses' => 'MainController@auth_gmail'));
Route::post('/send_email_list', 'MainController@send_email_list');
Route::get('/feature', array('uses' => 'TextController@feature'));
Route::get('/support_stores', array('uses' => 'TextController@support_stores'));
Route::get('/price', array('uses' => 'TextController@price'));
Route::get('/interview', array('uses' => 'TextController@interview'));
Route::get('/faq', array('uses' => 'TextController@faq'));
Route::get('/category', array('uses' => 'TextController@category'));
Route::get('/notification', array('uses' => 'TextController@notification'));
Route::get('/contact', array('uses' => 'TextController@contact'));
Route::get('/law', array('uses' => 'TextController@law'));
Route::get('/privacy_policy', array('uses' => 'TextController@privacy_policy'));
Route::get('/terms', array('uses' => 'TextController@terms'));

// Route::post('/checkEmailJson', 'UserController@checkEmailJson');
//Blade::setContentTags('<%', '%>');        // for variables and all things Blade
//Blade::setEscapedContentTags('<%%', '%%>');   // for escaped data
