<?php
/**
 * Description of SysBackgroundImage
 *
 * @author sangpm
 */
class SysBackgroundImage extends Model{
    protected $table  = 'sys_background_images';
	public    $imgurl = "/img/sample/";

	/*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     * 
     * get sys_background_images
     */
    public static function getSysBackgroundImages() {
        $sysBackgroundImage = DB::table('sys_background_images')
            ->where('sys_background_images.delete_flg', '=', 0)
            ->orderBy('id', 'desc')
            ->lists('image_url');
        return !empty($sysBackgroundImage) ? $sysBackgroundImage : array();
    }
}
