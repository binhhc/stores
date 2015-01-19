<?php
/**
 * Description of SysBackgroundColor
 *
 * @author sangpm
 */
class SysBackgroundColor extends Model{
    protected $table  = 'sys_background_colors';

    /*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     * 
     * get system background color
     */
    public static function getSysBackgroundColor() {
        $sysBackgroundColor = DB::table('sys_background_colors')
            ->where('sys_background_colors.delete_flg', '=', 0)
            ->orderBy('id', 'desc')
            ->lists('color');
        return !empty($sysBackgroundColor) ? $sysBackgroundColor : array();
    }
	
}
