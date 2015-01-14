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
}
