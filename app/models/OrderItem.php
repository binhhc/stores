<?php
/**
 * Description of SysBackgroundColor
 *
 * @author sangpm
 */
class OrderItem extends Model{
    protected $table  = 'order_items';
    
    /**
     * @author      Sang PM
     * @since       2015/03/13
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array(
            'order_items.id','order_items.order_id',
            'order_items.item_quantity_id','order_items.quantity');
    }
}