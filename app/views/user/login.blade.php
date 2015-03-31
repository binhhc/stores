<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        {{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/login.css')}}
    </head>
    <body class="body-login">
        <div class="sign_up">
            <h1>
                <a href="#">
                    {{HTML::image('img/login/logo_hayamise_login.png', 'STORES.vn')}}
                </a>
            </h1>
            <div class="login_separator">{{HTML::image('img/login/colorful-separator.png', 'STORES.vn')}}</div>
            <div class="box">
                {{Form::open(array('url' => 'login', 'method' => 'post'))}}
                    <input type="password" style="display:none">
                    <dl class="set">
                        <dd>
                            {{Form::text('email', null, array('class' => 'input_login', 'placeholder'=>'Tên đăng nhập', 'autocomplete'=>'off'))}}
                            <font class="message_error">{{ $errors->first('email') }}</font>
                        </dd>
                        <dd>
                            {{Form::password('password', array('class' => 'input_login', 'placeholder'=>'Mật khẩu', 'autocomplete'=>'off'))}}
                            <font class="message_error">{{ $errors->first('password') }}</font>
                        </dd>
                    </dl>
                    <input type="hidden" name="redirect_url" value="<?php echo isset($redirect_url) ? $redirect_url : '' ?>"/>
                     <input type="hidden" name="item_id" value="<?php echo isset($item_id) ? $item_id : '' ?>"/>
					<input type="hidden" name="store_user_id" value="<?php echo isset($store_user_id) ? $store_user_id : '' ?>"/>
                    <p class="btn_submit inner_s top">
                        <button type="submit" style="padding-top:0px">ĐĂNG NHẬP</button>
                    </p>

                    @if($message = Session::get('message'))
                        <div class="message_login">{{ $message }}</div>
                    @endif

                    <div class="social_login_or">
                        <div class="hight_line"></div>
                        <div class="or_text">hoặc</div>
                    </div>
                    
                    <div class="social_login">
                        <p class="btn_facebook">
                        <?php if(isset($store_user_id) && isset($redirect_url)) {?>
                        	 <a href="/login/fb?store_user_id=<?php echo md5($store_user_id)?>&redirect_url=<?php echo $redirect_url?>">
                                ĐĂNG NHẬP FACEBOOK
                            </a>
                        <?php } else { if(isset($item_id) && isset($redirect_url)) {?>
								<a href="/login/fb?item_id=<?php echo $item_id?>&redirect_url=<?php echo $redirect_url?>">
                                ĐĂNG NHẬP FACEBOOK
                            </a>
							<?php } else {?>
                            <a href="{{url('login/fb')}}">
                                ĐĂNG NHẬP FACEBOOK
                            </a>
                        <?php } }?>
                        </p>
                    </div>
                {{ Form::close() }}
                
                <div class="login_link">
                    <div class="login_link_back_home"><a href="{{URL::asset('/')}}">Quay lại trang chủ</a></div>
                    <div class="login_link_forgot_password">{{HTML::link('/forgetPassword', 'Quên mật khẩu?', array('class' => ''))}}</div>
                </div>
            </div>
        </div>
    </body>
</html>