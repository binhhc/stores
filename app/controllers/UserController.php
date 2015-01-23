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

        if($v->fails())
            return Redirect::to('/login')->withErrors($v)->withInput(Input::except('password'));

        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        if (Auth::attempt($userdata)) {
            // validation successful!
            $user = User::where('email', '=', $userdata['email'])
                    ->where('delete_flg', '=', 0)->first()->toArray();
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
    public function update_email(){
        $input = Input::all();

        $v = '';
        if(!empty($input['code']))
            $v = User::validate_forget_password($input);

        //check email
        if(!empty($input) && !empty($input['code']) && !empty($v) && !$v->fails()){
            $code = explode('-m1-', $input['code']);

            $old_email = $new_email = '';
            if(!empty($code[0]))
                $old_email = $this->decrypt($code[0], Config::get('constants.ENCRYPTION_KEY'));

            if(!empty($code[1]))
                $new_email = $this->decrypt($code[1], Config::get('constants.ENCRYPTION_KEY'));

            $user = User::where('email', '=', $old_email)->first();

            if(!empty($old_email) && !empty($new_email) && !empty($user)){
                User::where('id',$user->id)
                    ->update(array('email' => $new_email));

                return View::make('user.update_email_success');
            }else{
                return Redirect::to('/');
            }

        }else{
            return View::make('user.update_email');
        }
    }

    /**
     * Change email.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.15
     */
    public function doUpdateEmail(){
        $new_email = Input::get('email');

        if(!empty($new_email)){
            $user = Session::get('user');
            $encrypt_new_email = $this->encrypt($new_email, Config::get('constants.ENCRYPTION_KEY'));
            $encrypt_old_email = $this->encrypt($user['email'], Config::get('constants.ENCRYPTION_KEY'));

            $link_reset = URL::to('/update_email').'?code='. $encrypt_old_email.'-m1-'. $encrypt_new_email;

            $data = array(
                'link_reset' => $link_reset,
            );

            Mail::send('emails.update_email', $data, function($message) use($new_email) {
                $message->to($new_email, 'STORES.vn')->subject('【STORES.vn】 Thay đổi địa chỉ email!');
            });
            return Redirect::to('/account_setting');
        }
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
        return View::make('user.update_password');
    }

    /**
     * Display change password.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.22
     */
    public function doChangePassword(){
        $input = Input::all();
        $user = Session::get('user');
        $v = User::validate_update_password($input);

        if(!empty($user) && !empty($v) && !$v->fails()){
            User::where('id', $user['id'])
                ->update(array('password' => Hash::make($input['password'])));

            return Redirect::to('/account_setting');
        }else{
            return Redirect::to('/account_setting');
        }
    }

    /**
     * Display change profile.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.15
     */
    public function registerProfile(){
        return View::make('user.change_profile');
    }

    /**
     * Display change profile.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.22
     */
    public function doRegisterProfile(){
        // return View::make('user.change_profile');
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
     * Display change mail notification setting.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.20
     */
    public function withdrawal(){
        return View::make('user.withdrawal');
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

            $status = "";
            $mss= '';
            if($v->fails()){
            	foreach ($v->messages()->getMessages() as $field_name => $messages)
    			{
       				 $mss = $messages;// messages are retrieved (publicly)
   				}
   				$status = "Fail validate";
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
                        $status = "success";
                        $mss = 'Success';
                    } else {
                    	$status = 'faila';
                    	$mss = 'Register fail';
                    }

                 } else {
                    	$status = 'faila';
                    	$mss = 'Register fail';
                 }
            // validation successful!
            }
			$response = array(
                            'status' => $status,
                            'msg' => $mss,
                            );
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
            $user = $user_info->toArray();
            Session::put('user', $user);
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