<?php
/**
 * Description of UserItemQuantity
 *
 * @author sangpm
 */
class UserItemQuantity extends Model{
    protected $table  = 'user_item_quantities';

    /**
     * Defines an inverse one-to-many relationship.
     * @author Binh Hoang
     */
    public function item(){
        return $this->belongsTo('UserItem', 'item_id');
    }

	/**
     * @author      Sang PM
     * @since       2015/01/14
     * 
     * @modified  
     * @modified by
     **/
    public static function findAllByItemIds($ids){
        $item_ids = is_array($ids) ? $ids : explode(",", $ids);
        return self::whereIn('item_id',array($item_ids))->get();
    }
        
    /**
     * @author      Sang PM
     * @since       2015/02/05
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array('id','item_id','size_name','quantity');
    }
}

