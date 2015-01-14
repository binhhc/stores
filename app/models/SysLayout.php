<?php
/**
 * Description of SysLayout
 *
 * @author sangpm
 */
class SysLayout extends Eloquent{
    protected $table  = 'sys_layouts';
	protected $hidden = array('created','created_user','modified','modified_user');
}
