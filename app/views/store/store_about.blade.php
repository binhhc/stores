@include('elements.header')
<div class="wrapper ng-scope">
	<h2 class="heading">Thay đổi địa chỉ URL</h2>
	{{Form::open(array('url' => 'store_about', 'method' => 'post'))}}
	<dl class="form_basic form_multi">
		<dd>
			<dl class="cols">
				<dt>Mô tả</dt>
				<dd>
				{{Form::text('description', $description, array('placeholder' => ' Mô tả cửa hàng', 'style' => "width: 500px; height: 200px;"))}}
				</dd>
			</dl>
		</dd>
		<dd>
			<dl class="cols">
				<dt>Liên kết</dt>
				<dd>
					<ul>
						<li class="sz_fix">Twitter</li>
						<li>
							{{Form::text('twitter', $twitter, array('placeholder' => 'http://www.twitter.com/'))}}
							<div class="message_error">{{ $errors->first('twitter') }}</div>
						</li>
					</ul>
					<ul>
						<li class="sz_fix">Facebook</li>
						<li>
							{{Form::text('facebook', $facebook, array('placeholder' => 'http://www.facebook.com/'))}}
							<div class="message_error">{{ $errors->first('facebook') }}</div>
						</li>
					</ul>
					<ul style="margin: 0;">
						<li class="sz_fix">Trang chủ</li>
						<li>
							{{Form::text('homepage', $homepage, array('placeholder' => ''))}}
							<div class="message_error">{{ $errors->first('homepage') }}</div>
						</li>
					</ul>
				</dd>
			</dl>
		</dd>
	</dl>
	<dl class="btn_pair" ng-hide="pending">
		<dd class="btn_low">
				<a href="/store_setting"><button onclick="history.back()" type="button">Quay lại</button></a>
			</dd>
			<dd class="btn_high">
				<button type="submit">Lưu</button>
		</dd>
	</dl>
	{{Form::close()}}
</div>
@include('elements.footer')