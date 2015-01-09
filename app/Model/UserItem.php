<?php
/**
 * Description of UserItem
 *
 * @author sangpm
 */
App::uses('AppModel', 'Model');
class UserItem extends AppModel{
    
    /**
    * Get UserItem by User Id
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getItemByUserId($user_id = 0){      
        $conditions = array('UserItem.user_id' => $user_id);
        return $this->getData($conditions);
    }
    
    /**
    * Get Item By User_Id With Quantity
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getItemByUserIdWithQuantity($user_id = 0){        
        $items = Hash::combine($this->getItemByUserId($user_id),'{n}.UserItem.id','{n}');
        if(!empty($items)){            
            $quantities = ClassRegistry::init('UserItemQuatity')->getItemQuatityGroupByItemId(array_keys($items));
            if(!empty($quantities)){
                foreach($items as $key => $value){
                    $items[$key]['UserItem']['Quantity'] = empty($quantities[$key])? array() : $quantities[$key];
                }
            }
        }
        return empty($items) ? array() : $items;
    }
    
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'UserItem.id',
            'UserItem.user_id',
            'UserItem.category_id',
            'UserItem.name',
            'UserItem.price',
            'UserItem.image_url',
            'UserItem.introduce'
        );
    }
}