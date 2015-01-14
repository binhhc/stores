<?php
/**
 * Description of SysBackgroundImage
 *
 * @author sangpm
 */
class SysBackgroundImage extends Eloquent{
    protected $table  = 'sys_background_images';
	protected $hidden = array('created','created_user','modified','modified_user');
}
