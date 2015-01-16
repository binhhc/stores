@include('elements.header')
<div class="wrapper ng-scope">
	<h2 class="heading">Thay đổi địa chỉ URL</h2>
	<dl class="form_basic form_multi">
		<dd>
			<dl class="cols">
				<dt>Mô tả</dt>
				<dd>
					<textarea class="ng-pristine ng-valid" ng-model="data.detail" placeholder="Mô tả cửa hàng" style="width:500px; height:200px;"></textarea>
				</dd>
			</dl>
		</dd>
		<dd>
			<dl class="cols">
				<dt>リンク</dt>
				<dd>
					<ul>
						<li class="sz_fix">Twitter</li>
						<li>
							<input class="ng-pristine ng-valid" type="text" ng-model="data.links.twitter" placeholder="http://www.twitter.com/">
						</li>
					</ul>
					<ul>
						<li class="sz_fix">Facebook</li>
						<li>
							<input class="ng-pristine ng-valid" type="text" ng-model="data.links.facebook" placeholder="http://www.facebook.com/">
						</li>
					</ul>
					<ul style="margin: 0;">
						<li class="sz_fix">Trang chủ</li>
						<li>
							<input class="ng-pristine ng-valid" type="text" ng-model="data.links.website" placeholder="http://www.stores.jp/">
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
				<a href="/store_setting"><button type="submit">Lưu</button></a>
		</dd>
	</dl>
</div>
@include('elements.footer')