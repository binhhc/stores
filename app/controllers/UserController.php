<?php

class UserController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    // protected $layout = 'layouts.master';

    /**
     * Display the specified resource.
     *
     * @param  string $name Tag name
     * @return Response
     */
    public function index(){
        
        // $this->layout->content = View::make('user.login');
        //Example -
        // View::make('user.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $name Tag name
     * @return Response
     */
    public function login(){
    //     $this->layout->content = false;
        // echo 1;exit;
        
        //Example -
        return View::make('user.login');
        // View::make('user.login');
    }



}