<?php
/**
 * Description of UserStore
 *
 * @author sangpm
 */
class UserStore extends Model{
    protected $table  = 'user_stores';

    /*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     * 
     * get user_store by user_id
     */
    public static function getUserStoreByUserId() {
        //$userId = Session::get('user.id');
        $userId = 1;
        $userStores = DB::table('user_stores')
            ->select('id', 'user_id', 'domain', 'public_flg','settings')
            ->where('user_stores.user_id', '=', $userId)
            ->orderBy('id', 'desc')
            ->first();
        return !empty($userStores) ? $userStores : array();
    }
	
}
