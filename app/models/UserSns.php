<?php
/**
 * Description of UserSns
 *
 * @author sangpm
 */
class UserSns extends Model{
    protected $table  = 'user_sns';

    public function user(){
        return $this->belongsTo('User');
    }
}
