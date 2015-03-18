<!DOCTYPE html>
<html id="ng-app" >
<head>
    <title>{{{ !empty($title_for_layout) ? $title_for_layout: ''}}}</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="vi-vn" />
		{{HTML::style('css/application-terms.css')}}
         {{HTML::style('css/pc_terms.css')}}
        {{HTML::script('js/jquery.min.js')}}
<!-- Go to www.addthis.com/dashboard to customize your tools -->
  
</head>
<body>
<h1 class="summary"><?php echo Config::get('constants.website_name'). ' '. $title_for_layout;?></h1>
  <!-- Header/ -->
  <div id="header">
    <div class="wrapper pc">
      <p id="logo"><a href="/">{{HTML::image('img/main_page/logo.png')}}</a></p>
      <ul id="social"></ul>
      <ul id="main_nav" class="sub">
        <li><a href="/"><?php echo Config::get('constants.website_name');?></a></li>
        <li><a href="/feature">Chức năng</a></li>
        <li><a href="/price">Giá cả</a></li>
        <li><a href="/support_stores">Hỗ trợ</a></li>
        <li><a href="/category">Phân loại</a></li>
        <li><a href="/faq">FAQ</a></li>
        <li><a href="/login">Đăng nhập</a></li>
        <li id="navi_signup"><a href="/"><span>Tham gia Stores</span></a></li>
      </ul>
    </div>
    <!-- Mobile/ -->
    <div class="wrapper sp">
      <div class="contents">
        <p class="logo"><a href="/">{{HTML::image('img/main_page/logo_gray.png')}}</a></p>
        <p class="login"><a href="/login">Đăng nhập</a></p>
        <p id="btn_menu">{{HTML::image('img/main_page/btn_menu.png')}}</p>
      </div>
      <ul id="mobile_nav">
          <li><a href="/"><?php echo Config::get('constants.website_name');?></a></li>
        <li><a href="/feature">Chức năng</a></li>
        <li><a href="/price">Giá cả</a></li>
        <li><a href="/support">Hỗ trợ</a></li>
        <li><a href="/category">Phân loại</a></li>
        <li><a href="/faq">FAQ</a></li>
        <li class="btn_login"><a href="/login">Đăng nhập</a></li>
        <li class="btn_signup"><a href="/">Đăng ký</a></li>
      </ul>
    </div>
    <!-- /Mobile -->
  </div>
  <!-- /Header -->