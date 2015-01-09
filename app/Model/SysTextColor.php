<?php
/**
 * Description of SysBackgroundColor
 *
 * @author sangpm
 */
App::uses('AppModel', 'Model');
class SysTextColor extends AppModel{
    
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'SysTextColor.id',
            'SysTextColor.name',
            'SysTextColor.color',                 
        );
    }
    
    /**
    * get List Corlor
    *
    * @author       SangPM 
    * @create date  2015/01/09
    */
    public function getListColor(){
        return Hash::combine($this->getData(),'{n}.SysTextColor.id','{n}.SysTextColor.color');
    }
}
