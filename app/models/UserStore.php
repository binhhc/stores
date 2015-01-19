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


    /*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     *
     * get user_store by user_id
     */
    public static function getUserStoreByUserId() {
        $userId = Session::get('user.id');
        $userStores = DB::table('user_stores')
            ->select('id', 'user_id', 'domain', 'public_flg','settings')
            ->where('user_stores.user_id', '=', $userId)
            ->orderBy('id', 'desc')
            ->first();
        return !empty($userStores) ? $userStores : array();
    }
    /**
     * Validate
     *	@author OanhHa
     * @return boolean
     */
    public static function validate_about($input){
        $rules = array(
            'facebook_url' => 'url',
        	'twitter_url' => 'url',
        	'homepage_url' => 'url',

        );

        return Validator::make($input, $rules);
    }
}
