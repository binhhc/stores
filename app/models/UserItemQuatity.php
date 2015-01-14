<?php
/**
 * Description of UserItemQuatity
 *
 * @author sangpm
 */
class UserItemQuatity extends Model{
    protected $table  = 'user_item_quatities';
    
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
}

