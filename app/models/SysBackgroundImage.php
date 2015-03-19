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
     * @modified    Sang PM
     * @modified    2015/03/19
     * 
     * get sys_background_images
     */
    public static function getSysBackgroundImages() {
        return self::select(DB::raw('CONCAT("'.UserStore::getImageUrlEditStore().'", image_url) as image_url2 '))
            ->where('sys_background_images.delete_flg', '=', 0)
            ->orderBy('id', 'desc')
            ->lists('image_url2');
    }
    
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array('sys_background_images.id','sys_background_images.name','sys_background_images.image_url');
    }
    
}
