<?php
/**
 * Description of SysBackgroundColor
 *
 * @author sangpm
 */
class Favorite extends Model{
    protected $table  = 'favorites';

    /**
     * @author      Sang PM
     * @since       2015/03/13
     *
     * @modified
     * @modified by
     **/
    public static function getStatus($item_id ,$user_id = 0){
        $result = array('favorite' => 0);

        $data   = self::where('item_id',$item_id)
                        ->where('favorite',1)
                        ->get(self::getFeilds())->toArray();

        $result['count'] = count($data);

        if($result['count']> 0){
            foreach($data as $value){
                if($value['user_id'] == $user_id){
                    $result['favorite'] = 1;
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
    public static function addFavorite($item_id ,$user_id = 0){
        $data = self::where('item_id',$item_id)
                    ->where('user_id',$user_id)->first(self::getFeilds());

        if(!empty($data)){
            $data->favorite = ($data->favorite == 1) ? 0 : 1 ;
            return $data->save();
        }

        return self::insert(array('store_id' =>$item_id, 'user_id' => $user_id, 'favorite'=>1));
    }

    /**
     * @author      Sang PM
     * @since       2015/03/13
     *
     * @modified
     * @modified by
     **/
    public static function getFeilds(){
        return array('favorites.id','favorites.user_id','favorites.favorite');
    }
}