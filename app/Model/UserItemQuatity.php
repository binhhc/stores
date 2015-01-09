<?php
/**
 * Description of UserItemQuatity
 *
 * @author sangpm
 */
App::uses('AppModel', 'Model');
class UserItemQuatity extends AppModel{
    
    /**
    * get User Item Quatity by Item_Id
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getItemQuatityByItemId($item_ids = null){       
        $conditions = array('UserItemQuatity.item_id' => $item_ids);
        return $this->getData($conditions);        
    }
    
    /**
    * get User Item Quatity Group by Item_Id
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getItemQuatityGroupByItemId($item_ids = null){
        return Hash::combine($this->getItemQuatityByItemId($item_ids), 
                '{n}.UserItemQuatity.id','{n}.UserItemQuatity','{n}.UserItemQuatity.item_id');
    }
    
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'UserItemQuatity.id',
            'UserItemQuatity.item_id',
            'UserItemQuatity.size_name',
            'UserItemQuatity.quantity',
        );
    }
}
