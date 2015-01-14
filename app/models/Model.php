<?php
/**
 * Description of Model
 *
 * @author sangpm
 */
class Model extends Eloquent{
    protected $table  = '';
	protected $hidden = array('created','created_user','modified','modified_user');
    
    /**
     * @author      Sang PM
     * @since       2015/01/14
     * 
     * @modified  
     * @modified by
     **/
    public static function findAllByUserIds($ids){
        $user_ids = is_array($ids) ? $ids : explode(",", $ids);
        return self::whereIn('user_id',array($user_ids))->get();
    }
    
    /**
     * @author      Sang PM
     * @since       2015/01/14
     * 
     * @modified  
     * @modified by
     **/
    public static function getAllSysData(){
        return self::get();
    }
    
    /**
     * @author      Sang PM
     * @since       2015/01/14
     * 
     * @modified  
     * @modified by
     **/
    public static function getAllMsData(){
        return self::get();
    }
    
}
