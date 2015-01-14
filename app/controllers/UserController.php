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


    public function showForgetPassword(){
        return View::make('user.forgot_password');
    }


    /**
     * Register user
     * @author OanhHa
     * @since 2015-01-14
     *
     */
    public function register() {
	    if(Request::ajax())
	    {
	        $input = Input::all();
	    	$email = trim(Input::get('email'));
	    	$account_token = md5($email);
	    	$password = trim(Input::get('password'));
		    $v = User::validate_register(Input::all());

	        if($v->fails()){
	        	$response = array(
	            'status' => 'fail',
	            'msg' => 'Regiter fail',
	        	);
	        } else {
	        	$user_data = array('email' => $email, 'password' => $password);
	        	 //if (Auth::attempt($user_data)) {
	        	 	$created = $modified = strtotime('now');
	        	 	$user = new User;
	        	 	$user->email = $email;
	        	 	$user->password = $password;
	        	 	$user->account_token = $account_token;
	        	 	$user->created = $created;
	        	 	$user->modified = $modified;

	        	 	if($user->save()) {
	        	 		Session::put('user', $user_data);
						//Input::flashOnly('email', $email);
            			return Redirect::to('/dashboard');
	        	 	}

	        	 //}
            // validation successful!

	        	$response = array(
	            'status' => 'fail',
	            'msg' => 'Regiter fail',
	        	);
	        }


        	return Response::json( $response );
	    }


    }




}