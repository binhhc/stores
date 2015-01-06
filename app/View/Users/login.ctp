<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->css(array('login', 'bootstrap.min')); ?>
    </head>
    <body class="body-login">
        <div class="sign_up">
            <h1>
                <a href="#">
                    <?php echo $this->Html->image('login/logo_white.png', array('alt' => 'STORES.vn')) ?>
                </a>
            </h1>
            <div class="box">
                <form name="form">
                    <dl class="set">
                        <dt>Email</dt>
                        <dd>
                            <?php echo $this->Form->input('email', array('div' => false, 'label' => false)) ?>
                        </dd>
                        <dt>Password</dt>
                        <dd>
                            <?php echo $this->Form->input('password', array('div' => false, 'label' => false, 'type' => 'password')) ?>
                        </dd>
                    </dl>
                    <p>
                        <!-- <button type="submit">Login</button> -->
                        <?php echo $this->Form->submit('Login', array('class' => 'btn_submit')) ?>
                    </p>

                    <div class="social_login">
                        <p class="btn_facebook"><a href="https://stores.jp/auth/facebook">Facebookログイン</a></p>
                    </div>
                </form>
            </div>
            <ul class="link">
                <li><a href="https://stores.jp/">ストアを開設する場合はこちら</a></li>
                <li><a href="https://stores.jp/forgot_password">パスワードを忘れた場合はこちら</a></li>
            </ul>
        </div>
    </body>
</html>