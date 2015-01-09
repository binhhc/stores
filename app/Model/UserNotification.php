<?php
/**
 * Description of UserNotification
 *
 * @author sangpm
 */
App::uses('AppModel', 'Model');
class UserNotification extends AppModel{
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'UserNotification.id',
            'UserNotification.user_id',
            'UserNotification.mail_notify',                 
        );
    }
}
