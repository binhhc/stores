<?php
/**
 * Description of UserSns
 *
 * @author sangpm
 */
class UserSns extends Eloquent{
    protected $table  = 'user_sns';
	protected $hidden = array('created','created_user','modified','modified_user');
}
