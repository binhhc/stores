<?php
/**
 * Description of SysTextColor
 *
 * @author sangpm
 */
class SysTextColor extends Model{
    protected $table  = 'sys_text_colors';

    /*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     * 
     * get system text color by
     */
    public static function getSysTextColor() {
        $sysTextColor = DB::table('sys_text_colors')
            ->where('sys_text_colors.delete_flg', '=', 0)
            ->orderBy('id', 'desc')
            ->lists('color');
        return !empty($sysTextColor) ? $sysTextColor : array();
    }
	
}
