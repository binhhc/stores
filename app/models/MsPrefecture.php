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
    
    public static function getJsonData(){
        $result = array();
        $data   =  self::get(self::getFeilds())->toArray();
        
        if(!empty($data))
            foreach($data as $pre)
                $result[] = $pre['prefecture_name'];
        
        return $result;
    }
}
