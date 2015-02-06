<?php
/**
 * Description of UserNotification
 *
 * @author sangpm
 */
class UserNotification extends Model{
    protected $table  = 'user_items';
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array('id','user_id','mail_notify');
    }
}
