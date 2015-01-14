<?php
/**
 * Description of SysBackgroundColor
 *
 * @author sangpm
 */
class SysBackgroundColor extends Eloquent{
    protected $table  = 'sys_background_colors';
	protected $hidden = array('created','created_user','modified','modified_user');
}
