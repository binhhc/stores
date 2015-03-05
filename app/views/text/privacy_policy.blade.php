<?php  $user = Session::get('user');?>
<?php if(!empty($user)) {?>
@include('text.header_simple')
<?php } else {?>
@include('text.header')
<?php }?>
	<div id="content">
	  <div class="wrapper">
	  	<h2 class="heading">{{$title_for_layout}}</h2>
		<div id="terms">
			<p style="padding-top:20px;">
			Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
			<br>
			Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
			</p>
			<h4>1.Lorem ipsum dolor sit amet</h4>
			<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>
			<h4>2.Lorem ipsum dolor sit amet</h4>
			<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>
			<ol>
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit ametLorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit amet</li>
				<li>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</li>
			</ol>
			<h4>3.Lorem ipsum dolor sit amet</h4>
			<ul>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			</ul>
			<h4>4.Lorem ipsum dolor sit ametて</h4>
			<p>Lorem ipsum dolor sit amet</p>
			<ol>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			</ol>
			<h4>5.Lorem ipsum dolor sit amet</h4>
			<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>
			<h4>6.Lorem ipsum dolor sit amet</h4>
			<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>
			<h4>7.Lorem ipsum dolor sit amet</h4>
			<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>
			<h4>8.Lorem ipsum dolor sit amet</h4>
			<ul>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			<li>Lorem ipsum dolor sit amet</li>
			</ul>
			<h4>9.Lorem ipsum dolor sit amet</h4>
			<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>
			<h4>10.Lorem ipsum dolor sit amet</h4>
			<p>
			<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet
			<br>
			Lorem ipsum dolor sit amet
			</p>
			<h4>11.Lorem ipsum dolor sit amet</h4>
			<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>
		</div>
		<ul class="breadcrumb_list">
			<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
				<a itemprop="url" href="/">
				<span itemprop="title">Trang chủ</span>
				</a>
				 >
			</li>
			<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
				<a itemprop="url" href="/privacy_policy">
				<strong itemprop="title">Chính sách bảo mật</strong>
				</a>
			</li>
		</ul>
	  </div>
  </div>
@include('text.footer')
