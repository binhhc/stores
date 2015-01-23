@include('elements.header')
{{HTML::style('css/account_setting.css')}}
<div class="wrapper account">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l">Thay đổi mật khẩu</h2>
        <p class="fl_r btn_low"><a href="{{URL::asset('/account_setting')}}">Trở lại</a></p>
    </div>
    {{Form::open(array('url' => 'update_password', 'method' => 'post', 'id'=>'frmUpdatePassword'))}}
        <div class="form_basic">
            <dl class="cols">
                <dt>Mật khẩu mới</dt>
                <dd>
                    {{Form::password('password', array('class'=>'password'))}}
                    <span class="error password"></span>
                </dd>
            </dl>
            <dl class="cols">
                <dt>Xác nhận mật khẩu</dt>
                <dd>
                    {{Form::password('confirm_password', array('class'=>'confirm_password'))}}
                    <span class="error confirm_password"></span>
                </dd>
            </dl>
            <div class="border_top">
                <ul class="border_top btn_pair" ng-hide="pending">
                    <li class="btn_low">
                        <a href="{{URL::asset('/account_setting')}}">Trở lại</a>
                    </li>
                    <li class="btn_high"><button type="submit">Lưu lại</button></li>
                </ul>
                <div class="btn_single btn_low" ng-show="pending" style="display: none;"><button type="submit" class="send"><span>送信中</span></button></div>
            </div>
        </div>
    {{Form::close()}}
</div>

@include('elements.footer')

<script type="text/javascript">
    $(document).ready(function(){
        var submit_flg = true;
        $('#frmUpdatePassword').submit(function(event){
            if(submit_flg == false){
                event.preventDefault();
            }
        });

        $('.password').keyup(function(){
            var password = $('.password').val();
            $('.password').empty();

            if(password.length == 0){
                submit_flg = false;
                $('.password').append('Vui lòng nhập mật khẩu');
            }else if(password.length < 6){
                submit_flg = false;
                $('.password').append('Vui lòng nhập mật khẩu ít nhất 6 kí tự');
            }

        });

        $('.confirm_password').keyup(function(){
            var password = $('.password').val();
            var confirm_password = $('.confirm_password').val();
            $('.confirm_password').empty();

            if(confirm_password != password){
                submit_flg = false;
                $('.confirm_password').append('Mật khẩu không phù hợp');
            }
        });
    });
</script>