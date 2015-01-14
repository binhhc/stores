<?php
/**
 * Description of UserNotification
 *
 * @author sangpm
 */
class UserNotification extends Eloquent{
    protected $table  = 'user_items';
	protected $hidden = array('created','created_user','modified','modified_user');
}
