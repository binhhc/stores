<?php
/**
 * Description of Order
 *
 * @author sangpm
 */
class Order extends Model{
    protected $table  = 'orders';
    
    
    /**
     * @author      Sang PM
     * @since       2015/03/13
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array(
            'orders.id','orders.store_id','orders.first_name',
            'orders.last_name','orders.city','orders.address',
            'orders.phone','orders.email','orders.note',);
    }
    
    /**
     * @author      Sang PM
     * @since       2015/03/13
     * 
     * @modified  
     * @modified by
     **/
    public static function saveOrder(){
        //1 . tao moi Order
        
        //2 .save OrderItem
    }
    
}