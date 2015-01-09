<?php

App::uses('AppModel', 'Model');

class User extends AppModel {
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'User.id',
            'User.email',
            'User.account_token',  
            'User.resign_reason',
            'User.delete_flg',             
        );
    }
}

