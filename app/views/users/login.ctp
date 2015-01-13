<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->css(array('bootstrap.min', 'login')); ?>
    </head>
    <body class="body-login">
        <div class="sign_up">
            <h1>
                <a href="#">
                    <?php echo $this->Html->image('login/logo_white.png', array('alt' => 'STORES.vn')) ?>
                </a>
            </h1>
            <div class="box">
                <?php echo $this->Form->create('User', array('Controller' => 'Users', 'action' => 'login')) ?>
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

                    <p class="btn_submit inner_s top">
                        <button type="submit" style="padding-top:0px">Login</button>
                         <!-- <?php //echo $this->Form->submit('Login', array('div' => false)) ?> -->
                    </p>

                    <div class="social_login">
                        <p class="btn_facebook">
                            <!-- <a href="https://stores.jp/auth/facebook">Facebookログイン</a> -->
                            <?php
                                $band = 'Facebook';
                                echo $this->Html->link('Facebookログイン', array('controller' => 'Users', 'action' => 'social', $band), array('class' => '', 'escape' => false)
                            );
                            ?>
                        </p>
                    </div>
                <?php echo $this->Form->end() ?>
            </div>
            <ul class="link">
                <li>
                    <a href="#">ストアを開設する場合はこちら</a>
                </li>
                <li>
                    <?php echo $this->Html->link('パスワードを忘れた場合はこちら', array('controller' => 'Users', 'action' => 'forgotPassword')) ?>
                </li>
            </ul>
        </div>
    </body>
</html>