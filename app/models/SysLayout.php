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
            ->select('layout_css', 'first', 'other')
            ->where('sys_layouts.delete_flg', '=', 0)
            ->get();
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
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array('id','layout_name','layout_image','layout_css','first','other');
    }
}
