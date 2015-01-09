<?php
/**
 * Description of MsPrefecture
 *
 * @author sangpm
 */
App::uses('Model', 'Model');
class MsPrefecture extends Model{
    /**
     *@author       Sang PM 
     *@create date  2014/01/09 
     * 
     **/
    public function getAll(){
        $fields = array('prefecture_cd','prefecture_name');
        return $this->find('list',compact('fields'));
    }
}
