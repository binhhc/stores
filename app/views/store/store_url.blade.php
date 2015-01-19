@include('elements.header')
<div class="wrapper ng-scope">
	<h2 class="heading">Thay đổi địa chỉ URL</h2>
	 {{Form::open(array('url' => 'store_domain', 'method' => 'post'))}}
	<dl class="form_basic">
		<dd>
			<dl class="cols form_basic">
				<dt>Thay đổi địa chỉ URL</dt>
				<dd>
					<div class="big url">
						<span class="first">https://</span>
						 {{Form::text('domain', null, array('class' => 'input_login'))}}
						  <font class="message_error">{{ $errors->first('domain') }}</font>
						<span class="second">.stores.jp</span>
					</div>
				</dd>
			</dl>
		</dd>
		<dd>
			<dl class="btn_pair" ng-hide="pending">
				<dd class="btn_low">
						<a href="/store_setting"><button onclick="history.back()" type="button">Quay lại</button></a>
					</dd>
					<dd class="btn_high">
						<button type="submit">Lưu</button>
				</dd>
			</dl>
		</dd>
	</dl>
</div>
@include('elements.footer')