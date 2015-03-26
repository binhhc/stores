@include('elements.header')
<?php if((Session::has('active')) && (Session::get('active')=="1")) {?>
<div id="alert_panel" class="success" style="display: block; opacity: 1.0; top: -10px;">
	<p>Bạn đã kích hoạt tài khoản thành công!</p>
</div>
<?php } else { if((Session::has('active')) && Session::get('active')=="2") {?>
<div id="alert_panel" class="fail" style="display: block; opacity: 1.0; top: -10px;">
	<p>Mã kích hoạt tài khoản của bạn đã hết hạn. Hãy đăng ký để hệ thống gửi lại email kích hoạt khác.</p>
</div>
<?php } } ?>
<?php if(Session::has('forgetPassword') && (Session::get('forgetPassword') == 1)) {?>
	<div id="alert_panel" class="fail" style="display: block; opacity: 1.0; top: -10px;">
		<p>Mã đổi mật khẩu tài khoản của bạn đã hết hạn. Hãy đăng ký để hệ thống gửi lại email đổi mật khẩu khác.</p>
	</div>
<?php Session::forget('forgetPassword');}?>
<?php $user= Session::get('user'); $email = $user['email'];
	if(Session::has('first_register'))
      $str="display:block";
    else $str="display:none";
    // delete session
    Session::forget('first_register');
?>
<div class="dashboard_wrapper ng-scope">
	<ul class="dashboard">
		<li>
			<a class="dashboard_design"  href="{{URL::asset('/edit')}}">
				<h2>Thiết kế cửa hàng</h2>
				<span>Tuỳ chỉnh thiết kế cửa hàng</span>
			</a>
		</li>
		<li>
			<a class="dashboard_items"  href="{{URL::asset('/item_management')}}">
			<h2>Quản lý sản phẩm</h2>
			<span>Thêm / Chỉnh sửa sản phẩm</span>
			</a>
		</li>
		<li>
			<a class="dashboard_store"  href="{{URL::asset('/store_setting')}}">
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
        <li class="special">
            <a class="dashboard_addon" href="{{URL::asset('/addon')}}">
              <h2>Addon</h2>
              <span>Cập nhật tính năng mới</span>
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
@include('elements.footer')
