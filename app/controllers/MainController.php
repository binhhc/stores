<?php

class MainController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';
  /**
     * Display the specified resource.
     *
     * @param  string $name Tag name
     * @return Response
     */
    public function main(){
    	if(!$this->checkLogin()) {
    		$data['title_for_layout'] = 'Chào mừng đến với stores.vn';
    		$item_slides = SysAdver::getData();
    		$data['item_slides'] = array_chunk($item_slides, 8);
    		return View::make('main.index', $data);
    	} else {
    		 return Redirect::to('/dashboard');
    	}
    }

    /**
     *
     * Set support for user
     * @author OanhHa
     * @since 2015-02-06
     */
    public function support() {
    	if(!$this->checkLogin()) {
            return Redirect::to('/');
        }
        return View::make('main.support');
    }




}