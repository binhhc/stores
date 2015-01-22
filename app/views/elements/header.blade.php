<!DOCTYPE html>
<html id="ng-app" ng-app="StoresJp">
<head>
    <title>{{$title_for_layout}}</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="vi-vn" />
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/style.css')}}
    {{HTML::style('css/jquery.tipsy.css')}}
    {{HTML::style('css/item_management.css')}}
    {{HTML::script('/js/jquery.min.js')}}
    {{HTML::script('/js/common.js')}}
    <script type="text/javascript">
        //<![CDATA[
        // AUTH_TOKEN = "6SgmvqjCJG7kEq2cCrNmOOyXphgScKwTHYqtDe1uJB8="; STORE_ID = '54b5c9fd3bcba95608004832'; USER_NAME = 'kids0407';
        //]]>
    </script>
    <script type="text/javascript">
        //<![CDATA[
        // STORES_JP = {"plan":"free","is_activate":true,"signup_email_activate_done":null,"FILE_SERVER_URL":"https://f.stores.jp","enable_addons":["follow"]};
        //]]>
    </script>
    <script>
    //viewport
    if ((navigator.userAgent.indexOf('iPhone') > 0) || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0) {
      document.write('<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=yes">');
    } else {
      document.write('<meta name="viewport" content="width=1024px">');
    }
    </script>
</head>

<body>
<?php
   	(isset($account_token) && !empty($account_token)) ? $str="display:block" :  $str="display:none";?>
    <div class="activate" style="<?php echo $str?>">
        <div class="wrap">
            <p class="text">Chúng tôi gửi một xác nhận e-mail đến địa chỉ e-mail đã đăng ký. Hãy hoàn thành quy trình của bạn từ mail.</p>
            <p class="btn">
                <a class="send_email">Gửi lại email</a>
            </p>
            <p class="btn" id="sending_email" ng-show="pending" style="display: none;">Đang gửi</p>
        </div>
    </div>
<div id="header" class="row">
    <div class="wrap">
        <h1><a href="/">
            {{HTML::image('img/main_page/logo.png')}}
        </a></h1>
        <p class="btn_store"><a href="/" target="_blank">Cửa hàng của tôi</a></p>
        <ul class="nav" style="cursor: pointer">
            <li class="nav_design"><a href="{{URL::asset('/edit')}}" id="mn_store_design" original-title="Thiết kế cửa hàng"></a></li>
            <li class="nav_items"><a href="{{URL::asset('/item_management')}}" id="mn_add_item" original-title="Thêm mặt hàng"></a></li>
            <li class="nav_store"><a href="{{URL::asset('/store_setting')}}" id="mn_store_setting" original-title="Cài đặt cửa hàng"></a></li>

            <!-- TODO -->
            <li class="nav_account"><a href="{{URL::asset('/account_setting')}}" id="mn_account_setting" original-title="Cài đặt tài khoản"></a></li>
            <li class="nav_faq"><a href="#" id="mn_faq" original-title="FAQ"></a></li>
        </ul>
        <!-- /Nav -->
    </div>
    <div class="row">
        <!-- News/ -->
        <div class="span12">
            <p class="newsbox"><a href="#" target="_blank">Nhận thông tin mới nhất của cửa hàng bằng email!</a></p>
        </div>
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
