<?php
/**
 * Description of SysBackgroundColor
 *
 * @author sangpm
 */
class SysAdver extends Model{
    protected $table  = 'sys_advers';
    
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getData(){
        return self::get(self::getFeilds())->toArray();
    }
    
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array('name','href','url');
    }
}