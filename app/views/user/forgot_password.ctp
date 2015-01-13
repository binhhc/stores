<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php echo $this->Html->css(array('login', 'bootstrap.min')) ?>
    </head>
    <body class="body-login">
        <div class="sign_up">
            <h1>
                <a href="#">
                    <?php echo $this->Html->image('login/logo_white.png', array('alt' => 'STORES.vn')) ?>
                </a>
            </h1>
            <div class="box">
                <?php echo $this->Form->create('User', array('controller'=>'Users', 'action'=>'forgotPassword')) ?>
                    <dl class="set">
                        <dt>登録したメールアドレスを入力してください</dt>
                        <dd>
                            <?php echo $this->Form->input('email', array('div'=>false, 'label'=>false)) ?>
                        </dd>
                    </dl>
                    <p class="btn_submit" ng-hide="pending">
                        <button type="submit">Send email</button>
                    </p>
                    <p class="btn_wait" ng-show="pending" style="display: none;">送信中</p>
                </form>

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
                            <?php echo $this->Form->input('password', array('div'=>false, 'label'=>false)) ?>
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