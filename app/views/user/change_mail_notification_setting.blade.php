@include('elements.header')
{{HTML::style('css/account_setting.css')}}

<div class="wrapper account ng-scope">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l"><font><font>Thiết lập thông báo email</font></font></h2>
        <p class="fl_r btn_low"><a href="{{URL::asset('/account_setting')}}"><font><font>Cài đặt tài khoản</font></font></a></p>
    </div>
    <div class="form_basic border_bottom">
        <dl class="cols">
            <dt>Tin tức mới từ STORES.vn</dt>
            <dd>
                @if(!empty($mail_follow))
                    <div class="switch_open switch">
                        <p class="status active">Đồng ý</p>
                        <p class="grip" style="left: 57px;"></p>
                        <input type="text" style="display:none" class="hidden follow" value="{{$mail_follow}}">
                    </div>
                @else
                    <div class="switch_open switch">
                        <p class="status deactive">Từ chối</p>
                        <p class="grip" style="left: 2px;"></p>
                        <input type="text" style="display:none" class="hidden follow" value="{{$mail_follow}}">
                    </div>
                @endif
            </dd>
        </dl>
        <dl class="cols">
            <dt>Thông báo chức năng theo dõi</dt>
            <dd>
                @if(!empty($mail_notice))
                    <div class="switch_open switch">
                        <p class="status active">Đồng ý</p>
                        <p class="grip" style="left: 57px;"></p>
                        <input type="text" style="display:none" class="hidden notice" value="{{$mail_notice}}">
                    </div>
                @else
                    <div class="switch_open switch">
                        <p class="status deactive">Từ chối</p>
                        <p class="grip" style="left: 2px;"></p>
                        <input type="text" style="display:none" class="hidden notice" value="{{$mail_notice}}">
                    </div>
                @endif
            </dd>
        </dl>
    </div>
</div>

@include('elements.footer')

<script type="text/javascript">

    $(document).ready(function(){
        $('.switch_open').click(function(){
            if($(this).find('.status').hasClass('active')) {
                $(this).find('.status').removeClass('active');
                $(this).find('.status').addClass('deactive');
                $(this).find('.status').text('Từ chối');
                $(this).find('.grip').css({'left':'2px'});
                $(this).find('.hidden').prop('value', 0);
            } else {
                $(this).find('.status').removeClass('deactive');
                $(this).find('.status').addClass('active');
                $(this).find('.status').text('Đồng ý');
                $(this).find('.grip').css({'left':'57px'});
                $(this).find('.hidden').prop('value', 1);
            }
            var follow = $('.follow').val();
            var notice = $('.notice').val();

            $.ajax({
                type: "POST",
                url: "{{URL::asset('/ajax_mail_notification_setting')}}",
                data: {
                    follow : follow,
                    notice : notice
                },
                global: true,
                dataType: 'json',
                success: function(response) {
                    if(response == 1) {
                        return;
                    } else {
                        alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
                        return;
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                },
            });

        });
    });
</script>