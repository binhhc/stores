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
            'domain' => 'required|url|unique:user_stores',
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
            ->select('id', 'user_id', 'domain', 'public_flg', 'settings', 'setting_intros')
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
            'facebook' => 'url',
        	'twitter' => 'url',
        	'homepage' => 'url',

        );

        return Validator::make($input, $rules);
    }

    /*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     *
     * get image url background sample
     */
    public static function getImageUrlEditStore() {
        $imgurlSampleBackground = "img/samples/bg2/";
        return $imgurlSampleBackground;
    }

    /*
     * @author      Le Nhan Hau
     * @since       2015/02/02
     *
     * get user stores domain
     */
    public static function getUserStoreDomain() {
        $userId = Session::get('user.id');
        $userStoresDomain = UserStore::where('user_id', '=', $userId)
            ->select('domain')
            ->first()->toArray();
        return !empty($userStoresDomain) ? $userStoresDomain : array();
    }
}
