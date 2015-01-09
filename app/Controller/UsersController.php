<?php
class UsersController extends AppController {

    public $components = array('Social');
    public $helpers = array('Social');
    public $dataInfo = array();

    public function index(){

    }


    public function login() {
        $this->layout = false;

    }

    public function accountSetting(){
        
    }

    public function forgotPassword() {
        $this->layout = false;
    }



    public function social($page = '') {
        //if no provided social network
        if (empty($page)) {
            return $this->redirect('/');
        }

// echo $page;exit;

        $page = trim(strtolower($page));
        $sns_type = SOCIAL_TYPE_UNKNOWN;
        $social_profile = null;

        try {
            switch (true) {
                case ($page == 'facebook'):
                    $social_profile = $this->Social->getProfile('Facebook');
                    $sns_type = SOCIAL_TYPE_FACEBOOK;
                    break;

                case ($page == 'twitter'):
                    $social_profile = $this->Social->getProfile('Twitter');
                    $sns_type = SOCIAL_TYPE_TWITTER;
                    break;

                case ($page == 'google'):
                    $social_profile = $this->Social->getProfile('Google');
                    $social_profile->identifier = preg_replace('/^.*?id\=/', '', $social_profile->identifier);
                    $sns_type = SOCIAL_TYPE_GOOGLE;
                    break;

                case ($page == 'github'):
                    $social_profile = $this->Social->getProfile('GitHub');
                    $sns_type = SOCIAL_TYPE_GITHUB;
                    break;

                case ($page == 'hatena'):
                    $social_profile = $this->Social->getProfile('Hatena');
                    $sns_type = SOCIAL_TYPE_HATENA;
                    break;

                case ($page == 'auth'):
                    $social_profile = $this->Social->auth();
                    break;

                default:
                    $this->Session->setFlash('You have chosen a unsupported social network.', 'Flash/info');
                    return $this->redirect('/');
            }

            $this->Social->logout();
        } catch (Exception $e) {
            $error_message = $e->getMessage();
            $error_code = $e->getCode();
            pr($error_message);
            exit;
            //customize error message
            switch ($error_code) {
                case OPENSOCIAL_ERR_UNKNOWN:
                    $error_message = __('COMMON_ERR_MSG002');
                    break;

                case OPENSOCIAL_ERR_CONFIGURATION:
                    $error_message = __('A00000_ERR_MSG009');
                    break;

                case OPENSOCIAL_ERR_PROVIDER:
                    $error_message = __('A00000_ERR_MSG002', $sns_type);
                    break;

                case OPENSOCIAL_ERR_UNKNOWN_PROVIDER:
                    $error_message = __('A00000_ERR_MSG003');
                    break;

                case OPENSOCIAL_ERR_MISSING_CREDENTIALS:
                    $error_message = __('A00000_ERR_MSG004', $sns_type);
                    break;

                case OPENSOCIAL_ERR_AUTH_FAILED:
                    $error_message = __('A00000_ERR_MSG005', $sns_type);
                    break;

                case OPENSOCIAL_ERR_USER_IGNORED:
                    $error_message = __('A00000_ERR_MSG006');
                    $this->Social->logout();
                    break;

                case OPENSOCIAL_ERR_CONNECTION:
                    $error_message = __('A00000_ERR_MSG007');
                    $this->Social->logout();
                    break;

                default:
                    break;
            }

            //push error message
            $this->Session->setFlash($error_message, 'Flash/error');
            return $this->redirect('/');
        }
        if (!empty($social_profile)) {

            $this->redirect(array(
                'controller' => 'Users',
                'action' => 'info',
                $social_profile->displayName,
                $social_profile->email,
                $page,
                $social_profile->auth_token,
            ));
        }
    }

    function logout() {
        $this->Session->setFlash("logout successes");
        $this->Social->logoutAuth();
        //hide side menu
        // Configure::write('Site.SideInitOpen', false);

        $this->redirect(array(
            'controller' => 'Users',
            'action' => 'login'));
    }


    // page get info
    function info($name = null, $email = null, $type = null, $token = null) {
        $social_friends = array();
        if ($type == "facebook") {
            $FB = $this->Components->load('Social')->getApi($type);
            $FB->setAccessToken($token);
            // get friend using app 
            /*
              $fql = array(
              'method' => 'fql.query',
              'query' => 'SELECT uid,name,username,pic_square_with_logo,profile_url,is_app_user FROM user WHERE is_app_user = 1 AND uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) ORDER BY concat((1-is_app_user), name) LIMIT 0, 10000'
              );
             */
            $fql = array(
                'method' => 'fql.query',
                'query' => 'SELECT uid,name,username,pic_square_with_logo,profile_url,is_app_user FROM user WHERE  uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) LIMIT 0, 10000'
            );
            $social_friends = $FB->api($fql);
        }
        $this->set(array(
            "name" => $name,
            "email" => $email,
            "token" => $token,
            "social_friends" => $social_friends,
            "type" => $type
        ));
    }


}