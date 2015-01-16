<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Mmanos\Social\SocialTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait, SocialTrait;

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
