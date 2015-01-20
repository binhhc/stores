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
            ->lists('color');
        return !empty($sysTextColor) ? $sysTextColor : array();
    }
    
    /*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     * 
     * get system text color id
     */
    public static function getSysTextColorIdByColorCode($colorCode = null) {
        $sysTextColorId = DB::table('sys_text_colors')
            ->where('sys_text_colors.color', '=', $colorCode)
            ->where('sys_text_colors.delete_flg', '=', 0)
            ->first();
        return !empty($sysTextColorId) ? $sysTextColorId : array();
    }
	
}
