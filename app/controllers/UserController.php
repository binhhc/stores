<?php

class UserController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

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
            $user = User::where('email', '=', $userdata['email'])->first()->toArray();
            Session::put('user', $user);
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
        $facebook = new Facebook(Config::get('facebook'));
        $params = array(
            'redirect_uri' => url('/login/fb/callback'),
            'scope' => 'email',
        );

        return Redirect::to($facebook->getLoginUrl($params));
    }

    /**
     * Facebook callback.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.19
     */
    public function facebookCallback(){
        $code = Input::get('code');
        if (strlen($code) == 0)
            return Redirect::to('/')->with('message', 'Không thể kết nối với Facebook.');

        $facebook = new Facebook(Config::get('facebook'));
        $uid = $facebook->getUser();

        if ($uid == 0)
            return Redirect::to('/')->with('message', 'Lỗi kết nối!');

        $me = $facebook->api('/me');

        $usersns = UserSns::where('sns_id', '=', $uid)->first();

        $user = User::where('email', '=', $me['email'])->first();

        //check email exist in database
        if (empty($user)) {
            $user = new User;
            $user->email = $me['email'];
            $user->account_token = User::createAccountToken();
            $user->save();

            //get last insert id
            $lastInsertId = $user->id;

            $usersns = new UserSns();
            $usersns->user_id = $lastInsertId;
            $usersns->sns_type = '1';
            $usersns->sns_id = $uid;
            $usersns = $user->usersns()->save($usersns);
        }else{ //user exist
            if(empty($usersns)){
                $usersns = new UserSns();
                $usersns->user_id = $user['id'];
                $usersns->sns_type = '1';
                $usersns->sns_id = $uid;
                $usersns->save();
            }
        }

        $usersns->authen_token = $facebook->getAccessToken();

        $usersns->save();

        $user = $usersns->user;
        $session_user = $user->toArray();
        //save to session
        Session::put('user', $session_user);
        Auth::login($user);

        return Redirect::to('/dashboard')->with('message', 'Đăng nhập bằng Facebook');
    }

    /**
     * Display forget password page.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.14
     */
    public function showForgetPassword(){
        $input = Input::all();

        //check email, token
        if(!empty($input) && !empty($input['email']) && !empty($input['token'])){
            $user = User::where('email', '=', $input['email'])
                ->where('account_token', '=', $input['token'])
                ->first();

            if(!empty($user)){
                //reset password
                return View::make('user.reset_password')->with(array('email'=>$input['email'], 'account_token'=>$input['token']));
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
     * @since 2015.01.15
     */
    public function doForgetPassword(){
        $email = Input::get('email');
        $result = 0;
        if(!empty($email)){
            $user = User::where('email', '=', $email)->first();

            if (!empty($user)) {
                $link_reset = URL::to('/').'/forgetPassword?email='.$email.'&token='.$user->account_token;

                $data = array(
                    'link_reset' => $link_reset,
                    'user' => $user->toArray()
                );

                Mail::send('emails.reset_password', $data, function($message) use($email) {
                    $message->to($email, 'STORES.vn')->subject('【STORES.vn】Cấp lại mật khẩu!');
                });

                $result = 1;
            }
        }
        return json_encode($result);
    }

    /**
     * Reset password and account_token.
     *
     * @param  null
     * @return null
     * @author Binh Hoang
     * @since 2015.01.20
     */
    public function resetPassword(){
        $input = Input::all();
        $password = Input::get('password');

        $user = User::where('email', '=', $input['email'])
                    ->where('account_token', '=', $input['account_token'])->first();

        if(empty($user))
            return Redirect::to('/');

        if(empty($password)){
            //Save to session
            Session::put('user', $user->toArray());
            Auth::login($user);
            return Redirect::to('/dashboard');
        }else{
            $new_token   = User::createAccountToken();
            //update new account_token
            User::where('id',$user->id)
                ->update(array('account_token' => $new_token, 'password' => Hash::make($password)));

            $user = User::where('email', '=', $input['email'])->first();
            if(!empty($user)){
                Session::put('user', $user->toArray());
                Auth::login($user);
                return Redirect::to('/dashboard');
            }else{
                 return Redirect::to('/');
            }
        }
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
        $user = Session::get('user');
        return View::make('user.account_setting')->with(array('user' => $user));
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
     * Display change credit card.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.20
     */
    public function changeCreaditCard(){
        return View::make('user.change_credit_card');
    }

    /**
     * Display change destination account.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.20
     */
    public function changeDestinationAccount(){
        return View::make('user.change_destination_account');
    }

    /**
     * Display change mail notification setting.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.20
     */
    public function changeMailNotificationSetting(){
        return View::make('user.change_mail_notification_setting');
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
                $user = new User;
                $user->email = $email;
                $user->password  = Hash::make($password);
                $user->account_token = User::createAccountToken();
                $user_data = array('email' => $email, 'password' => $password);
                if($user->save()) {
                    if (Auth::attempt($user_data)) {
                        $user_data = User::where('email', '=', $email)->first()->toArray();
                        Session::put('user', $user_data);
                        Session::put('first_register', 'hello');
                        $this->send_email();
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
            $active =  "1";
        } else {
        	$active = "2";
        }
        return Redirect::to('/dashboard')->with('active',  $active);

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