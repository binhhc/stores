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
            'order_items.id','order_items.order_id','order_items.item_id',
            'order_items.payment','order_items.quantity');
    }
    
     /**
     * @author      Sang PM
     * @since       2015/03/13
     * 
     * @modified  
     * @modified by
     **/
    public static function insertNewOrderItem($data){
        $mini_feild = preg_replace('/^order_items\./i','',self::getFeilds());
        $data_save  = array_intersect_key($data, array_flip($mini_feild));
        return self::insertGetId($data_save);
    }
    
    /**
     * @author      Sang PM
     * @since       2015/03/16
     * 
     * @modified  
     * @modified by
     **/
    public static function getItemQuantity($item_ids = array()){
        $result = array();
        
        if(!empty($item_ids)){
            $data = self::whereIn('item_id',$item_ids)
                    ->where('payment',1)
                    ->get(self::getFeilds())
                    ->toArray();
            
            foreach($data as $item){
                $result[$item['item_id']] = isset($result[$item['item_id']]) ? $result[$item['item_id']] : 0;
                $result[$item['item_id']] += $item['quantity'];
            }
        }
        
        return $result;
    }
}