{{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/item_management.css')}}
        {{HTML::script('js/jquery.min.js')}}
         {{HTML::script('js/main_page.js')}}
        @include('elements.header')
<div class="dashboard_wrapper ng-scope">
	<ul class="dashboard">
		<li>
			<a class="dashboard_design"  href="/">
				<h2>Thiết kế cửa hàng</h2>
				<span>Tuỳ chỉnh thiết kế cửa hàng</span>
			</a>
		</li>
		<li>
			<a class="dashboard_items"  href="/item_management">
			<h2>Quản lý sản phẩm</h2>
			<span>Thêm / Chỉnh sửa mục</span>
			</a>
		</li>
		<li>
			<a class="dashboard_store"  href="/store_setting">
			<h2>Cài đặt cửa hàng</h2>
			<span>Thêm / Chỉnh sửa thông tin cửa hàng</span>
			</a>
		</li>
		<li>
			<a class="dashboard_account"  href="/accout_setting">
			<h2>Cài đặt tài khoản</h2>
			<span>Sửa thông tin cá nhân</span>
			</a>
		</li>
	</ul>
</div>
@include('elements.footer')