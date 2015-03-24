<?php
if ( !function_exists('_') ) {
  function _($string) {
    return $string;
  }
}

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
        if(empty(Session::get('user')) && isset($_SESSION["user_id"])){
            $user_temp = User::getById($_SESSION["user_id"]);
            if(!empty($user_temp))
                $this->regisSession ($user_temp);
        }
        
        $user = Session::get('user');
        return !empty($user) ? true : false;
    }
    
    /**
     * @author      Sang PM
     * @since       2015/03/20
     *
     * @modified
     * @modified by
     **/
    public function regisSession($user = null){
        Auth::login($user);
        $session_user = $user->toArray();
        Session::put('user', $session_user);
        Session::put('userStoresDomain', UserStore::getUserStoreDomain());
        $_SESSION["user_id"] = $user->id;
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
     /**
     *
     * Send email to invitation by Gmail friends
     * @author  Sang PM
     * @since   2015-03-19
     */
    public function getSendMailInfo(){
        return array(
                'name'          => '',
                'domain'        => Config::get('constants.domain'),
                'website_name'  => Config::get('constants.website_name'),
                'contact_email' => Config::get('constants.contact_email'),
            );
    }
    
    /**
     * @author      Sang PM
     * @since       2015/03/20
     *
     * @modified
     * @modified by
     **/
    public function implodeKeyValue($fields = array()){
       return implode('&', array_map(function ($v, $k) { return $k . '=' . $v; }, $fields, array_keys($fields)));
    }
}
