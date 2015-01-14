<?php
/**
 * Description of UserItemQuatity
 *
 * @author sangpm
 */
class UserItemQuatity extends Eloquent{
    protected $table  = 'user_item_quatities';
	protected $hidden = array('created','created_user','modified','modified_user');
}

