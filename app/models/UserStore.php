<?php
/**
 * Description of UserStore
 *
 * @author sangpm
 */
class UserStore extends Model{
    protected $table  = 'user_stores';

	/**
     * Validate unique
     * @author          Sang PM
     * @modified date   2015/03/26
     * 
     * @return boolean
     */
    public static function validate_unique_domain($input,$id = 0){
            $rules = [
                'domain_url' => 'required|url',
                'domain'     => 'not_in:www,admin,user,master,db,shop,select|unique:user_stores,domain,'.$id];
            
        return Validator::make($input, $rules);
    }


    /*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     *
     * get user_store by user_id
     */
    public static function getUserStoreByUserId() {
        $userId = Session::get('user.id');
        return DB::table('user_stores')
            ->select('id', 'user_id', 'domain', 'public_flg', 'settings', 'setting_intros')
            ->where('user_stores.user_id', '=', $userId)
            ->orderBy('id', 'desc')
            ->first();
    }
    /**
     * Validate
     *	@author OanhHa
     * @return boolean
     */
    public static function validate_about($input){
        $rules = array(
            'facebook' => 'url',
        	'twitter'  => 'url',
        	'homepage' => 'url',
        );

        return Validator::make($input, $rules);
    }

    /*
     * @author      Le Nhan Hau
     * @since       2015/01/16
     *
     * get image url background sample
     */
    public static function getImageUrlEditStore() {
        return "img/samples/bg2/";
    }

    /*
     * @author      Le Nhan Hau
     * @since       2015/02/02
     *
     * get user stores domain
     */
    public static function getUserStoreDomain() {
        $userId = Session::get('user.id');
        return UserStore::where('user_id', '=', $userId)
            ->select('domain')
            ->first()->toArray();
    }

    /**
     * @author      Sang PM
     * @since       2015/02/05
     *
     * @modified
     * @modified by
     **/
    public static function getFeilds(){
        return array('id','user_id','domain','public_flg','settings',
                     'setting_intros','setting_trade_law','setting_pay_methods',
                     'setting_postage','follow','promotion');
    }

    /*
     * @author      Le Nhan Hau
     * @since       2015/02/04
     *
     * get user stores from domain
     */
    public static function getUserStoreByDomain($parameter) {
        return UserStore::where('domain', '=', $parameter)
            ->select(self::getFeilds())
            ->first();
    }

    /*
     * @author      Sang PM
     * @since       2015/03/05
     *
     * @modified    Sang PM
     * @modified    2015/03/26
     * get user stores from domain
     */
    public static function getNewDomain($domain) {
        $domain  = str_replace('.','',$domain);
        
        $list_dm = self::where('domain', 'LIKE', $domain.'%')->lists('domain');

        if(!in_array($domain, $list_dm))  return  $domain;

        for($i = 1;$i <1000;$i++){
            $new_dm = $domain.$i;
            if(!in_array($new_dm, $list_dm))  return  $new_dm;
        }

        return "";
    }
    
    /*
     * @author      Sang PM
     * @since       2015/03/20
     *
     * get user stores from domain
     */
    public static function registerNew($user_id , $email){
        $data = self::getUserStoreByUserId($user_id);
        if(!empty($data))return $data;
        
        $tmpEmail  = explode('@', $email);
        $userStore          = new UserStore;
        $userStore->domain  = UserStore::getNewDomain($tmpEmail[0]);
        $userStore->user_id = $user_id;
        $userStore->save();
        return $userStore;
    }
}
