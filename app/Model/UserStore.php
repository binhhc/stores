<?php
/**
 * Description of UserStore
 *
 * @author sangpm
 */
App::uses('AppModel', 'Model');
class UserStore extends AppModel{
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'UserStore.id',
            'UserStore.user_id',
            'UserStore.domain',
            'UserStore.public_flg',
            'UserStore.settings',           
        );
    }
}
