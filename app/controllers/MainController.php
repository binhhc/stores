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
    //     $this->layout->content = false;
        // echo 1;exit;

        //Example -
        return View::make('main.index');
        // View::make('user.login');
    }




}