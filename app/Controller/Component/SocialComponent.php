<?php
App::uses('Component', 'Controller');
App::import('Vendor', 'SocialAuth', array('file' => 'Hybrid' . DS . 'Auth.php'));
App::import('Vendor', 'SocialEndpoint', array('file' => 'Hybrid' . DS . 'Endpoint.php'));

/**
 * Social connect
 *
 * @author Mai Nhut Tan
 * @since 2013.09.06
 */
class SocialComponent extends Component {
    protected static $_settings = null;
    protected static $_instance = null;
    protected static $_adapter = null;
    public $componnents = array('Session');

    /**
     * Initialize component
     *
     * @param Controller $controller
     * @return void
     * @author Mai Nhut Tan
     * @since 2013/09/06
     */
    public function initialize(Controller $controller) {
        parent::initialize($controller);

        //read social network settings
        try{
            Configure::load('social');
            self::$_settings = Configure::read('Social');
        }
        catch(Exception $e){
            // Display the recived error
            throw $e;
        }
    }

    /**
     * Social Login
     *
     * @param string $provider
     * @return mixed
     * @author Mai Nhut Tan
     * @since 2013/09/06
     */
    public function login($provider){
        try{
            // create an instance with the configuration file path as parameter
            self::$_instance = new Hybrid_Auth(self::$_settings);

            // try to authenticate the selected $provider
            self::$_adapter = self::$_instance->authenticate($provider);
        }
        catch(Exception $e){
            // Display the recived error
            throw $e;
        }
    }

     /**
     * Social Login
     *
     * @param string $provider
     * @return mixed
     * @author Nguyen Ngoc Thai
     * @since 2013/09/06
     */
    public function logoutAuth(){
        try{
            // create an instance with the configuration file path as parameter
            self::$_instance = new Hybrid_Auth(self::$_settings);

            // try to authenticate the selected $provider
           self::$_instance->logoutAllProviders();
        }
        catch(Exception $e){
            // Display the recived error
            throw $e;
        }
    }

    /**
     * Get profile
     *
     * @param string $provider
     * @return mixed
     * @author Mai Nhut Tan
     * @since 2013/09/06
     */
    public function getProfile($provider = null){
        if($provider !== null){
            $this->login($provider);
        }

        //initialize helper
        try{
            // grab the user profile
            $user_profile = self::$_adapter->getUserProfile();

            //append token
            $this->appendToken($user_profile);

            //return data
            return $user_profile;
        }
        catch(Exception $e){
            // Display the recived error
            throw $e;
        }
    }

    /**
     * Get API
     *
     * @param string $provider
     * @return mixed
     * @author Mai Nhut Tan
     * @since 2013/09/19
     */
    public function getApi($provider = null){
        if($provider !== null){
            $instance = new Hybrid_Auth(self::$_settings);
            return $instance->getAdapter($provider)->adapter->api;
        }

        return self::$_adapter ? self::$_adapter->api() : null;
    }

    /**
     * Social Login End point
     *
     * @param void
     * @return void
     * @author Mai Nhut Tan
     * @since 2013/09/09
     */
    public function auth(){
        Hybrid_Endpoint::process();
    }

    /**
     * Logout
     *
     * @param void
     * @return void
     * @author Mai Nhut Tan
     * @since 2013/09/18
     */
    public function logout(){
        self::$_adapter->logout();
    }

    /**
     * Social Login
     *
     * @param object $user_profile
     * @param object $adapter
     * @return array
     * @author Mai Nhut Tan
     * @since 2013/09/18
     */
    public function appendToken(&$user_profile){
        $user_profile->auth_token = '';
        $user_profile->auth_token_secret = '';

        $api = self::$_adapter->api();

        if(!is_object($api)) return $user_profile;

        if(method_exists($api, 'getAccessToken')){
            $user_profile->auth_token = $api->getAccessToken();
        }

        if(property_exists($api, 'token')){
            if(property_exists($api->token, 'key')){
                $user_profile->auth_token = $api->token->key;
            }

            if(property_exists($api->token, 'secret')){
                $user_profile->auth_token_secret = $api->token->secret;
            }
        }

        if(property_exists($api, 'access_token')){
            $user_profile->auth_token = $api->access_token;
        }

        return $user_profile;
    }
}
