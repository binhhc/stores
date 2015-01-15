{{HTML::script('/js/jquery.min.js')}}
{{HTML::script('/js/jquery.tipsy.js')}}

{{HTML::style('/css/jquery.tipsy.css')}}
{{HTML::style('css/bootstrap.min.css')}}
{{HTML::style('css/item_management.css')}}

<?php if(isset($first) && ($first == 1)) $str="display:block"; else $str="display:none";?>
<div class="activate" style="<?php echo $str?>">
    <div class="wrap">
        <p class="text">Chúng tôi gửi một xác nhận e-mail đến địa chỉ e-mail đã đăng ký. Hãy hoàn thành quy trình của bạn từ mail.</p>
        <p class="btn">
            <a class="send_email">Gửi email</a>
        </p>
        <p class="btn" id="sending_email" ng-show="pending" style="display: none;">Đang gửi</p>
    </div>

</div>
<div id="header" class="row">
    <div class="wrap">
        <h1><a href="/">
            {{HTML::image('img/main_page/logo.png')}}
        </a></h1>
        <p class="btn_store"><a href="#" target="_blank">Cửa hàng của tôi</a></p>
        <ul class="nav" style="cursor: pointer">
            <li class="nav_design"><a href="#" id="mn_store_design" original-title="Thiết kế cửa hàng"></a></li>
            <li class="nav_items"><a href="#" id="mn_add_item" original-title="Thêm mặt hàng"></a></li>
            <li class="nav_store"><a href="{{URL::asset('/store_setting')}}" id="mn_store_setting" original-title="Cài đặt cửa hàng"></a></li>
            <!-- TODO -->
            <li class="nav_account"><a href="{{URL::asset('/account_setting')}}" id="mn_account_setting" original-title="Cài đặt tài khoản"></a></li>
            <li class="nav_faq"><a href="#" id="mn_faq" original-title="FAQ"></a></li>
        </ul>
        <!-- /Nav -->
    </div>
</div>
<div class="row">
    <!-- News/ -->
    <div class="span12">
        <p class="newsbox"><a href="#" target="_blank">Hãy gọi những thông tin mới nhất của các cửa hàng bản tin e-mail!</a></p>
    </div>
</div>
      <!-- <p class="newsbox"><a href="#!/referral">ご紹介キャンペーンでプレミアム料金無料！</a></p> -->
<script>
    // add by Binh Hoang 2015.01.15
    $(function() {
       $('#mn_store_design').tipsy({fade: true, gravity: 'n'});
       $('#mn_add_item').tipsy({fade: true, gravity: 'n'});
       $('#mn_store_setting').tipsy({fade: true, gravity: 'n'});
       $('#mn_account_setting').tipsy({fade: true, gravity: 'n'});
       $('#mn_faq').tipsy({fade: true, gravity: 'n'});
    });
</script>