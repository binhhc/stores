<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        {{HTML::style('css/bootstrap.min')}}
        {{HTML::style('css/login')}}
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
                        <dt>Email</dt>
                        <dd>
                            {{Form::text('email', null, array('class' => 'form-control span6'))}}
                            <font style="color:red;">{{ $errors->first('email') }}</font>
                        </dd>
                        <dt>Password</dt>
                        <dd>
                            {{Form::password('password', array('class' => 'form-control span6'))}}
                            <font style="color:red;">{{ $errors->first('password') }}</font>
                        </dd>
                    </dl>

                    <p class="btn_submit inner_s top">
                        <button type="submit" style="padding-top:0px">Login</button>
                         <!-- <?php //echo $this->Form->submit('Login', array('div' => false)) ?> -->
                    </p>

                    <div class="social_login">
                        <p class="btn_facebook">
                            <!-- <a href="https://stores.jp/auth/facebook">Facebookログイン</a> -->

                            ?>
                            {{HTML::link('/social', 'Facebook', array('class' => ''))}}
                        </p>
                    </div>
                {{ Form::close() }}
            </div>
            <ul class="link">
                <li>
                    <a href="#">ストアを開設する場合はこちら</a>
                </li>
                <li>
                    {{HTML::link('/forgetPassword', 'Forget password', array('class' => ''))}}
                </li>
            </ul>
        </div>
    </body>
</html>