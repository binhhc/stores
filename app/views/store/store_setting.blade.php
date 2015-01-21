@include('elements.header')
 {{HTML::script('/js/store_setting.js')}}
<div id="alert_delete_success" style="display: none">
	<div id="alert_panel12" class="success" style="display: block; opacity: 1.0; top: -10px;">
       	<p>Bạn đã xoá thành công mô tả cửa hàng!</p>
	</div>
</div>
<?php if(Session::has('success')) {?>
<div id="alert_panel" class="success" style="display: block; opacity: 1.0; top: -10px;">
    <p><?php echo Session::get('success');?></p>
</div>
<?php }?>
<div class="wrapper ng-scope" ng-init="index();">
	<h2 class="heading">Cài đặt cửa hàng</h2>
	<dl class="store_content form_basic box_wht">
		<dd>
			<dl class="cols no_border">
				<dt>Địa chỉ URL của của hàng tôi</dt>
				<dd style="width: 500px;">
					<ul>
						<li style="max-width: 500px; word-break: break-word; word-wrap: break-word;">
							<span class="big ng-binding" style="line-height: 220%;"><?php echo isset($user_store['domain']) ? $user_store['domain'] : ''?></span>
						</li>
						<li ng-show="data.available_url_change && !data.has_domain" style="">
							<p class="btn_low_m">
								<a href="store_domain">Thay đổi</a>
							</p>
						</li>
					</ul>
					<div class="btn_domain" ng-show="data.url[4] == 's'" style="">
						<p class="icon">
						{{HTML::image('img/main_page/icon_premium.png') }}
						</p>
						<p class="text">Với URL ngắn gọn và dễ nhớ, dễ quảng bá bán hàng</p>
						<p class="btn_high_m" ng-show="data.url[4] == 's' && !data.has_domain" style="">
							<a href="setting_domain">Sử dụng tên miền của tôi</a>
						</p>
					</div>
				</dd>
			</dl>
			<dl class="cols">
				<dt>Kế hoạch sử dụng</dt>
				<dd class="horizon" style="width: 340px;">
					<ul>
						<li class="ng-binding" style="font-size: 14px; font-weight: bold;">Miễn phí</li>
						<li class="btn_ribbon">
							<p class="btn_high_l" ng-show="data.plan == 'free'" style="margin-left: 10px;">
								<a href="#!/premium">Giới thiệu phí bảo hiểm</a>
							</p>
							<p class="ribbon" ng-show="data.plan == 'free'" style="">
								{{HTML::image('img/main_page/ribbon.png') }}
							</p>
						</li>
					</ul>
				</dd>
			</dl>
			<dl id="cols_closed" class="cols">
				<dt>Publish</dt>
				<dd>
					<div id="switch_open" class="switch switch_public_flag" store_id="<?php echo isset($user_store['id'])? $user_store['id'] : ''?>" ng-click="toggle_closed()">
					<?php if(isset($user_store['public_flg']) && $user_store['public_flg'] == 1) {?>
						<p class="status_store active" >Publish</p>
						<p class="grip" style="left: 57px;"></p>
					<?php } else {?>
						<p class="status_store deactive">Private</p>
						<p class="grip" style="left: 2px;"></p>
					<?php }?>
					</div>
				</dd>
			</dl>
			<dl class="cols">
				<dt>Mô tả cửa hàng</dt>
				<dd class="horizon">
				<?php if(isset($user_store['setting_intros']) && $user_store['setting_intros'] != '') {?>
					<p class="btn_low_m" ng-show="hasAbout" >
						<a href="store_about" class="store_edit">Chỉnh sửa</a>
					</p>
					<p class="btn_low_m" id="delete_store_about" store_id="<?php echo isset($user_store['id'])? $user_store['id'] : ''?>" >
						<a href="">Xoá</a>
					</p>
				<?php } else {?>
					<p class="btn_low_m" ng-hide="hasAbout">
						<a href="store_about">Đăng ký</a>
					</p>

				<?php }?>
					<p class="memo" ng-show="showProfileSettingAlert()" style="display: none;">Cảm ơn bạn đã đăng ký</p>
				</dd>
			</dl>
			<dl class="cols">
				<dt>Luật giao dịch thương mại</dt>
				<dd class="horizon">
					<?php  if(isset($user_store['setting_trade_law']) && $user_store['setting_trade_law'] != '') {?>
						<p class="btn_low_m" ng-show="hasTokushoho">
							<a  href="trade_law" class="trade_law_edit">Chỉnh sửa</a>
						</p>
						<p class="btn_low_m" id="delete_trade_law" store_id="<?php echo isset($user_store['id'])? $user_store['id'] : ''?>" >
							<a  href="">Xoá</a>
						</p>
					<?php } else {?>
						<p class="btn_low_m" ng-hide="hasTokushoho">
							<a  href="trade_law">Đăng ký</a>
						</p>
					<?php }?>
				</dd>
			</dl>
			<!--  <dl class="cols">
				<dt>Phương thức thanh toán</dt>
				<dd class="horizon">
					<p class="btn_low_m">
						<a href="payment_method">Chỉnh sửa</a>
					</p>
				</dd>
			</dl>-->
			<dl class="cols" ng-show="sf.type == 'fix'" style="">
				<dt id="sipping_title">Cài đặt vận chuyển</dt>
				<dd id="sipping_contents" class="horizon">
					<p id="open_shipping_select"  class="btn_low_m">
						<a href="">Cài đặt</a>
					</p>
					<div id="shipping_select" style="display:none;">
						<div id="shipping_fix">
						<?php $circle = isset($setting_postage->circle) ? $setting_postage->circle: ''?>
							<dl class="box_wht">
								<dd class="price">
									 {{Form::text('circle',$circle , array('class' => ''))}}
										Mối
								</dd>
							</dl>
							<ul class="shipping_free_wrapper">
								<li class="sz_fix" style="line-height:44px;">
								<?php $check_free_ship = isset($setting_postage->check_free_ship) ? $setting_postage->check_free_ship: ''?>
									<div class="styled_checkbox">
										{{Form::checkbox('check_free_ship',$check_free_ship , array('id' => 'check_shipping_free_fix'))}}
										<span id="checkbox_image" class="checked-"></span>
									</div>
									<label for="check_shipping_fix">Miễn phí vận chuyển</label>
								</li>
								<?php $free_ship = isset($setting_postage->free_ship) ? $setting_postage->free_ship: ''?>
								<li class="shipping_free1" ng-show="enabled_free_shipping" style="display:none;">
									 {{Form::text('free_ship', $free_ship, array('style' => 'width: 100px'))}}
									Yên hoặc miễn phí vận chuyển
								</li>
							</ul>
							<ul ng-show="data.via == 'mybook'" style="display:none; margin:1.5em 0">
								<li>Tài khoản của bạn bạn không thay đổi được</li>
							</ul>
							<dl class="btn_pair">
								<dd class="btn_low fancy_close">
									<button class="cancel_button">Huỷ</button>
								</dd>
								<dd class="btn_high">
									<button class="save_shipping">Lưu</button>
								</dd>
							</dl>
						</div>
					</div>
				</dd>
			</dl>
			{{Form::close()}}
			<dl class="cols" style="clear:both;">
				<dt>
					Theo dõi
					<span class="info">
					<a class="modal" href="#follow_modal1">
						{{HTML::image('img/main_page/icon_help.png', 'Information') }}
					</a>
					</span>
				</dt>
				<dd class="ng-scope" >
					<div class="switch set_store_follow" store_id="<?php echo isset($user_store['id'])? $user_store['id'] : ''?>">
						<?php if(isset($user_store['follow']) && $user_store['follow'] == 1) {?>
							<p class="status_follow active">ON</p>
							<p class="grip" style="left: 57px;"></p>
						<?php } else {?>
							<p class="status_follow deactive" >OFF</p>
							<p class="grip" style="left: 2px;"></p>
						<?php }?>

					</div>
				</dd>
			</dl>

			<dl class="cols" ng-hide="data.mall" style="clear: both;">
				<dt>
					Khuyến mãi
					<span class="info">
						<a class="modal" ng-click="promotion_click()" href="#promotion_modal1">
							{{HTML::image('img/main_page/icon_help.png', 'Information') }}
						</a>
					</span>
				</dt>
				<dd>
					<ul>
						<li id="form_promotion">
								<div class="switch set_promotion" store_id="<?php echo isset($user_store['id'])? $user_store['id'] : ''?>">
									<?php if(isset($user_store['promotion']) && $user_store['promotion'] == 1) {?>
										<p class="status_promotion active">ON</p>
										<p class="grip" style="left: 57px;"></p>
									<?php } else {?>
										<p class="status_promotion deactive" >OFF</p>
										<p class="grip" style="left: 2px;"></p>
									<?php }?>

								</div>

						</li>
					</ul>
				</dd>
			</dl>
		</dd>
	</dl>
