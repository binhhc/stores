<?php
/**
 * Description of UserCategory
 *
 * @author sangpm
 */
App::uses('AppModel', 'Model');
class UserCategory extends AppModel{
    
    /**
    * Get All Category by User Id
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getAllByUserId($id_user = null){        
        $conditions = array('UserCategory.user_id' => $id_user);
        return Hash::combine($this->getData($conditions),'{n}.UserCategory.id','{n}.UserCategory');
    }
    
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'UserCategory.id',
            'UserCategory.name',                         
        );
    }
}
