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
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54ae02186ebfd008" async="async"></script>
</head>
<body>
<h1 class="summary"><?php echo Config::get('constants.website_name'). ' '. $title_for_layout;?></h1>
  <!-- Header/ -->
  <div id="header">
    <div class="wrapper pc">
      <p id="logo"><a href="/">{{HTML::image('img/main_page/logo.png')}}</a></p>
    </div>
    <!-- Mobile/ -->
    <div class="wrapper sp">
      <div class="contents">
        <p class="logo"><a href="/">{{HTML::image('img/main_page/logo_gray.png')}}</a></p>
        <p class="login"><a href="/login">Đăng nhập</a></p>
      </div>
    </div>
    <!-- /Mobile -->
  </div>
  <!-- /Header -->