<?php
/**
 * Description of SysBackgroundColor
 *
 * @author sangpm
 */
class Follow extends Model{
    protected $table  = 'follows';
    
    /**
     * @author      Sang PM
     * @since       2015/03/13
     * 
     * @modified  
     * @modified by
     **/
    public static function getStatus($domain ,$user_id = 0){
        $result = array('follow' => 0);
        
        $data   = self::join('user_stores', 'user_stores.id', '=', 'follows.store_id')
                    ->where('user_stores.domain', '=', $domain)
                    ->get(self::getFeilds())->toArray();
        
        $result['count'] = count($data);
        
        if($result['count']> 0){
            foreach($data as $value){
                if($value['user_id'] == $user_id){
                    $result['follow'] = 1;
                    return $result;
                }
            }
        }
        
        return  $result;
    }
    
    /**
     * @author      Sang PM
     * @since       2015/03/13
     * 
     * @modified  
     * @modified by
     **/
    public static function addFollow($domain ,$user_id = 0){
        $store_id = UserStore::getUserStoreByDomain($domain)->id;
        $data = self::getStatus($domain,$user_id);
        
        if(empty($user_id)||($data['follow'] ==1))
            return 0;
        
        return self::insert(array('store_id' =>$store_id, 'user_id' => $user_id));
    }
    
    /**
     * @author      Sang PM
     * @since       2015/03/13
     * 
     * @modified  
     * @modified by
     **/
    public static function getFeilds(){
        return array('follows.user_id','follows.store_id');
    }
}