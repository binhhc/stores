<?php
/**
 * Description of UserStore
 *
 * @author sangpm
 */
class UserStore extends Model{
    protected $table  = 'user_stores';

     /**
     * Validate
     *	@author OanhHa
     * @return boolean
     */
    public static function validate_domain($input){
        $rules = array(
            'domain' => 'required|unique:user_stores',
        );

        return Validator::make($input, $rules);
    }


}
