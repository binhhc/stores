<!DOCTYPE html>
<html id="ng-app" >
<head>
    <title>{{{ !empty($title_for_layout) ? $title_for_layout: ''}}}</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="vi-vn" />
		{{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/main_page.css')}}
        {{HTML::script('js/jquery.min.js')}}
        {{HTML::script('js/main_page.js')}}
<!-- Go to www.addthis.com/dashboard to customize your tools -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54ae02186ebfd008" async="async"></script>
</head>
<body>
<div id="header">
	<div class="contents">
		<p class="logo">
			{{HTML::image('img/main_page/logo_gray.png')}}
		</p>
		<p id="btn_menu">
            {{HTML::image('img/main_page/btn_menu.png')}}
		</p>
		<p class="login">
			<a href="{{URL::asset('/login')}}">Đăng nhập</a>
		</p>
		<div class="header_social">
			<div class="addthis_native_toolbox"></div>
		</div>
	</div>
	<ul id="mobile_nav">
      <li><a href="/store_setting">Stores</a></li>
      <li><a href="/features">Chức năng</a></li>
      <li><a href="/price">Giá cả</a></li>
      <li><a href="/support">Hỗ trợ</a></li>
      <li><a href="/interview">Phỏng vấn</a></li>
      <!--<li><a href="/category">ショップ紹介</a></li>-->
      <li><a href="/faq">FAQ</a></li>
      <li class="btn_login"><a href="/login">Đăng nhập</a></li>
      <li class="btn_signup"><a href="/">Đăng ký</a></li>
    </ul>

</div>