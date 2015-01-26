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
                    <?php if(isset($user_store['public_flg']) && $user_store['public_flg'] == 1) {?>
                        <p class="status_store active" >Reception</p>
                        <p class="grip" style="left: 57px;"></p>
                    <?php } else {?>
                        <p class="status_store deactive">Release</p>
                        <p class="grip" style="left: 2px;"></p>
                    <?php }?>
                </div>
            </dd>
        </dl>
        <dl class="cols">
            <dt><font><font>Thông báo chức năng theo dõi</font></font></dt>
            <dd id="mail_follow">
                <div id="switch_status" class="switch">
                    <p class="status active"><font><font>Reception</font></font></p>
                    <p class="status deactive"><font><font>Release</font></font></p>
                    <p class="grip" style="left: 2px;"></p>
                </div>
            </dd>
        </dl>
    </div>
</div>

@include('elements.footer')

<script type="text/javascript">
    $('#switch_status').click(function(){
        if($('#switch_status .status').hasClass('active')) {
            $('#switch_status .status').removeClass('active');
            $('#switch_status .status').addClass('deactive');
            $('#switch_status .status').text('Release');
            $('#switch_status .grip').css({'left':'2px'});
        } else {
            public_flg = 1;
            $('#switch_status .status').removeClass('deactive');
            $('#switch_status .status').addClass('active');
            $('#switch_status .status').text('Reception');
            $('#switch_status .grip').css({'left':'57px'});
        }
        // $.ajax({
        //     type: "POST",
        //     url: "/set_public_flag",
        //     data: {
        //         store_id: store_id,
        //         public_flg:public_flg
        //     },
        //     global: true,
        //     dataType: 'json',
        //     success: function(response) {
        //         if(response.success=1) {
        //             return;
        //         } else {
        //             alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
        //             return;
        //         }
        //     },
        //     error: function(XMLHttpRequest, textStatus, errorThrown) {
        //     },
        // });

    });

    $(document).on('click', '.switch_public_flag', function(e){
        var store_id = $(this).attr('store_id');
        var public_flg;
        if($('.switch_public_flag .status_store').hasClass('active')) {
            public_flg = 0;
            $('.switch_public_flag .status_store').removeClass('active');
            $('.switch_public_flag .status_store').addClass('deactive');
            $('.switch_public_flag .status_store').text('Release');
            $('.switch_public_flag .grip').css({'left':'2px'});
        } else {
            public_flg = 1;
            $('.switch_public_flag .status_store').removeClass('deactive');
            $('.switch_public_flag .status_store').addClass('active');
            $('.switch_public_flag .status_store').text('Reception');
            $('.switch_public_flag .grip').css({'left':'57px'});
        }
        // $.ajax({
        //     type: "POST",
        //     url: "/set_public_flag",
        //     data: {
        //         store_id: store_id,
        //         public_flg:public_flg
        //     },
        //     global: true,
        //     dataType: 'json',
        //     success: function(response) {
        //         if(response.success=1) {
        //             return;
        //         } else {
        //             alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
        //             return;
        //         }
        //     },
        //     error: function(XMLHttpRequest, textStatus, errorThrown) {
        //     },
        // });

    });
</script>