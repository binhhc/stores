<?php

class AddonController extends BaseController {
   
    protected $layout = 'layouts.master';
  
    /**
     * View List Addon
     * @author  Sang PM
     * @since   2015-01-15
     */
    public function addon() {       
        $data['addons'] = SysAddon::getAllSysData();        
    	return View::make('addon.addon',$data);
    }
    
    /**
     * Save user Addon
     * @author  Sang PM
     * @since   2015-01-19
     */
    public function saveaddon($id = null,$flg = null){
        $user_id = Session::get('user.id');
        $addon = UserAddon::where('user_id',$user_id)
                ->where('addon_id',$id)->first();
        
        $addon = (empty($addon)) ? new UserAddon : $addon;
        
        $addon->user_id     = $user_id;
        $addon->addon_id    = $id;
        $addon->active_flg  = $flg;

        $addon->save();
        exit();
    }
}