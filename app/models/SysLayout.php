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
        return self::select('layout_css as name', 'first', 'other')
            ->where('sys_layouts.delete_flg', '=', 0)
            ->get()->toArray();
    }
  
    /*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     * 
     * @modified    Sang PM
     * @modified    2015/03/19
     * 
     * get sys_layouts
     */
    public static function getSysLayoutsIdByLayout($layout) {
        return DB::table('sys_layouts')
            ->where('sys_layouts.delete_flg', '=', 0)
            ->where('sys_layouts.layout_css', '=', $layout)
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
        return array('id','layout_name','layout_image','layout_css','first','other');
    }
}
