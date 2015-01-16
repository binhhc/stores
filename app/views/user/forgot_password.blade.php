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
                {{Form::open(array('url' => 'forgetPassword', 'method' => 'post', 'id' => 'forgetPass'))}}
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
                    <h2>The password reset message confirms we have received</h2>
                    <p>
                        The registered e-mail address<br>
                        Password reissue mail we send.
                    </p>
                    <p>
                        Along the contents of the e-mail, thank you for your procedure.
                    </p>
                </div>
            </div>
            <div class="box" style="display: none;">
                <form ng-submit="submit()" ng-hide="accepted" class="ng-pristine ng-valid">
                    <dl class="set">
                        <dt>新しいパスワードを入力してください</dt>
                        <dd>
                            {{Form::password('password')}}
                        </dd>
                    </dl>
                    <p class="btn_submit" ng-hide="pending">
                        <button type="submit">パスワードをリセット</button>
                    </p>
                    <p class="btn_wait" ng-show="pending" style="display: none;">送信中</p>
                </form>
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
                        if (data.result == '1') {
                            alert('1');
                        } else {
                            alert('0');
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

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}



</script>