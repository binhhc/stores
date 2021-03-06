<!DOCTYPE html>
<html id="ng-app" ng-app="StoresJp">
<head>
    <title>{{{ !empty($title_for_layout) ? $title_for_layout: ''}}}</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="vi-vn" />
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/style.css')}}
    {{HTML::style('css/jquery.tipsy.css')}}
    {{HTML::style('css/item_management.css')}}
    {{HTML::script('/js/jquery.min.js')}}
    {{HTML::script('/js/common.js')}}
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
   	(isset($account_active) && $account_active !=1 ) ? $str="display:block" :  $str="display:none";?>
    <div class="activate" style="<?php echo $str?>">
        <div class="wrap">
            <p class="text">Chúng tôi gửi một e-mail xác nhận đến địa chỉ e-mail đã đăng ký. Hãy hoàn thành quy trình của bạn từ mail.</p>
            <p class="btn">
                <a class="send_email">Gửi lại email</a>
            </p>
            <p class="btn" id="sending_email" ng-show="pending" style="display: none;">Đang gửi</p>
        </div>
    </div>

    <div id="header_store_introduce">
        <div class="wrap">
            <a href="/">{{HTML::image('img/main_page/logo_gray.png')}}</a>
            <?php $domain_user = Session::get('userStoresDomain'); $domain = $domain_user['domain']?>
            <p class="btn_store"><a href="http://{{$domain}}.{{Request::server ("SERVER_NAME")}}" target="_blank">CỬA HÀNG CỦA TÔI</a></p>
        </div>
    </div>

    <div id="header_store_edit">
        <div class="wrap">
            <ul class="nav">
                <li class="nav_design"><a href="{{URL::asset('/edit')}}" id="mn_store_design" original-title="Thiết kế cửa hàng"></a></li>
                <li class="nav_items"><a href="{{URL::asset('/item_management')}}" id="mn_add_item" original-title="Thêm mặt hàng"></a></li>
                <li class="nav_store"><a href="{{URL::asset('/store_setting')}}" id="mn_store_setting" original-title="Cài đặt cửa hàng"></a></li>

                <!-- TODO -->
                <li class="nav_account"><a href="{{URL::asset('/account_setting')}}" id="mn_account_setting" original-title="Cài đặt tài khoản"></a></li>
                <li class="nav_addon"><a href="{{URL::asset('/addon')}}" original-title="Addon" id="mn_addon"></a></li>
                <li class="nav_faq"><a href="#" id="mn_faq" original-title="FAQ"></a></li>
            </ul>
            <div style="clear: both;"></div>
        </div>
    </div>