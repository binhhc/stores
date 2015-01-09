<?php
/**
 * Description of SysBackgroundColor
 *
 * @author sangpm
 */
App::uses('AppModel', 'Model');
class SysBackgroundImage extends AppModel{
    
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'SysBackgroundImage.id',
            'SysBackgroundImage.name',
            'SysBackgroundImage.image_url',                 
        );
    }
    
    /**
    * get List Corlor
    *
    * @author       SangPM 
    * @create date  2015/01/09
    */
    public function getListImage(){
        return Hash::combine($this->getData(),'{n}.SysBackgroundImage.id','{n}.SysBackgroundImage.image_url');
    }
}
