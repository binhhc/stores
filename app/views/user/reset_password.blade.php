<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        {{HTML::script('js/jquery.min.js')}}
        {{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/login.css')}}
    </head>
    <body class="body-login">
        <div class="sign_up">
            <h1>
                <a href="{{URL::asset('/')}}">
                    {{HTML::image('img/login/logo_white.png', 'STORES.vn')}}
                </a>
            </h1>
            <div class="box">
                {{Form::open(array('url' => 'resetPassword', 'method' => 'post', 'class'=>'form_submit'))}}
                    <dl class="set">
                        {{Form::text('email', $email, array('class'=>'display_none'))}}
                        {{Form::text('account_token', $account_token, array('class'=>'display_none'))}}
                        <dt>Vui lòng nhập mật khẩu mới</dt>
                        <dd>
                            {{Form::password('password')}}
                            <font class="message_error">{{ $errors->first('password') }}</font>
                        </dd>
                    </dl>
                    <p class="btn_submit">
                        <button type="submit" class="btn_submit_1">Đặt lại mật khẩu</button>
                    </p>
                    <p class="btn_wait display_none btn_wait_1">Đang gởi</p>
                {{Form::close()}}
            </div>
        </div>

    </body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('.form_submit').submit(function(event){
            $(".btn_submit_1").hide();
            $(".btn_wait_1").show();
        });
    });
</script>