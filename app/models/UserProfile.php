<?php
/**
 * Description of UserProfile
 *
 * @author sangpm
 */
class UserProfile extends Model{
    protected $table  = 'user_profiles';


    /**
     * Validate user profile
     *
     * @return boolean
     * @author Binh Hoang
     * @since 2015.01.22
     */
    public static function validate_input($input){
        $rules = array(
            'name' => 'required|alphaNum',
            'image_url' => 'image',
        );

        return Validator::make($input, $rules);
    }
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array(
            'id','user_id','name','image_url','first_name',
            'last_name','prefecture_cd','address','phone',
            'account_bank','account_brand','account_type',
            'account_number','account_holder');
    }
}
