<?php
/**
 * Description of UserCategory
 *
 * @author sangpm
 */
class UserCategory extends Model{
    protected $table  = 'user_categories';

    /**
     * @author      Le Nhan Hau
     * @since       2015/01/14
     * 
     * get user categories from user_id
     */
    public static function getUserCaterogiesFromUserId() {
        $userCategories = DB::table('user_categories')
            ->select('id', 'name')
            ->where('user_id', '=', Session::get('user.id'))->get();
        return !empty($userCategories) ? $userCategories : array();
    }
	
}
