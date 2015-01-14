<?php
/**
 * Description of UserItem
 *
 * @author sangpm
 */
class UserItem extends Eloquent{
    protected $table  = 'user_items';
	protected $hidden = array('created','created_user','modified','modified_user');
}
