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
        if(Session::has('user')){
            return Redirect::to('/dashboard');
        }
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
            'email' => trim(Input::get('email')),
            'password' => trim(Input::get('password'))
        );

        if (Auth::attempt($userdata)) {
            // validation successful!
            $user = User::where('email', '=', $userdata['email'])
                    ->where('delete_flg', '=', 0)->first();
            Session::put('user', $user->toArray());
            Session::put('userStoresDomain', UserStore::getUserStoreDomain());
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
        Session::put('userStoresDomain', UserStore::getUserStoreDomain());
        Auth::login($user);

        return Redirect::to('/dashboard')->with('message', 'Đăng nhập bằng Facebook');
    }

    /**
     * Register by facebook.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.16
     */
    public function registerFacebook(){
        $facebook = new Facebook(Config::get('facebook'));
        $params = array(
            'redirect_uri' => url('/login/fb/register'),
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
    public function facebookRegister(){
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

            $usersns->authen_token = $facebook->getAccessToken();

            $usersns->save();

            $user = $usersns->user;
            $session_user = $user->toArray();
            //save to session
            Session::put('user', $session_user);
            Session::put('userStoresDomain', UserStore::getUserStoreDomain());
            Auth::login($user);

            return Redirect::to('/dashboard')->with('message', 'Đăng nhập bằng Facebook');
        }else{ //user exist
            return Redirect::to('/')->with('message', 'Đăng nhập bằng Facebook');
        }
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
        return View::make('user.account_setting')->with(array('user' => $user, 'title_for_layout' => 'Cài đặt tài khoản'));
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

        //check email
        if(!empty($input) && !empty($input['code'])){
            $code = explode('-m1-', $input['code']);

            $old_email = $new_email = '';
            if(!empty($code[0]))
                $old_email = Crypt::decrypt($code[0]);

            if(!empty($code[1]))
                $new_email = Crypt::decrypt($code[1]);

            $user = User::where('email', '=', $old_email)->first();

            if(!empty($old_email) && !empty($new_email) && !empty($user)){
                User::where('id',$user->id)
                    ->update(array('email' => $new_email));

                return View::make('user.update_email_success')->with(array('title_for_layout' => 'Cập nhật mật khẩu'));
            }else{
                return Redirect::to('/');
            }

        }else{
            return View::make('user.update_email')->with(array('title_for_layout' => 'Cập nhật e-mail'));
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
            $encrypt_new_email = Crypt::encrypt($new_email);
            $encrypt_old_email = Crypt::encrypt($user['email']);

            $link_reset = URL::to('/update_email').'?code='. $encrypt_old_email.'-m1-'. $encrypt_new_email;

            $data = array(
                'link_reset' => $link_reset,
            );

            Mail::send('emails.update_email', $data, function($message) use($new_email) {
                $message->to($new_email, 'STORES.vn')->subject('【STORES.vn】 Thay đổi địa chỉ email!');
            });
            return Redirect::to('/account_setting');
        }else{
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
        return View::make('user.update_password')->with(array('title_for_layout' => 'Cập nhật mật khẩu'));
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

        if(!empty($user) && !empty($v) && $v->passes()){
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
        $user = Session::get('user');
        $user_profile = '';
        if(!empty($user)){
            $user_profile = UserProfile::where('user_id', $user['id'])->first();
        }
        return View::make('user.change_profile')->with(array('title_for_layout' => 'Thay đổi hồ sơ', 'user_profile' => $user_profile ));
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
        $input = Input::all();
        $username = Input::get('name');
        $image = Input::file('image_url');

        $v = UserProfile::validate_input($input);
        if($v->passes()){
            $user = Session::get('user');
            $user_profile = UserProfile::where('user_id', $user['id'])->first();

            if(Input::file('image_url')){ // not change image_url
                $folder_name = User::getNameStore();
                $folder_user = public_path() . '/files/'.$folder_name['USER_NAME'];
                if(!is_dir($folder_user)){
                    mkdir($folder_user);
                    chmod($folder_user, 0777);
                }

                $filename = $image->getClientOriginalName();
                $upload = Input::file('image_url')->move($folder_user, $filename);
            }

            if(empty($user_profile)){ //user haven't profile
                $profile = new UserProfile();
                $profile->name = $username;
                $profile->user_id = $user['id'];
                $profile->image_url = $filename;
                $profile->save();
            }else{
                if(isset($filename))
                    $image_url = 'files/'.$folder_name['USER_NAME'].'/'.$filename;
                else
                    $image_url = $user_profile->image_url;

                UserProfile::where('id', $user_profile['id'])
                    ->update(array('name' => $username, 'image_url' => $image_url));
            }
            return Redirect::to('/account_setting');
        }else{
            return Redirect::to('/account_setting')->withErrors($v)->withInput(Input::except('name'));
        }
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
        return View::make('user.change_shipping')->with(array('title_for_layout' => 'Thay đổi giao hàng'));
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
        return View::make('user.change_credit_card')->with(array('title_for_layout' => 'Thay đổi thẻ tín dụng'));
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
        return View::make('user.change_destination_account')->with(array('title_for_layout' => 'Thay đổi tài khoản chuyển đến'));
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
        $user_id = $this->getUserId();
        $info = UserNotification::where('user_id', $user_id)->first();

        $follow = $notice = 0;
        if(!empty($info)){
            $email_noti = decbin($info->mail_notify);
            if($email_noti == 0){
                $follow = 0;
                $notice = 0;
            }elseif($email_noti == 1){
                $email_noti = '01';
                $email_noti = str_split((string)$email_noti);
                $follow = $email_noti[0];
                $notice = $email_noti[1];
            }else{
                $email_noti = str_split((string)$email_noti);
                $follow = $email_noti[0];
                $notice = $email_noti[1];
            }
        }

        return View::make('user.change_mail_notification_setting')->with(array('title_for_layout' => 'Thay đổi thiết lập thông báo email', 'mail_follow' => $follow, 'mail_notice' => $notice));
    }

    /**
     * Ajax save mail notification setting
     *
     * @param  null
     * @return ajaxt
     * @author Binh Hoang
     * @since 2015.01.26
     */
    public function ajax_mail_notification_setting(){
        if(Request::ajax()){
            $follow = Input::get('follow');
            $notice = Input::get('notice');
            $user_id = $this->getUserId();

            $info = UserNotification::where('user_id', $user_id)->first();

            if(empty($info)){
                $user_noti = new UserNotification();
                $user_noti->user_id = $user_id;
                $user_noti->mail_notify = bindec($follow.$notice);

                $user_noti->save();
            }else{
                UserNotification::where('user_id', $user_id)
                    ->update(array('mail_notify' => bindec($follow.$notice)));
            }



            $success =  "1";
            return Response::json($success);
        }
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
        return View::make('user.withdrawal')->with(array('title_for_layout' => 'Xóa tài khoản'));
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
                        //$this->send_email();
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
            $user_info->account_token = User::createAccountToken();
            $user_info->account_active = 1;
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