{{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/item_management.css')}}
        {{HTML::script('js/jquery.min.js')}}
         {{HTML::script('js/item_management.js')}}
        @include('elements.header')
        <?php $user= Session::get('user'); $email = $user['email']; ?>
 <?php if(isset($first) && ($first == 1)) $str="display:block"; else $str="display:none";?>
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
			<a class="dashboard_account"  href="{{URL::asset('/account_setting')}}">
			<h2>Cài đặt tài khoản</h2>
			<span>Sửa thông tin cá nhân</span>
			</a>
		</li>
	</ul>
</div>
<div id="dummy_modal"  class="modal_dashboard" style="<?php echo $str?>">
	<div id="modal-bg" style="opacity: 1;"></div>
	<div class="fancybox-overlay fancybox-overlay-fixed" style="width: auto; height: auto; ">
		<div class="fancybox-wrap fancybox-desktop fancybox-type-inline fancybox-opened" tabindex="-1" style="width: 446px; height: auto; position: absolute; top: 38px; left: 451px; opacity: 1; overflow: visible;">
			<div class="fancybox-skin" style="padding: 15px; width: auto; height: auto;">
				<div class="fancybox-outer">
					<div class="fancybox-inner" style="overflow: auto; width: 416px; height: auto;">
						<div id="popup_activate_finish" style="display: block;">
							<p class="icon">
								{{HTML::image('img/main_page/icon_store.png', 'STORES.vn')}}
							</p>
							<p class="text">
								Chào mừng bạn đến với Stores
							<br>
							Dưới đây là bảng điều khiển của cửa hàng bạn
							</p>
							<p class="btn_high_big">
								<a id="start_with_store">Bắt đầu</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hiden" value="<?php echo $email?>" id="email_user" />
@include('elements.footer')
