<?php
/**
 * Description of UserItem
 *
 * @author sangpm
 */
class UserItem extends Model{
    protected $table  = 'user_items';
    
	/**
     * @author      Sang PM
     * @since       2015/01/14
     * 
     * @modified  
     * @modified by
     **/
    public static function getItemSample(){
        $result = array();
        $items = Config::get('constants.item_samples');
        foreach($items as $ite){
            $obj = new UserItem;
            foreach($ite as $key => $value){
                $obj->$key = $value;
            }
            $result[] = $obj;
        }
        return $result; 
    }

    
    /**
     * @author      Le Nhan Hau
     * @since       2015/01/14
     * 
     * get user item from user_id
     */
    public static function getUserItemFromUserId() {
        $userId = Session::get('user.id');
        $userItems = DB::table('user_items')
            ->leftJoin('user_item_quatities', 'user_items.id', '=', 'user_item_quatities.item_id')
            ->select('user_items.id', 'user_items.name', 'user_items.price', 'user_items.image_url','user_item_quatities.quantity')
            ->where('user_items.user_id', '=', $userId)->get();
        return !empty($userItems) ? $userItems : array();
    }
}
