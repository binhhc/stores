<?php
/**
 * Description of MsPrefecture
 *
 * @author sangpm
 */
class MsPrefecture extends Model{
    protected $table  = 'ms_prefectures';
	protected $hidden = array();
    
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array('prefecture_cd','prefecture_name','prefecture_name_kana');
    }
    
    /**
     * @author      Sang PM
     * @since       2015/03/19
     * 
     * @modified  
     * @modified by
     **/
    public static function getJsonData(){
        return self::orderBy('prefecture_name', 'asc')->lists('prefecture_name');
    }
}
