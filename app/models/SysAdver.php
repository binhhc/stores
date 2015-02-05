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
        return self::get(array('name','href','url'))->toArray();
    }
}