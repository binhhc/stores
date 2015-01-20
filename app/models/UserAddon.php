<?php
/**
 * Description of UserAddon
 *
 * @author sangpm
 */
class UserAddon extends Model{
    protected $table  = 'user_addons';
    
    /*
     * @author      Sang PM
     * @since       2015/01/20
     * 
     * get List User Addon
     */
    public static function getAllAddonByUser($ids = null){
        $result = array();
        $data = self::where('user_id',$ids)->where('active_flg',1)->get();
        if(!empty($data)){
            foreach($data as $da){
                $result[] = $da['addon_id'];
            }
        }
        return $result;
    }
}
