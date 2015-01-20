<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Carbon\Carbon;
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
     * @author Binh Hoang
     * @return string
     */
    public function getReminderEmail(){
        return $this->email;
    }

    public function usersns(){
        return $this->hasMany('UserSns');
    }
    
    /**
     * @author      Sang PM
     * @since       2015/01/19
     *
     * @modified
     * @modified by
     **/
     public static function checkExpiredTime($obj){
        if(!is_object($obj))return false;
        $created = new Carbon($obj->updated_at);
        $now = Carbon::now();
        $difference = ($created->diff($now));       
        if($difference->days > 0) return false;
        if($difference->h > 0) return false;
        return ($difference->i <= 30);
    }

    /**
     * @author      Le Nhan Hau
     * @since       2015/01/19
     * 
     * get name store
     */
    public static function getNameStore() {
        $userInfos = array();
        $userLogin = Session::get('user');
        $email = $userLogin['email'];
        $tmpEmail = explode('@', $email);
        
        $userInfos['USER_NAME'] = $tmpEmail[0];
        return $userInfos;
    }
}
