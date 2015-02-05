@include('main.header')
<div class="main social_login">
	<div id="panel_error" ng-show="invalid()" style="display:none">
		<p class="email_pass_error"  style="display:none">Vui lòng nhập địa chỉ email, password của bạn</p>
		<p class="pass_error"  style="display:none">Vui lòng nhập một mật khẩu ít nhất 6 ký tự</p>
		<p class="valid_email"  style="display:none">Xin vui lòng nhập một địa chỉ email hợp lệ</p>
		<p class="unique_email"  style="display:none">Email của bạn đã được đăng ký</p>
		<p class="close" ng-click="clicked_submit = false">
			{{HTML::image('img/main_page/icon_close.png', 'Đóng')}}
		</p>
	</div>
	<div class="social_login">
		<h1>
			Vô cùng đơn giản, trong vòng 2 phút
			<br />Tôi có thể tạo cửa hàng của mình
		</h1>
		<div class="form">
		{{Form::open(array('url' => 'register', 'method' => 'post', 'name' => 'myForm'))}}
			<h2><strong>Miễn phí</strong> tạo cửa hàng!</h2>
			<div class="email">
				{{Form::text('email', '', array('placeholder' => 'Email', 'name' => 'email'))}}
			</div>
			<div class="password">
				<input type="password" name="password" placeholder="Mật khẩu" />
			</div>
				<button class="btn_submit" type="button">Tạo cửa hàng</button>
				<p class="btn_wait" style="display: none">Đang tạo...</p>
			<p class="text">
				<span>Hoặc</span>
			</p>
			<p class="btn_facebook">
				<a href="{{url('login/fb')}}">Đăng nhập Facebook</a>
			</p>
			<div class="facebook_help">
				<div class="box">
					<p class="left">Để xác nhận, đăng nhập qua Facebook</p>
					<p class="right">
						<a data-toggle="tooltip" data-placement="top" data-html="true" data-template='<div class="abc">Hồ sơ của bạn, tôi sẽ sử dụng danh sách bạn bè, địa chỉ e-mail. Hãy yên tâm rằng nó không được đăng trên Timeline.</div>' title="Hồ sơ của bạn, tôi sẽ sử dụng danh sách bạn bè, địa chỉ e-mail. Hãy yên tâm rằng nó không được đăng trên Timeline." href="#">
							{{HTML::image('img/main_page/icon_help.png', 'Help')}}
						</a>
					</p>
				</div>
			</div>
			{{ Form::close() }}
		</div>
		<p class="store_num">
			{{HTML::image('img/main_page/badge_num_l.png', 'Huy chương')}}
		</p>
	</div>
	<p class="pv pc">
		<a class="fancybox-media" href="https://vimeo.com/47070682">Xem</a>
	</p>
</div>
<div id="stores" class="contents">
	<div class="wrapper">
		<h3 class="heading">Miễn phí lưu trữ hàng hoá trực tuyến</h3>
		<div class="slide">
			<ul class="slide_navi">
				<li class="prev">Trước</li>
				<li class="next">Sau<li>
			</ul>
			<div class="slide_mask">
				<div class="slide_wrap">
				<?php foreach($item_slides as $item) {?>
					<div class="slide_cols">
					  <ul class="col4">
					  <?php foreach ($item as $key => $value) {?>
						<li class="cols">
						  <a href="{{$value['href']}}" target="_blank">{{HTML::image($value['url'], $value['name'])}}</a>
						</li>
						<?php }?>
					  </ul>
					</div>
					<?php }?>
			    </div>
			    <p class="sp_category_more">
					<a href="">Phân loại</a>
				</p>
			</div>
		</div>
	</div>
	<div class="contact">
		<div class="heading_contact">Nhân viên toàn thời gian vui lòng hỗ trợ</div>
			<ul>
				<li class="mail">
					<a href="/contact">
						<p>Liên hệ qua email</p>
					</a>
				</li>
			</ul>
		</div>
</div>
<p class="medias pc">
	{{HTML::image('img/main_page/media_marks.png', 'Media marks')}}
</p>
<p id="footer_copy">
	<strong>Dễ dàng mở một cửa hàng trực tuyến với stores</strong>
</p>
@include('main.footer')