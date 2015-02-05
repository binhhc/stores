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
    		$item_slides = Config::get('constants.item_slide');
    		$item_more = array('href' => '/category', 'url' => 'img/main_page/top_more.png', 'name' => 'Xem them');
    		$item_slides[] =  $item_more;
    		$data['item_slides'] = array_chunk($item_slides, 8);
    		return View::make('main.index', $data);
    	} else {
    		 return Redirect::to('/dashboard');
    	}

    }




}