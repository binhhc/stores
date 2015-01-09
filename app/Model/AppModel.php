<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
    public $actsAs  = array('Basic');
    public function getFullFields(){
        return array();
    }
    
    
    /**
     * add modified information before udpate.
     *
     *
     * @author          save logical fields.
     * @since           2015/01/09
     * @modified by     
     * @modified date   
     */
    public function updateAll($fields, $conditions = true) {
        $userId = 1;
//        if (class_exists('AuthComponent')) {
//            $userId = AuthComponent::user('staff_cd') ? AuthComponent::user('staff_cd') : 'SYSTEM';
//        }
        $fields['modified_date'] = 'NOW()';
        $fields['modified_by'] = "'{$userId}'";
    
        return parent::updateAll($fields, $conditions);
    }    
    
    /**
     * save logical fields.
     *
     *
     * @author  Sang PM
     * @since   2015/01/09
     */
    public function beforeSave($options = array()) {
        $userId = 1;
//        if (class_exists('AuthComponent')) {
//            $userId = AuthComponent::user('staff_cd') ? AuthComponent::user('staff_cd') : 'SYSTEM';
//        }
    
        $currentTime = $this->getDataSource()->expression('NOW()');
    
        if( $this->exists() ){
            $this->data[$this->alias]['modified'] = $currentTime;
            $this->data[$this->alias]['modified_user'] = $userId;
        } else {
            $this->data[$this->alias]['created'] = $currentTime;
            $this->data[$this->alias]['created_user'] = $userId;
        }
    }
    
}

