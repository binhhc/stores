@include('elements.header')
{{HTML::style('css/account_setting.css')}}

<div class="wrapper account">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l">Thay đổi email</h2>
        <p class="fl_r btn_low"><a href="{{URL::asset('/account_setting')}}">Trở lại</a></p>
    </div>
    {{Form::open(array('url' => 'update_email', 'method' => 'post', 'class'=>'form_submit', 'id'=>'frmUpdateEmail'))}}
        <div class="form_basic">
            <dl class="cols">
                <dt>Nhập email mới</dt>
                <dd>
                    {{Form::text('email', null, array('class' => 'email'))}}
                    <span class="error"></span>
                </dd>
            </dl>
            <div class="border_top">
                <ul class="btn_pair">
                    <li class="btn_low">
                        <a href="{{URL::asset('/account_setting')}}">Trở lại</a>
                    </li>
                    <li class="btn_high">
                        <button type="submit">Thay đổi</button>
                    </li>
                </ul>
            </div>
        </div>
    {{Form::close()}}
    <div style="display: none;" class="finish">
        <p class="center" style="padding:30px; font-size:16px; font-weight:bold; line-height:2em;">
            Chúng tôi gửi cho bạn một email xác nhận đến địa chỉ e-mail mới.<br>
            Hãy hoàn thành quy trình của bạn từ mail.
        </p>
    </div>
</div>

@include('elements.footer')

<script type="text/javascript">
    $(document).ready(function(){
        var submit_flg = true;
        $('#frmUpdateEmail').submit(function(event){
            var txtEmail = $('.email').val();
            if(txtEmail.length == 0){
                $('.error').empty();
                $('.error').append('Vui lòng nhập địa chỉ e-mail của bạn');
                submit_flg = false;
            }
            if(submit_flg){
                var email = $('.email').val();
                if (validateEmail(email)) {
                    $('.finish').show();
                    $('.form_submit').hide();
                }
            }else{
                event.preventDefault();
            }
        });

        $('.email').keyup(function(){
            var txtEmail = $('.email').val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            $('.error').empty();

            if(!filter.test(txtEmail)){
                $('.error').append('Vui lòng nhập địa chỉ e-mail của bạn');
                submit_flg = false;
            }else{
                submit_flg = true;
            }
        });
    });
</script>