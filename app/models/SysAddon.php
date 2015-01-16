<?php
/**
 * Description of SysAddon
 *
 * @author sangpm
 */
class SysAddon extends Model{
    protected $table  = 'sys_addons';
    public    $imgurl = "/img/addon/";
    /**
     * @author      Sang PM
     * @since       2015/01/15
     * 
     * @modified  
     * @modified by
     **/
    public static function getAllSysData(){
        return self::where('active_flg', '=', 1)->get();
    }
}
