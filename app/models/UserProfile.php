<?php
/**
 * Description of UserProfile
 *
 * @author sangpm
 */
class UserProfile extends Eloquent{
    protected $table  = 'user_profiles';
	protected $hidden = array('created','created_user','modified','modified_user');
}
