<?php
/**
 * Description of MsPrefecture
 *
 * @author sangpm
 */
App::uses('ModelBehavior', 'Model');
class BasicBehavior extends ModelBehavior {
    
    /**
     *  get Data By Conditions
     *  @return array{Obj}
     *
     *  @author:  Sang PM
     *  @date:    2014/08/11
     */  
    public function getData(Model $Model,$conditions = array()){
        $fields = $Model->getFullFields();
        return $Model->find('all',  compact('fields','conditions'));
    }
    
    /**
     *  get Data By Conditions By User_id
     *  @return array{Obj}
     *
     *  @author:  Sang PM
     *  @date:    2014/08/11
     */ 
    public function getDataByUserId(Model $Model , $user_id = null){
        $fields = $Model->getFullFields();
        $conditions = array($Model->name.'.user_id' => $user_id);
        return $Model->find('all',  compact('fields','conditions'));
    }
}