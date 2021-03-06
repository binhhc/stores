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
     * 
     * @modified by         Le Nhan Hau
     * @modified date       2015/03/16
     */
    protected $dontFlash = ['image_url'];
    public static function validate_input($input){
        $rules = array(
            //'name' => 'required|alphaNum',
            'name' => 'required',
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
    
    /**
     * @modified    Sang PM
     * @modified    2015/03/19
     * 
     * get user_profile by user_id
     */
    public static function getUserProfileByUserId($userId) {
        return UserProfile::where('user_id', '=', $userId)
            ->select('id', 'name', 'image_url')
            ->first();
    }
    
    /**
     * @author      Sang PM
     * @since       2015/03/04
     * 
     * @modified  
     * @modified by
     **/
    public static function getInfoByDomain($domain){
        return self::join('user_stores', 'user_stores.user_id', '=', 'user_profiles.user_id')
                ->where('user_stores.domain',$domain)
                ->first();
    }
}
