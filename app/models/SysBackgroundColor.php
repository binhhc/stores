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
     * @modified    Sang PM
     * @modified    2015/03/19
     * 
     * get system background color
     */
    public static function getSysBackgroundColor() {
        return self::where('sys_background_colors.delete_flg', '=', 0)
            ->orderBy('id', 'desc')
            ->lists('color');
    }

    
    /*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     * 
     * @modified    Sang PM
     * @modified    2015/03/19
     * 
     * get system background color id
     */
    public static function getSysBackgroundColorIdByColorCode($colorCode = null) {
        return DB::table('sys_background_colors')
            ->where('sys_background_colors.color', '=', $colorCode)
            ->where('sys_background_colors.delete_flg', '=', 0)
            ->first();
    }
    
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array('id','name','color');
    }
}
