<?php

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class SocialHelper extends Helper {

    /**
     * Get social avatar
     *
     * @param object $user_data
     * @return string
     * @author Mai Nhut Tan
     * @since 2013/09/18
     */
    public  function  getSocialAvatar($user_data = array()){
        $sns_type = SOCIAL_TYPE_UNKNOWN;
        $default = NULL;

        if(!empty($user_data['User']['photo'])){
            $default = USER_AVATAR_DIR . $user_data['User']['photo'];
        }else if(!empty($user_data['photo'])){
            $default = USER_AVATAR_DIR . $user_data['photo'];
        }

        if(!empty($default) && file_exists(IMAGES . $default)){
            return str_replace(DS, '/', $default);
        }else if(!empty($user_data['SnsInfo'])){
            foreach($user_data['SnsInfo'] as $sns_account){
                if(isset($sns_account['SnsInfo'])) $sns_account = $sns_account['SnsInfo'];

                //currently supports facebook and hatena
                if($sns_account['sns_type'] == SOCIAL_TYPE_FACEBOOK){
                    return 'http://graph.facebook.com/'.$sns_account['id_sns'].'/picture?type=square';
                }else if($sns_account['sns_type'] == SOCIAL_TYPE_HATENA){
                    $pre = substr($sns_account['id_sns'], 0, 2);
                    return 'http://www.st-hatena.com/users/'.$pre.'/'.$sns_account['id_sns'].'/profile.gif';
                }
            }
        }

        return 'noimage.jpg';
    }
}
