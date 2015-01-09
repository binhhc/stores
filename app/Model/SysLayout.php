<?php
/**
 * Description of SysLayout
 *
 * @author sangpm
 */
App::uses('AppModel', 'Model');
class SysLayout extends AppModel{
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'SysLayout.id',
            'SysLayout.layout_name',
            'SysLayout.layout_image',   
            'SysLayout.layout_css', 
        );
    }
    
    /**
    * get List Corlor
    *
    * @author       SangPM 
    * @create date  2015/01/09
    */
    public function getListLayout(){
        return Hash::combine($this->getData(),'{n}.SysBackgroundImage.id','{n}.SysBackgroundImage');
    }
}
