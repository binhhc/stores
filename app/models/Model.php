<?php
/**
 * Description of Model
 *
 * @author sangpm
 */
class Model extends Eloquent{
    protected $table  = '';
    public    $imgurl="";
	protected $hidden = array('created','created_user','modified','modified_user');
    public    $timestamps = true;
    
    /**
     * @author      Sang PM
     * @since       2015/01/15
     * 
     * @modified  
     * @modified by
     **/
    public static function getImageURL($obj){        
        return $obj->imgurl.$obj->image_url;
    }
    
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
        return self::get(self::getFeilds());
    }
    
    /**
     * @author      Sang PM
     * @since       2015/01/14
     * 
     * @modified  
     * @modified by
     **/
    public static function getAllMsData(){
        return self::get(self::getFeilds());
    }
        
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array('*');
    }
    }
