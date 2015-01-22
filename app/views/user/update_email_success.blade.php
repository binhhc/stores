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
                {{HTML::image('img/login/logo_white.png', 'STORE.vn')}}
            </h1>
            <div class="box">
                <div class="mail_finish">
                    <h2>Thay đổi địa chỉ e-mail đã hoàn tất.</h2>
                    <p class="btn_submit"><a href="{{URL::asset('/dashboard')}}">Đi đến trang chủ</a></p>
                </div>
            </div>
        </div>
    </body>
</html>