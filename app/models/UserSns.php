<?php
/**
 * Description of UserSns
 *
 * @author sangpm
 */
class UserSns extends Model{
    protected $table  = 'user_sns';

    public function user(){
        return $this->belongsTo('User');
    }
    
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array('id','user_id','sns_type','sns_id','authen_token');
    }
    
    /**
     * @author      Sang PM
     * @since       2015/03/20
     *
     * @modified
     * @modified by
     **/
    public static function getBySnsId($sns_id = 0){
        return self::where('sns_id', '=', $sns_id)->first();
    }
}
