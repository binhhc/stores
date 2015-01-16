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
}