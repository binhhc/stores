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
}
