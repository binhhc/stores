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
     * @author Binh Hoang
     * @since 2014.10.14
     */
    public function showLogin(){
        return View::make('user.login');
    }

    /**
     * Progess login.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2014.10.14
     */
    public function doLogin(){
        $v = User::validate(Input::all());

        if($v->fails()){
            return Redirect::to('/login')->withErrors($v)->withInput(Input::except('password'));
        }

        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        if (Auth::attempt($userdata)) {
            // validation successful!
            Session::put('user', $userdata);
            return Redirect::to('/dashboard');
        } else {
            // validation not successful, send back to form
            return Redirect::to('/login')->withInput(Input::except('password'))->with('message', _('Login fail.'));
        }

    }

    /**
     * Display forget password page.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2014.10.14
     */
    public function showForgetPassword(){
        return View::make('user.forgot_password');
    }

    /**
     * Display setting account.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2014.10.14
     */
    public function accountSetting(){
        return View::make('user.account_setting');
    }


    /**
     * Register user
     * @author OanhHa
     * @since 2015-01-14
     *
     */
    public function register() {

    }




}