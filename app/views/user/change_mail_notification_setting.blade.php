@include('elements.header')
{{HTML::style('css/account_setting.css')}}

<div class="wrapper account ng-scope">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l"><font><font>Thiết lập thông báo email</font></font></h2>
        <p class="fl_r btn_low"><a href="{{URL::asset('/account_setting')}}"><font><font>Cài đặt tài khoản</font></font></a></p>
    </div>
    <div class="form_basic border_bottom">
        <dl class="cols">
            <dt><font><font>Tin tức mới từ STORES.vn</font></font></dt>
            <dd id="mail_notice">
                <div id="switch_open" class="switch switch_public_flag">
                    <p class="status_store active">Đồng ý</p>
                    <p class="status_store deactive">Từ chối</p>
                    <p class="grip" style="left: 2px;"></p>
                </div>
            </dd>
        </dl>
        <dl class="cols">
            <dt><font><font>Thông báo chức năng theo dõi</font></font></dt>
            <dd id="mail_follow">
                <div id="switch_status" class="switch">
                    <p class="status active" ref="1">Đồng ý</p>
                    <p class="status deactive" ref="0">Từ chối</p>
                    <p class="grip" style="left: 2px;"></p>
                </div>
            </dd>
        </dl>
    </div>
</div>

@include('elements.footer')

<script type="text/javascript">
    $('#switch_status').click(function(){
        var flag_mail_follow;
        if($('#switch_status .status').hasClass('active')) {
            flag_mail_follow = 0;
            $('#switch_status .status').removeClass('active');
            $('#switch_status .status').addClass('deactive');
            $('#switch_status .status').text('Từ chối');
            $('#switch_status .grip').css({'left':'2px'});
        } else {
            flag_mail_follow = 1;
            $('#switch_status .status').removeClass('deactive');
            $('#switch_status .status').addClass('active');
            $('#switch_status .status').text('Đồng ý');
            $('#switch_status .grip').css({'left':'57px'});
        }
        $.ajax({
            type: "POST",
            url: "{{URL::asset('/ajax_mail_notification_setting')}}",
            data: {
                flag_mail_follow : flag_mail_follow,
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
    }).trigger('click');

    $('#switch_open').click(function(){
        var flag_mail_notice;
        if($('.switch_public_flag .status_store').hasClass('active')) {
            flag_mail_notice = 0;
            $('.switch_public_flag .status_store').removeClass('active');
            $('.switch_public_flag .status_store').addClass('deactive');
            $('.switch_public_flag .status_store').text('Từ chối');
            $('.switch_public_flag .grip').css({'left':'2px'});
        } else {
            flag_mail_notice = 1;
            $('.switch_public_flag .status_store').removeClass('deactive');
            $('.switch_public_flag .status_store').addClass('active');
            $('.switch_public_flag .status_store').text('Đồng ý');
            $('.switch_public_flag .grip').css({'left':'57px'});
        }
        $.ajax({
            type: "POST",
            url: "{{URL::asset('/ajax_mail_notification_setting')}}",
            data: {
                flag_mail_notice : flag_mail_notice,
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
    }).trigger('click');

</script>