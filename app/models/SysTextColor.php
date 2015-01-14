<?php
/**
 * Description of SysTextColor
 *
 * @author sangpm
 */
class SysTextColor extends Eloquent{
    protected $table  = 'sys_text_colors';
	protected $hidden = array('created','created_user','modified','modified_user');
}
