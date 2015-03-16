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
            'orders.last_name','orders.prefecture','orders.address',
            'orders.tel','orders.email','orders.note',);
    }
    
    /**
     * @author      Sang PM
     * @since       2015/03/13
     * 
     * @modified  
     * @modified by
     **/
    public static function saveOrder($data){
        DB::transaction(function($data) use ($data){   
            $customer = $data['customer'];
            $order_id = self::insertNewOrder($customer);

            if(!empty($data['items']))
                foreach($data['items'] as $item){
                    $item['order_id'] = $order_id;
                    OrderItem::insertNewOrderItem($item);
                }
        });
        return 1;
    }
    
     /**
     * @author      Sang PM
     * @since       2015/03/13
     * 
     * @modified  
     * @modified by
     **/
    public static function insertNewOrder($data){
        $mini_feild = preg_replace('/^orders\./i','',self::getFeilds());
        $data_save  = array_intersect_key($data, array_flip($mini_feild));
        return self::insertGetId($data_save);
    }
}