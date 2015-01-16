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
    	$user= Session::get('user');
    	//if(!empty($user)) {
    		//return Redirect::to('/dashboard');
    	//} else {
    		return View::make('main.index');
    	//}


        // View::make('user.login');
    }




}