</div>
<div id="dummy_modal" class="ng-scope">
	<div id="modal-win" style="top: 622px; display: none">
		<div id="modal-bg" style="opacity: 1;"></div>
		<div id="modal-win-inner">
			<div id="promotion_modal1" class="modal_slide ng-scope modal_contents" style="display: block; z-index: 101;" ng-class="class_modal_promotion()">
				<p class="modal_title">Những chức năng khuyến mãi</p>
				<p class="modal_image">
					{{HTML::image('img/main_page/image_switch.png', 'Switch') }}
				</p>
				<p class="modal_text">
					Đơn giản chỉ cần chuyển sang ON
					<br>
					STORES.jpが提携する大手有名サイトへ
					<br>
					商品を掲載することのできる告知・集客機能となります。
				</p>
				<p class="modal_note">
				※掲載にお時間を頂く場合があります。また、商品により掲載が出来ない場合があります。
				<br>
				※販売に至った場合のみ、手数料が10%発生します。（ユザワヤマーケットは除く）
				<br>
				※
				<a target="_blank" href="/dashboard#!/faq/promotion">よくある質問はこちら</a>
				をご覧ください。
				</p>
				<ul class="modal_nav">
					<li class="modal_nav_next">
						<a class="modal-move" href="#promotion_modal2">
							{{HTML::image('img/main_page/btn_modal_next.png', 'Tiếp theo') }}
						</a>
					</li>
				</ul>
				<div class="modal_footer">
					<p class="btn_high_big" ng-hide="promotion" style="">
						<a class="modal-close" ng-click="toggle_promotion()" ng-hide="promotion" style="" href="#">プロモーション機能をONにする</a>
					</p>
					<ul class="modal_page">
						<li>
							<a class="modal-move" href="#promotion_modal1">
								{{HTML::image('img/main_page/btn_modal_on.png', 'Information') }}
							</a>
						</li>
						<li>
							<a class="modal-move" href="#promotion_modal2">
								{{HTML::image('img/main_page/btn_modal_off.png', 'Information') }}
							</a>
						</li>
						<li>
							<a class="modal-move" href="#promotion_modal3">
								{{HTML::image('img/main_page/btn_modal_off.png', 'Information') }}
							</a>
						</li>
					</ul>
				</div>
				<p class="btn_modal_close">
					<a class="modal-close" href="#">
						{{HTML::image('img/main_page/btn_modal_close.png', 'Information') }}
					</a>
				</p>
			</div>
		</div>

		<div id="modal-win-inner" >
			<div id="promotion_modal2" class="modal_slide ng-scope modal_contents" style="display: none; z-index: 101;" ng-class="class_modal_promotion()">
				<p class="modal_title">提携メディア一覧</p>
				<p style="padding-bottom:10px;">以下のメディアに商品が掲載されます。提携メディアは随時増える予定です。</p>
				<div ng-hide="data.via == 'toranoana'">
					<p class="promotion_logo_special">
						<a target="_blank" href="http://market.zozo.jp/">
							{{HTML::image('img/main_page/store_setting/logo_zozomarket.png', 'Information', array('height' => 26)) }}
						</a>
						<a target="_blank" href="http://market.pass-the-baton.com/">
							{{HTML::image('img/main_page/store_setting/logo_passthebaton.png', 'Information', array('height' => 26)) }}
						</a>
					</p>
					<p class="promotion_logo_special">
						<a target="_blank" href="http://market.stores.jp/yuzawaya">
							{{HTML::image('img/main_page/store_setting/logo_yuzawaya.png', 'Information', array('height' => 26, 'style' => 'padding:10px 10px 0 0;')) }}
						</a>
						<a target="_blank" href="http://exmarket.exblog.jp">
						{{HTML::image('img/main_page/store_setting/logo_exblog.png', 'Information', array('height' => 40)) }}
						</a>
					</p>
					<p class="promotion_logo_special">
						<a target="_blank" href="http://market.village-v.co.jp/">
						{{HTML::image('img/main_page/store_setting/logo_village.png', 'Information', array('width' => 270, 'style' => 'padding:0px 10px 0 0;')) }}
						</a>
						<a target="_blank" href="http://www.mbok.jp">
							{{HTML::image('img/main_page/store_setting/logo_mbok.png', 'Information', array('height' => 26)) }}
						</a>
					</p>
					<table id="promotion_logo" align="center">
						<tbody>
							<tr>
								<td>
									<a target="_blank" href="http://www.itempost.jp/">
										{{HTML::image('img/main_page/store_setting/logo_itempost.png', 'Information') }}
									</a>
								</td>
								<td>
									<a target="_blank" href="http://ecnavi.jp/">
										{{HTML::image('img/main_page/store_setting/logo_ecnavi.png', 'Information') }}
									</a>
								</td>
								<td>
									<a target="_blank" href="http://market.amifa.jp/">
									{{HTML::image('img/main_page/store_setting/logo_amifa.png', 'Information') }}
									</a>
								</td>
							</tr>
							<tr>
								<td>
									<a target="_blank" href="https://www.valuecommerce.ne.jp/index.cfm">
									{{HTML::image('img/main_page/store_setting/logo_valuecommerce.png', 'Information') }}
									</a>
									</td>
									<td>
										<a target="_blank" href="http://www.coneco.net/">
											{{HTML::image('img/main_page/store_setting/logo_coneco.png', 'Information') }}
										</a>
									</td>
									<td>
										<a target="_blank" href="http://park.jp/">
										{{HTML::image('img/main_page/store_setting/logo_park.png', 'Information') }}
										</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<p class="modal_note">
				※掲載にお時間を頂く場合があります。また、商品により掲載が出来ない場合があります。
				<br>
				※販売に至った場合のみ、手数料が10%発生します。（ユザワヤマーケットは除く）
				<br>
				※
				<a target="_blank" href="/dashboard#!/faq/promotion">よくある質問はこちら</a>
				をご覧ください。
				</p>
				<ul class="modal_nav">
					<li class="modal_nav_next">
						<a class="modal-move" href="#promotion_modal3">
							{{HTML::image('img/main_page/btn_modal_next.png', 'Information') }}
						</a>
					</li>
					<li class="modal_nav_back">
						<a class="modal-move" href="#promotion_modal1">
							{{HTML::image('img/main_page/btn_modal_back.png', 'Information') }}
						</a>
					</li>
				</ul>
				<div class="modal_footer">
					<p class="btn_high_big" ng-hide="promotion" style="">
						<a class="modal-close" ng-click="toggle_promotion()" ng-hide="promotion" style="" href="#">プロモーション機能をONにする</a>
					</p>
					<ul class="modal_page">
						<li>
							<a class="modal-move" href="#promotion_modal1">
								{{HTML::image('img/main_page/btn_modal_off.png', 'Information') }}
							</a>
						</li>
						<li>
							<a class="modal-move" href="#promotion_modal2">
								{{HTML::image('img/main_page/btn_modal_on.png', 'Information') }}
							</a>
						</li>
						<li>
							<a class="modal-move" href="#promotion_modal3">
								{{HTML::image('img/main_page/btn_modal_off.png', 'Information') }}
							</a>
						</li>
					</ul>
				</div>
				<p class="btn_modal_close">
					<a class="modal-close" href="#">
						{{HTML::image('img/main_page/btn_modal_close.png', 'Information') }}
					</a>
				</p>
			</div>
		</div>

		<div id="modal-win-inner" >
			<div id="promotion_modal3" class="modal_slide ng-scope modal_contents" style="display: none; z-index: 101;" ng-class="class_modal_promotion()">
				<p class="modal_title">費用について</p>
				<p class="modal_image">
					{{HTML::image('img/main_page/image_fee.png', 'Information') }}
				</p>
				<div class="modal_text">
				<p>
				プロモーション機能を経由して、提携メディアに商品が掲載され
				<br>
				販売に至った場合のみ、販売手数料として販売価格の10%を
				<br>
				お支払い頂くかたちとなります。（ユザワヤマーケットは除く）
				</p>
				<p>
				もちろん、ストアオーナー様ご自身で集客した注文による
				<br>
				手数料は一切発生いたしません。
				</p>
				</div>
				<p class="modal_note">
				※掲載にお時間を頂く場合があります。また、商品により掲載が出来ない場合があります。
				<br>
				※
				<a target="_blank" href="/dashboard#!/faq/promotion">よくある質問はこちら</a>
				をご覧ください。
				</p>
				<ul class="modal_nav">
					<li class="modal_nav_back">
						<a class="modal-move" href="#promotion_modal2">
							{{HTML::image('img/main_page/btn_modal_back.png', 'Information') }}
						</a>
					</li>
				</ul>
				<div class="modal_footer">
					<p class="btn_high_big" ng-hide="promotion" style="">
						<a class="modal-close" ng-click="toggle_promotion()" ng-hide="promotion" style="" href="#">プロモーション機能をONにする</a>
					</p>
					<ul class="modal_page">
						<li>
							<a class="modal-move" href="#promotion_modal1">
								{{HTML::image('img/main_page/btn_modal_off.png', 'Information') }}
							</a>
						</li>
						<li>
							<a class="modal-move" href="#promotion_modal2">
								{{HTML::image('img/main_page/btn_modal_off.png', 'Information') }}
							</a>
						</li>
						<li>
							<a class="modal-move" href="#promotion_modal3">
								{{HTML::image('img/main_page/btn_modal_on.png', 'Information') }}
							</a>
						</li>
					</ul>
				</div>
				<p class="btn_modal_close">
					<a class="modal-close" href="#">
						{{HTML::image('img/main_page/btn_modal_close.png', 'Information') }}
					</a>
				</p>
			</div>
		</div>
	</div>
</div>

@include('elements.footer')
