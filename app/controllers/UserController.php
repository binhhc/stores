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
     * @since 2015.01.14
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
     * @since 2015.01.14
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
            $user = User::where('email', '=', $userdata['email'])->get()->toArray();
            Session::put('user', reset($user));
            return Redirect::to('/dashboard');
        } else {
            // validation not successful, send back to form
            return Redirect::to('/login')->withInput(Input::except('password'))->with('message', _('Email hoặc mật khẩu không đúng.'));
        }

    }

    /**
     * Login facebook.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.16
     */
    public function loginFacebook(){
        $service = Social::service('facebook');
        return Redirect::to((string) $service->getAuthorizationUri());
    }

    /**
     * Login facebook.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.16
     */
    public function doLoginFacebook(){
        echo 1;exit;
    }

    /**
     * Display forget password page.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.10.14
     */
    public function showForgetPassword(){
        $input = Input::all();

        //check email, token
        if(!empty($input) && !empty($input['email']) && !empty($input['token'])){
            $user = User::where('email', '=', $input['email'])
                ->where('account_token', '=', $input['token'])
                ->get()->toArray();

            if(!empty($user)){
                //reset password
                return View::make('user.forgot_password');
                // return View::make('user.reset_password');
            }else{
                return Redirect::to('/');
            }

        }else{
            return View::make('user.forgot_password');
        }
    }

    /**
     * Progress forget password page.
     *
     * @param  null
     * @return $result
     * @author Binh Hoang
     * @since 2015.10.15
     */
    public function doForgetPassword(){
        $email = Input::get('email');
        $result = array('result' => 0);
        if(!empty($email)){
            $user = User::where('email', '=', $email)->get()->toArray();

            if (!empty($user)) {
                Mail::send('emails.demo', $data, function($message){
                    $message->to('jane@example.com', 'Jane Doe')->subject('This is a demo!');
                });

                $link_reset = 'url/forgetPassword?email='.$email.'&token='.$user->account_token;
                //send email
                // if ($send_email) {
                    // reset token

                $result = array('result' => 1);
                // }
            }
        }
        return json_encode($result);
    }

    /**
     * Display setting account.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.14
     */
    public function accountSetting(){
        return View::make('user.account_setting');
    }

    /**
     * Display change email.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.15
     */
    public function changeEmail(){
        return View::make('user.change_email');
    }

    /**
     * Display change password.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.15
     */
    public function changePassword(){
        return View::make('user.change_password');
    }

    /**
     * Display change profile.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.15
     */
    public function changeProfile(){
        return View::make('user.change_profile');
    }

    /**
     * Display change shipping.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.15
     */
    public function changeShipping(){
        return View::make('user.change_shipping');
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
            $password = trim(Input::get('password'));
            $v = User::validate_register(Input::all());

            if($v->fails()){
            	$mss = '';
            	foreach ($v->messages()->getMessages() as $field_name => $messages)
    			{
       				 $mss = $messages;// messages are retrieved (publicly)
   				}
                $response = array(
                'status' => 'fail validate',
                'msg' => $mss,
                );
            } else {
                $created = $modified = strtotime('now');
                $user = new User;
                $user->email = $email;
                $user->password  = Hash::make($password);
                $user->account_token = User::createAccountToken();
                $user_data = array('email' => $email, 'password' => $password);
                if($user->save()) {
                    if (Auth::attempt($user_data)) {
                        $user_data = User::where('email', '=', $email)->get()->toArray();
                        Session::put('user', $user_data[0]);
                        Input::flashOnly('register_email', $email);
                        //return Redirect::to('/dashboard')->withInput();
                        $response = array(
                            'status' => 'success',
                            'msg' => 'Success',
                            );
                    } else {
                        $response = array(
                        'status' => 'faila',
                        'msg' => 'Regiter fail',
                        );
                    }

                 } else {
                    $response = array(
                        'status' => 'fail',
                        'msg' => 'Regiter fail',
                        );
                 }
            // validation successful!
            }
            return Response::json( $response );
        }
    }

    /**
     * send email to register
     */
    public function send_email() {
        $response = array('sucess' => 'fail');
        $user_id = Session::get('user.id');
        $email   = Session::get('user.email');
        $token   = User::createAccountToken();

        User::where('id',$user_id)
                ->update(array('account_token' => $token));

        $data = array(
            'domain' => Config::get('constants.domain'),
            'token'  => $token,
            'contact_email' => Config::get('constants.contact_email'),
        );

        if(Request::ajax()) {
            $status = Mail::send('emails.register', $data, function($message) use($email) {
                $message->to($email, 'Thành viên mới')->subject('Đăng ký Store thành công');
            });
            $response = array('sucess' => $status);
        }
        return Response::json( $response );

    }

     /**
     * Logout
     *
     * @param   null
     * @return  Response
     * @author  SangPM
     * @since   2015.01.19
     */
    public function active($token = null){
        $user_info = User::where('account_token',$token)->first();

        if(User::checkExpiredTime($user_info) == true){
            $user_info->account_token = "";
            $user_info->save();
            echo "Active token thành công";
            exit();
        }
        echo "Token không tồn tại";
        exit();
    }

    /**
     * Logout
     *
     * @param  null
     * @return Response
     * @author Binh Hoang, SangPM
     * @since 2015.01.15
     */
    public function doLogout(){
        // Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }

}