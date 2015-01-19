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
                    {{HTML::image('img/login/logo_white.png', 'STORES.vn')}}
                </a>
            </h1>
            <div class="box">
                {{Form::open(array('url' => 'login', 'method' => 'post'))}}
                    <dl class="set">
                        <dt>Địa chỉ email</dt>
                        <dd>
                            {{Form::text('email', null, array('class' => 'input_login'))}}
                            <font class="message_error">{{ $errors->first('email') }}</font>
                        </dd>
                        <dt>Mật khẩu</dt>
                        <dd>
                            {{Form::password('password', array('class' => 'input_login'))}}
                            <font class="message_error">{{ $errors->first('password') }}</font>
                        </dd>
                    </dl>

                    <p class="btn_submit inner_s top">
                        <button type="submit" style="padding-top:0px">Đăng nhập</button>
                    </p>

                    @if($message = Session::get('message'))
                        <div class="message_login">{{ $message }}</div>
                    @endif

                    <div class="social_login">
                        <p class="btn_facebook">
                            <a href="{{url('login/fb')}}">
                                Facebook
                            </a>
                        </p>
                    </div>
                {{ Form::close() }}
            </div>
            <ul class="link">
                <li>
                    <a href="{{URL::asset('/')}}">Quay lại trang chủ</a>
                </li>
                <li>
                    {{HTML::link('/forgetPassword', 'Quên mật khẩu', array('class' => ''))}}
                </li>
            </ul>
        </div>
    </body>
</html>