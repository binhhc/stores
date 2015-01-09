<?php
/**
 * Description of UserSns
 *
 * @author sangpm
 */
App::uses('AppModel', 'Model');
class UserSns extends AppModel{
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'UserSns.id',
            'UserSns.user_id',
            'UserSns.sns_type',  
            'UserSns.sns_id',
            'UserSns.authen_token',
            'UserSns.authen_token_secret',              
        );
    }
}
