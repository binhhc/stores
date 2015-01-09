<?php
/**
 * Description of UserProfile
 *
 * @author sangpm
 */
App::uses('AppModel', 'Model');
class UserProfile extends AppModel{
    /**
    * Defined list fields
    *
    * @author       SangPM
    * @create date  2015/01/09
    */
    public function getFullFields(){
        return array(
            'UserProfile.id',
            'UserProfile.user_id',
            'UserProfile.name',  
            'UserProfile.image_url',
            'UserProfile.first_name',
            'UserProfile.last_name',
            'UserProfile.prefecture_cd',
            'UserProfile.address',
            'UserProfile.phone',
            'UserProfile.account_bank',
            'UserProfile.account_brand',
            'UserProfile.account_type',
            'UserProfile.account_number',
            'UserProfile.account_holder',           
        );
    }
}
