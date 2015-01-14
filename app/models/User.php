<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
// use Illuminate\Validation\ValidationServiceProvider;

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

    public $timestamps = false;

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
     * Validate
     *
     * @return boolean
     */
    public static function validate($input){
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|AlphaNum|min:3|max:32'
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
    public static function getAccountToken($str){
        return $str;
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

}
