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
    public function getDataList(){        
        return Hash::combine($this->getData(), '{n}.MsPrefecture.prefecture_cd','{n}.MsPrefecture.prefecture_cd');
    }
    
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'MsPrefecture.prefecture_cd',
            'MsPrefecture.prefecture_name',
            'MsPrefecture.prefecture_name_kana',
            'MsPrefecture.prefecture_name_en',               
        );
    }
}
