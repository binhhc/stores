<?php

class UserController extends BaseController {

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
    public function index(){
        // $this->layout->content = View::make('user.login');
        //Example -
        // View::make('user.login');
    }

    /**
     * Display login page.
     *
     * @param  null
     * @return Response
     * @author BinhHoang
     */
    public function showLogin(){
        return View::make('user.login');
    }

    /**
     * Display login page.
     *
     * @param  null
     * @return Response
     */
    public function doLogin(){
        echo 1;exit;
    }


    public function showForgetPassword(){
        return View::make('user.forgot_password');
    }




}