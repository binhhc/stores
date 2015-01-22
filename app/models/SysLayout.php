<?php
/**
 * Description of SysLayout
 *
 * @author sangpm
 */
class SysLayout extends Model{
    protected $table  = 'sys_layouts';

    /*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     * 
     * get sys_layouts
     */
    public static function getSysLayouts() {
        $sysLayouts = DB::table('sys_layouts')
            ->where('sys_layouts.delete_flg', '=', 0)
            ->lists('layout_css');
        return !empty($sysLayouts) ? $sysLayouts : array();
    }
  
    /*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     * 
     * get sys_layouts
     */
    public static function getSysLayoutsIdByLayout($layout) {
        $sysLayoutsId = DB::table('sys_layouts')
            ->where('sys_layouts.delete_flg', '=', 0)
            ->where('sys_layouts.layout_css', '=', $layout)
            ->first();
        return !empty($sysLayoutsId) ? $sysLayoutsId : array();
    }
	
}
