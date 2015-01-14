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
	        	$created = $modified = strtotime('now');
	        	$user = new User;
	        	$user->email = $email;
        	 	$user->password  = Hash::make($password);
        	 	$user->account_token = $account_token;
        	 	$user->created = $created;
        	 	$user->modified = $modified;
	        	$user_data = array('email' => $email, 'password' => $password);
	        	if($user->save()) {
	        	    if (Auth::attempt($user_data)) {
	        	 		Session::put('user', $user_data);
						Input::flashOnly('register_email', $email);
            			return Redirect::to('/dashboard')->withInput();
	        	 	}

	        	 }
            // validation successful!

	        	$response = array(
	            'status' => 'fail',
	            'msg' => 'Regiter fail',
	        	);
	        }


        	return Response::json( $response );
	    }
    }


    /**
     * send email to register
     */
	    public function send_email() {
	    	 if(Request::ajax()) {
	    	 	if(Mail::send('emails.register', array('key' => 'value'), function($message)
				{
				    $message->to('oanhht53@gmail.com', 'John Smith')->subject('Welcome!');
				})) {
					return Response::json(array('a' => 'ddd'));
				}
	    	 }



	    }




}