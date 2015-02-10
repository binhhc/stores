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

    /**
     * Validate category
     *
     * @return boolean
     * @author Binh Hoang
     * @since 2015.01.29
     */
    public static function validate($input){
        $rules = array(
            'name' => 'required|unique:user_categories'
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
        return array('id','user_id','name','order');
    }
    
    /**
     * @author      Le Nhan Hau
     * @since       2015/01/14
     * 
     * for main store
     * get user categories by user_id
     */
    public static function getUserCaterogiesByUserId($userId) {
        $userCategories = DB::table('user_categories')
            ->select('id', 'name')
            ->where('user_id', '=', $userId)->get();
        return !empty($userCategories) ? $userCategories : array();
    }
}
