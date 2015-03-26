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
    public function showLogin($paremeter=null){
        if(Session::has('user')){
            return Redirect::to('/dashboard');
        }

        $store_user_id  = isset($_GET['store_user_id']) ?  $_GET['store_user_id'] : '';
        $redirect_url   = isset($_GET['redirect_url']) ? $_GET['redirect_url'] : '' ;
        $item_id        = isset($_GET['item_id']) ?  $_GET['item_id'] : '';

        $data       = array();
        if(!empty($store_user_id) && !empty($redirect_url)) {
        	$store  = UserStore::whereRaw('md5(user_stores.user_id) = "'.$store_user_id.'"')->first()->toArray();
        	$data   = array(
        		'store_user_id' => $store['user_id'],
        		'redirect_url'  => $redirect_url,
        	);
        }

     	if(!empty($item_id) && !empty($redirect_url)) {
        	$data = array(
        		'item_id'       => $item_id,
        		'redirect_url'  => $redirect_url. '#!/items/' . $item_id,
        	);
        }

        return View::make('user.login', $data);
    }

    /**
     * Progess login.
     *
     * @param  null
     * @return Response
     * @author Sang PM
     * @since 2015/03/20
     */
    public function doLogin(){
        $v = User::validate(Input::all());

        if($v->fails())
            return Redirect::to('/login')->withErrors($v)->withInput(Input::except('password'));

        $userdata = array(
            'email'     => trim(Input::get('email')),
            'password'  => trim(Input::get('password'))
        );

        if (Auth::attempt($userdata)) {
            $user = User::getByEmail($userdata['email']);
            $this->regisSession($user);
            $this->addFollow();
            return Redirect::to('/dashboard');
        }

        return Redirect::to('/login')->withInput(Input::except('password'))
                ->with('message', _('Email hoặc mật khẩu không đúng.'));
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

        $store_user_id  = isset($_GET['store_user_id']) ?  $_GET['store_user_id'] : '';
        $redirect_url   = isset($_GET['redirect_url']) ? $_GET['redirect_url'] : '' ;
        $item_id        = isset($_GET['item_id']) ? $_GET['item_id'] : '' ;

     	if(!empty($store_user_id) && !empty($redirect_url)) {
        	$store          = UserStore::whereRaw('md5(user_stores.user_id) = "'.$store_user_id.'"')->first()->toArray();
        	$store_user_id  =  $store['user_id'];
        }

        $data       = '?'.$this->implodeKeyValue(compact(array('store_user_id','redirect_url','item_id')));

        $facebook   = new Facebook(Config::get('facebook'));
        $params     = array(
            'redirect_uri'  => url('/login/fb/callback'. $data),
            'scope'         => 'email',
        );

        return Redirect::to($facebook->getLoginUrl($params));
    }

    /**
     * Facebook callback.
     *
     * @param  null
     * @return Response
     * @author Sang PM
     * @since 2015/03/20
     */
    public function facebookCallback(){
        $rs  = $this->getFaceData();
        if (isset($rs['message']))
            return Redirect::to('/login')->with('message', $rs['message']);

        $user = User::saveFacebookData($rs);
        $this->regisSession($user);
        $this->addFollow();
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
        $facebook   = new Facebook(Config::get('facebook'));
        $params     = array(
            'redirect_uri'  => url('/login/fb/register'),
            'scope'         => 'email',
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
        $rs  = $this->getFaceData();
        if (isset($rs['message']))
            return Redirect::to('/login')->with('message', $rs['message']);

        $user = User::saveFacebookData($rs);
        $this->regisSession($user);
        $this->addFollow();

        return Redirect::to('/dashboard')->with('message', 'Đăng nhập bằng Facebook');
    }

    /**
     * @author      Sang PM
     * @since       2015/03/20
     *
     * @modified
     * @modified by
     **/
    public function getFaceData(){
        $code   = Input::get('code');
        if (strlen($code) == 0)
            return array('message' => 'Không thể kết nối với Facebook.');

        $facebook = new Facebook(Config::get('facebook'));
        $uid      = $facebook->getUser();

        if ($uid == 0)
            return array('message' => 'Lỗi kết nối!');

        $me = $facebook->api('/me');
        
        if (empty($me['email']))
            return array('message' => 'Facebook không chia sẻ email !');
        
        $authen_token = $facebook->getAccessToken();

        return compact(array('me','uid','authen_token'));
    }

    /**
     * @author      Sang PM
     * @since       2015/03/20
     *
     * @modified
     * @modified by
     **/
    public function addFollow(){
        $user_id        = Session::get('user.id');
        $input          = Input::all();
        $store_user_id  = isset($input['store_user_id']) ?  $input['store_user_id'] : '';
        $redirect_url   = isset($input['redirect_url']) ? $input['redirect_url'] : '' ;
        $item_id        = isset($input['item_id']) ? $input['item_id'] : '' ;

     	if(!empty($store_user_id) && !empty($redirect_url)) {
            $store = UserStore::where('user_id', $store_user_id)->first()->toArray();
            if(intval($store_user_id) !== $user_id)
                Follow::addFollow($store['id'], $user_id);

            echo "<script>window.location = '". $redirect_url . "'</script>";exit;
        }

    	if(!empty($item_id) && !empty($redirect_url)) {
            Favorite::addFavorite($item_id, $user_id);
            $redirect_url .= '#!/items/'. $item_id;

            echo "<script>window.location = '". $redirect_url . "'</script>";exit;
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

            if(!empty($user))  {
             // Check expire account token
		        if(User::checkExpiredTime($user) == true){
	                return View::make('user.reset_password')->with(array('email'=>$input['email'], 'account_token'=>$user->account_token));
		        } else {
		        	return Redirect::to('/dashboard')->with('forgetPassword',  1);
		        }
            } else {
            	return Redirect::to('/dashboard')->with('forgetPassword',  1);

            }


        }
        return View::make('user.forgot_password');
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
        $email      = Input::get('email');
        $result     = 0;

        if(!empty($email)){
            $token   = User::createAccountToken();
        	User::where('email',$email)->update(array('account_token' => $token));

			$user   = User::getByEmail($email);
            if (!empty($user)) {
                $link_reset      = URL::to('/').'/forgetPassword?email='.$email.'&token='.$user->account_token;

                $data = array(
                    'link_reset' => $link_reset,
                    'user'       => $user->toArray()
                );

                Mail::send('emails.reset_password', $data, function($message) use($email) {
                    $message->to($email, Config::get('constants.website_name'))
                            ->subject('【'.Config::get('constants.website_name').'】Cấp lại mật khẩu!');
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
        $input      = Input::all();
        $password   = Input::get('password');

     	$input  = Input::all();
        $v      = User::validate_forget_password($input);

        if( !empty($v) && $v->passes()){
            User::where('email', $input['email'])
                ->update(array('password' => Hash::make($input['password']), 'account_token' => User::createAccountToken()));
           return Redirect::to('/');
        } else {
        	return Redirect::to('/showForgetPassword')->withErrors($v)->withInput(Input::except('password'));
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

            $user = User::getByEmail($old_email);

            if(!empty($old_email) && !empty($new_email) && !empty($user)){
                User::where('id',$user->id)->update(array('email' => $new_email));
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
            $link_reset = URL::to('/update_email').'?code='. Crypt::encrypt($user['email']).'-m1-'. Crypt::encrypt($new_email);

            $data = array(
                'link_reset' => $link_reset,
            );

            Mail::send('emails.update_email', $data, function($message) use($new_email) {
                $message->to($new_email, Config::get('constants.website_name'))
                        ->subject('【'.Config::get('constants.website_name').'】 Thay đổi địa chỉ email!');
            });
        }

        return Redirect::to('/account_setting');
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
		$input  = Input::all();
        $user   = Session::get('user');
        $v      = User::validate_update_password($input);

        if(!empty($user) && !empty($v) && $v->passes()){
            User::where('id', $user['id'])
                ->update(array('password' => Hash::make($input['password'])));
        }

        return Redirect::to('/account_setting');
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
        $user           = Session::get('user');
        $user_profile   = (empty($user)) ? '' : UserProfile::where('user_id', $user['id'])->first();

        return View::make('user.change_profile')->with(array('title_for_layout' => 'Thay đổi hồ sơ', 'user_profile' => $user_profile ));
    }

    /**
     * Display change profile.
     *
     * @param  null
     * @return Response
     * @author Binh Hoang
     * @since 2015.01.22
     *
     * @modified by         Le Nhan Hau
     * @modified date       2015/03/16
     */
    public function doRegisterProfile(){
        $input      = Input::all();
        $username   = Input::get('name');
        $image      = Input::file('image_url');
        $v          = UserProfile::validate_input($input);

        if($v->passes()){
            $user         = Session::get('user');
            $user_profile = UserProfile::where('user_id', $user['id'])->first();

            if (Input::hasFile('image_url')) {
                if(Input::file('image_url')){ // not change image_url
                    $folder_user = public_path() . '/files/'.$this->getUserId();
                    if(!is_dir($folder_user)){
                        mkdir($folder_user);
                        chmod($folder_user, 0777);
                    }

                    //$filename = $image->getClientOriginalName();
                    $extension = Input::file('image_url')->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $upload = Input::file('image_url')->move($folder_user, $filename);
                }
            }

            if(empty($user_profile)){ //user haven't profile
                $profile            = new UserProfile();
                $profile->name      = $username;
                $profile->user_id   = $user['id'];
                $profile->image_url = isset($filename) ? $filename : '';
                $profile->save();
            }else{
                $image_url = (isset($filename)) ? $filename :  $user_profile->image_url;

                UserProfile::where('id', $user_profile['id'])
                    ->update(array('name' => $username, 'image_url' => $image_url));
            }
            return Redirect::to('/account_setting')->withInput()->with('success', 'Cập nhật hồ sơ thành công!');
        }

        return Redirect::to('/account_setting')->withErrors($v)->withInput(Input::except('name'));
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
     * @author Sang PM
     * @since 2015/03/20
     */
    public function changeMailNotificationSetting(){
        $info   = UserNotification::where('user_id', $this->getUserId())->first();
        $notify = (empty($info)) ? 0 : decbin($info->mail_notify);

        $email_noti = str_split((string)(sprintf("%02d",$notify)));
        $follow = $email_noti[0];
        $notice = $email_noti[1];

        return View::make('user.change_mail_notification_setting')
                ->with(array('title_for_layout' => 'Thay đổi thiết lập thông báo email', 'mail_follow' => $follow, 'mail_notice' => $notice));
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
            $follow  = Input::get('follow');
            $notice  = Input::get('notice');
            $user_id = $this->getUserId();
            $info    = UserNotification::where('user_id', $user_id)->first();

            if(empty($info)){
                $user_noti          = new UserNotification;
                $user_noti->user_id = $user_id;
                $user_noti->mail_notify = bindec($follow.$notice);
                $user_noti->save();
            }else{
                UserNotification::where('user_id', $user_id)
                    ->update(array('mail_notify' => bindec($follow.$notice)));
            }

            return Response::json(1);
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
        if(Request::ajax()){
            $email      = trim(Input::get('email'));
            $password   = trim(Input::get('password'));
            $v          = User::validate_register(Input::all());


            $status = 'faila';
            $mss    = 'Có lỗi xảy ra! Vui lòng đăng ký lại.';
            if($v->fails()){
            	foreach ($v->messages()->getMessages() as $field_name => $messages){
                    $mss = $messages;
   				}
   				$status = "Fail validate";
            } else {
                $user            = new User;
                $user->email     = $email;
                $user->password  = Hash::make($password);
                $user->account_token = User::createAccountToken();
                $user_data = array('email' => $email, 'password' => $password);

                $user->save();
                if(Auth::attempt($user_data)) {
                    UserStore::registerNew($user->id, $email);
                    $this->regisSession($user);
                    Session::put('first_register', 'hello');

                    $status = "success";
                    $mss    = 'Success';
                }
            }

            return Response::json( array('status' => $status,'msg' => $mss,) );
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

        User::where('id',$user_id)->update(array('account_token' => $token));

        $data           = $this->getSendMailInfo();
        $data['token']  = $token;

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
     * @author  Sang PM
     * @since   2015/01/19
     */
    public function active($token = null){
        $user_info = User::where('account_token',$token)->first();

        $active = "2";
        if(User::checkExpiredTime($user_info) == true){
            $user_info->account_token  = User::createAccountToken();
            $user_info->account_active = 1;
            $user_info->save();
            $this->regisSession($user_info);
            $active =  "1";
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
        session_destroy();
        return Redirect::to('/');
    }

}