<?php

class BaseController extends Controller {

	function __construct() {
       ini_set("session.cookie_domain", '.' . Config::get('constants.domain'));
       session_set_cookie_params(360000, '/', '.'. Config::get('constants.domain'));
       session_start();

  	}
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }
    /**
     * Check login function
     * @author OanhHa
     * @since 2015/01/16
     */
    public function checkLogin() {
        $user = Session::get('user');
        return !empty($user) ? true : false;
    }
    /**
     * Get id of login user
     * @author OanhHa
     * @since 2015/01/16
     */
    public function getUserId() {
        $user = Session::get('user');
        return !empty($user) ? $user['id'] : false;
    }

    /**
     * Get id of login user
     * @author Sang PM
     * @since 2015/02/02
     */
    public function setLangByAdon(){
        App::setLocale(UserAddon::getLanguage($this->getUserId()));
    }
}
