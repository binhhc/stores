<?php
/**
 * Description of userItemQuantity
 *
 * @author sangpm
 */
class UserItemQuantity extends Model{
    protected $table  = 'user_items_quantities';

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
        return self::whereIn('item_id',array($item_ids))->get(self::getFeilds());
    }

    /**
     * @author      Sang PM
     * @since       2015/02/05
     *
     * @modified
     * @modified by
     **/
    public static function getFeilds(){
        return array(
            'user_items_quantities.id','user_items_quantities.item_id',
            'user_items_quantities.size_name','user_items_quantities.quantity');
    }
}

