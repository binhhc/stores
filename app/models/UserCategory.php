<?php
/**
 * Description of UserCategory
 *
 * @author sangpm
 */
class UserCategory extends Eloquent{
    protected $table  = 'user_categories';
	protected $hidden = array('created','created_user','modified','modified_user');
}
