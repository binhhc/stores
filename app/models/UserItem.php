<?php
/**
 * Description of UserItem
 *
 * @author sangpm
 */
class UserItem extends Model{
    protected $table  = 'user_items';


    /**
     * Defines a one-to-many relationship.
     * @author Binh Hoang
     */
    public function quantity(){
        return $this->hasMany('userItemQuantity', 'id');
    }


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
            ->leftJoin('user_items_quantities', 'user_items.id', '=', 'user_items_quantities.item_id')
            ->select('user_items.id', 'user_items.name', 'user_items.price', 'user_items.image_url','user_items_quantities.quantity')
            ->where('user_items.user_id', '=', $userId)
            ->where('user_items.public_flg', '=', true)
            ->orderBy('user_items.order', 'asc')
            ->orderBy('user_items.updated_at', 'desc')
            ->groupBy('user_items.id')
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
        return Config::get('constants.item.currency')." ".number_format($price, 2, '.', ',');
    }

    /**
     * @author      Sang PM
     * @since       2015/02/05
     *
     * @modified
     * @modified by
     **/
    public static function getFeilds(){
        return array('user_items.id','user_items.user_id','user_items.category_id','user_items.name',
                    'user_items.price','user_items.image_url','user_items.introduce','user_items.order');
    }

    public function userItemQuantity(){
        return $this->hasMany('UserItemQuantity', 'item_id');
    }

    /**
     * @author      Le Nhan Hau
     * @since       2015/02/05
     *
     * @modifed date    2015/03/04
     *
     * @param       $userId
     * get user item from user_id
     */
    public static function getUserItemByUserId($userId) {
        $userItems = UserItem::with('userItemQuantity')
            ->where('user_items.user_id', '=', $userId)
            ->where('user_items.public_flg', '=', true)
            ->orderBy('user_items.order', 'asc')
            ->orderBy('user_items.updated_at', 'desc');

        if (Request::get('category_id')){
            $userItems =  $userItems->where(DB::raw('CONCAT(",",category_id,",")'), 'like', '%,'.Request::get('category_id').',%');
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
        $userItems = UserItem::with('userItemQuantity')
            ->where('user_items.id', '=', $itemId)
            ->first(self::getFeilds());
        return !empty($userItems) ? $userItems : array();
    }
    /**
     * update order for items
     * @author OanhHa
     * @param unknown_type $userId
     * @param unknown_type $pos
     */
	public static function updatePlusOne($userId,$pos = 0){
       return self::
               where('user_id', '=', $userId)
               ->where('public_flg','>',0)
               ->where('order','>',$pos)
               ->increment('order');
   }
   
    /**
     * @author      Sang PM
     * @since       2015/03/18
     *
     * @modified
     * @modified by
     **/
    public static function getFullItemInfo($id){
        $tmpUserItems = self::getUserItemByItemId($id);
        
        $quantities = $variations = $items_ids = $itemQuantity = array();

        if (!empty($tmpUserItems)) {
            //user_item_quantity
            if (isset($tmpUserItems['userItemQuantity'])) {
                $userItemQuantity   = $tmpUserItems['userItemQuantity'];
                foreach ($userItemQuantity as $key => $value){
                    $items_ids[]    = $value->id;
                }
              
                if(!empty($items_ids)){
                    $quantities     = OrderItem::getItemQuantityPayMent($items_ids);
                }

                foreach ($userItemQuantity as $key => $value) {
                    $variations[!empty($value->size_name) ? $value->size_name : 'df'] = $value->id;
                    
                    $quati = isset($quantities[$value->id]) ? 
                            (max(($value->quantity - $quantities[$value->id]),0)) : $value->quantity;
                    
                    $itemQuantity[]     =  array(
                        'id'            => $value->id,
                        'quantity'      => (int)$quati,
                        'variation'     => !empty($value->size_name) ? $value->size_name : null,
                        'infinite_status' => false
                    );
                }
            }

            //image_url
            $imageUrl = array();
            if (!empty($tmpUserItems->image_url)) {
                $tmpImageUrl = explode(',', $tmpUserItems->image_url);
                foreach ($tmpImageUrl as $k => $v) {
                    $imageUrl[] = array('name' => $v);
                }
            }
            
        return array(
                'digital_contents'  => null,
                'mybook_item'       => false,
                'group_id'          => null,
                'promotion_category'=> null,
                'delivery_method'   => null,
                'mall_option_values'=> array(),
            
                'mall_large_category_id'  => '',
                'mall_medium_category_id' => '',
            
                'id'        => $tmpUserItems->id,
                'name'      => $tmpUserItems->name,
                'title'     => $tmpUserItems->name,
                'price'     => $tmpUserItems->price,
                'description' => $tmpUserItems->introduce,
            
                'images'     => $imageUrl,
                'quantities' => $itemQuantity,
                'quantity'   => $itemQuantity,
                'variations' => $variations,
            
                'sale_flag'  => false,
                'review_count'  => 0,
                'avg_score'     => null,
            );
        }
   }
}
