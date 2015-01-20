<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        {{HTML::script('js/jquery.min.js')}}
        {{HTML::script('js/common.js')}}
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
                {{Form::open(array('url' => 'forgetPassword', 'method' => 'post', 'id' => 'forgetPass', 'class'=>'form_submit'))}}
                    <dl class="set">
                        <dt>Vui lòng điền email bạn đã đăng kí</dt>
                        <dd>
                            {{Form::text('email', null, array('class' => 'email_pass'))}}
                        </dd>
                    </dl>
                    <p class="btn_submit">
                        <button type="submit" class="btn_submit_1">Lấy lại mật khẩu</button>
                    </p>
                    <p class="btn_wait display_none btn_wait_1">Đang gởi</p>
                {{Form::close()}}

                <div class="finish" style="display: none;">
                    <h2>Mật khẩu đã được khởi tạo lại.</h2>
                    <p>
                        Hệ thống đã gửi mật khẩu đến mail mà bạn đã đăng ký.
                    </p>
                    <br>
                    <p>
                        Xin hãy làm theo các bước được viết trong mail.
                    </p>
                </div>
            </div>
        </div>

    </body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#forgetPass').submit(function(event){
            event.preventDefault();
            var email = $('.email_pass').val();
            if (validateEmail(email)) {
                $.ajax({
                    url : "{{URL::asset('/forgetPassword')}}",
                    type: "POST",
                    data: "email="+email,
                    beforeSend: function( xhr ) {
                        $(".btn_submit_1").hide();
                        $(".btn_wait_1").show();
                    },
                    success: function(data, textStatus, jqXHR){
                        if (data == '1') {
                            $('.finish').show();
                            $('.form_submit').hide();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown){
                        $(".btn_submit_1").hide();
                        $(".btn_wait_1").show();
                    }
                });
            } else {
                $(".btn_submit_1").hide();
                $(".btn_wait_1").show();
            }
        });
    });
</script>
