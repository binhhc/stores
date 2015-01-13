{{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/item_management.css')}}
        {{HTML::script('js/jquery.min.js')}}
         {{HTML::script('js/main_page.js')}}
        @include('elements.header')
<div class="wrapper ng-scope">
		<h2 class="heading">Thay đổi địa chỉ URL</h2>
		<dl class="form_basic">
			<dd>
				<dl class="cols form_basic">
					<dt>Thay đổi địa chỉ URL</dt>
					<dd>
						<div class="big url">
							<span class="first">https://</span>
								<input type="text" />
							<span class="second">.stores.jp</span>
						</div>
					</dd>
				</dl>
			</dd>
			<dl class="btn_pair" ng-hide="pending">
				<dd class="btn_low">
						<a href="/store_setting"><button onclick="history.back()" type="button">Quay lại</button></a>
					</dd>
					<dd class="btn_high">
						<a href="/store_setting"><button type="submit">Lưu</button></a>
				</dd>
			</dl>
</div>
@include('elements.footer')