<?php
/**
 * Description of SysBackgroundColor
 *
 * @author sangpm
 */
App::uses('AppModel', 'Model');
class SysBackgroundColor extends AppModel{
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'SysBackgroundColor.id',
            'SysBackgroundColor.name',
            'SysBackgroundColor.color',                 
        );
    }
    
    /**
    * get List Corlor
    *
    * @author       SangPM 
    * @create date  2015/01/09
    */
    public function getListColor(){
        return Hash::combine($this->getData(),'{n}.SysBackgroundColor.id','{n}.SysBackgroundColor.color');
    }
}
