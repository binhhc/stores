<?php
/**
 * Description of UserItem
 *
 * @author sangpm
 */
class UserItem extends Model{
    protected $table  = 'user_items';


    /**
     * Validate item
     *
     * @return boolean
     * @author Binh Hoang
     * @since 2015.01.29
     */
    public static function validate($input){
        $rules = array(
            'name' => 'required',
            'price' => 'required|numeric|min:100',
            'image_url' => 'required',
        );
        return Validator::make($input, $rules);
    }

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
            ->where('user_items.user_id', '=', $userId)
            ->orderBy('user_items.public_flg', 'asc')
            ->orderBy('user_items.order', 'asc')
            ->orderBy('user_items.updated_at', 'desc')
            ->get();
        return !empty($userItems) ? $userItems : array();
    }
    
    /**
     * Format Money
     *
     * @return      String
     * @author      Sang PM
     * @since       2015/02/05
     */
    public static function formatPrice($price = 0){
        return "VND ".number_format($price, 2, '.', ',');
    }
    
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array('id','user_id','category_id','name','price','image_url','introduce','order');
    }
	
	    public function userItemQuatity(){
        return $this->hasMany('UserItemQuatity', 'item_id');
    }
    
    /**
     * @author      Le Nhan Hau
     * @since       2015/02/05
     * 
     * @param       $userId
     * get user item from user_id
     */
    public static function getUserItemByUserId($userId) {
        /*$userItems = UserItem::with('userItemQuatity')
            ->where('user_items.user_id', '=', $userId)
            ->get();*/
        //Request::get('category_id')
       
        $userItems = UserItem::with('userItemQuatity')
            ->where('user_items.user_id', '=', $userId);
            if (!empty(Request::get('category_id'))){
                $userItems =  $userItems->where('category_id', '=', Request::get('category_id'));
            }
                
           $userItems =  $userItems->paginate(20);

        return !empty($userItems) ? $userItems : array();
    }
    
    /**
     * @author      Le Nhan Hau
     * @since       2015/02/05
     * 
     * @param       $userId
     * get user item from item_id
     */
    public static function getUserItemByItemId($itemId) {
        $userItems = UserItem::with('userItemQuatity')
            ->where('user_items.id', '=', $itemId)
            ->first();
        return !empty($userItems) ? $userItems : array();
    }
}
