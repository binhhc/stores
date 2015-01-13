<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
                {{Form::open(array('url' => 'forgotPassword', 'method' => 'post'))}}
                    <dl class="set">
                        <dt>Vui lòng điền email bạn đã đăng kí</dt>
                        <dd>
                            {{Form::text('email')}}
                        </dd>
                    </dl>
                    <p class="btn_submit" ng-hide="pending">
                        <button type="submit">Gởi email</button>
                    </p>
                    <p class="btn_wait" ng-show="pending" style="display: none;">送信中</p>
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