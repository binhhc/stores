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
    
    /*
     * @author      Sang PM
     * @since       2015/02/02
     * 
     * get Language by User
     */
    public static function getLanguage($ids){
        $data = self::where('user_id',$ids)->where('active_flg',1)->where('addon_id',5)->first();
        return empty($data) ? 'vi' : 'en';
    }
    
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array('id','user_id','addon_id','active_flg');
    }
    
    /**
     * @author      Sang PM
     * @since       2015/03/04
     * 
     * @modified  
     * @modified by
     **/
    public static function getLanguegeByDomain($domain){
        $data = self::join('user_stores', 'user_stores.user_id', '=', 'user_addons.user_id')
                ->where('user_stores.domain',$domain)
                ->where('active_flg',1)
                ->where('addon_id',5)->first();
        return empty($data) ? 'vi' : 'en';
    }
}
