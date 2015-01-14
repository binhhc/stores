<?php
/**
 * Description of UserStore
 *
 * @author sangpm
 */
class UserStore extends Eloquent{
    protected $table  = 'user_stores';
	protected $hidden = array('created','created_user','modified','modified_user');
}
