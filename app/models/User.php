<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Validate login
     *
     * @return boolean
     * @author Binh Hoang
     * @since 2015.01.13
     */
    public static function validate($input){
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|AlphaNum|min:6|max:30'
        );

        return Validator::make($input, $rules);
    }

    /**
     * Validate forget password
     *
     * @return boolean
     * @author Binh Hoang
     * @since 2015.01.13
     */
    public static function validate_forget_password($input){
        $rules = array(
            'email' => 'required|email',
        );

        return Validator::make($input, $rules);
    }

	/**
     * @author      Oanh Ha
     * @since       2015/01/14
     *
     * @modified
     * @modified by
     **/
    public static function createAccountToken(){
        return md5(time());
    }
 	/**
     * Validate
     *	@author OanhHa
     * @return boolean
     */
    public static function validate_register($input){
        $rules = array(
            'email' => 'required|email|unique:users',
            'password' => 'required|AlphaNum|min:6|max:32'
        );

        return Validator::make($input, $rules);
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail(){
        return $this->email;
    }

    public function usersns(){
        return $this->hasMany('UserSns');
    }

}
