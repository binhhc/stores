{{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/item_management.css')}}
        {{HTML::script('js/jquery.min.js')}}
         {{HTML::script('js/main_page.js')}}
        @include('elements.header')
<div class="wrapper ng-scope" ng-init="index();">
	<h2 class="heading">Cài đặt cửa hàng</h2>
	<dl class="store_content form_basic box_wht">
		<dd>
			<dl class="cols no_border">
				<dt>Địa chỉ URL của của hàng tôi</dt>
				<dd style="width: 500px;">
					<ul>
						<li style="max-width: 500px; word-break: break-word; word-wrap: break-word;">
							<span class="big ng-binding" style="line-height: 220%;">https://oanhht.stores.jp</span>
						</li>
						<li ng-show="data.available_url_change && !data.has_domain" style="">
							<p class="btn_low_m">
								<a href="/store_url">Thay đổi</a>
							</p>
						</li>
					</ul>
					<div class="btn_domain" ng-show="data.url[4] == 's'" style="">
						<p class="icon">
						{{HTML::image('img/main_page/icon_premium.png') }}

						</p>
						<p class="text">Với URL ngắn gọn và dễ nhớ, dễ quảng bá bán hàng</p>
						<p class="btn_high_m" ng-show="data.url[4] == 's' && !data.has_domain" style="">
							<a href="setting_domain"">Sử dụng tên miền của tôi</a>
						</p>

					</div>
				</dd>
			</dl>
			<dl class="cols">
				<dt>Kế hoạch sử dụng</dt>
				<dd class="horizon" style="width: 300px;">
					<ul>
						<li class="ng-binding" style="font-size: 14px; font-weight: bold;">Miễn phí</li>
						<li class="btn_ribbon">
							<p class="btn_high_l" ng-show="data.plan == 'free'" style="margin-left: 10px;">
								<a href="#!/premium">Giới thiệu phí bảo hiểm</a>
							</p>
							<p class="ribbon" ng-show="data.plan == 'free'" style="">
								<img alt="" src="/img/main_page/ribbon.png">
							</p>
						</li>
					</ul>
				</dd>
			</dl>
			<dl id="cols_closed" class="cols">
				<dt>Publish</dt>
				<dd>
					<div id="switch_open" class="switch" ng-click="toggle_closed()">
						<p class="status active hide" ng-hide="closed" style="display: block!important;">Publish</p>
						<p class="status deactive hide" ng-show="closed">Riêng</p>
						<p class="grip" style="left: 2px;"></p>
					</div>
				</dd>
			</dl>
			<dl class="cols">
				<dt>Mô tả cửa hàng</dt>
				<dd class="horizon">
					<p class="btn_low_m" ng-hide="hasAbout">
						<a href="store_about"">Đăng ký</a>
					</p>
					<p class="btn_low_m" ng-show="hasAbout" style="display: none;">
						<a href="store_about">Chỉnh sửa</a>
					</p>
					<p class="btn_low_m" ng-show="hasAbout" style="display: none;">
						<a href="store_about">Xoá</a>
					</p>
					<p class="memo" ng-show="showProfileSettingAlert()" style="display: none;">Cảm ơn bạn đã đăng ký</p>
				</dd>
			</dl>
			<dl class="cols">
				<dt>Luật giao dịch thương mại</dt>
				<dd class="horizon">
					<p class="btn_low_m" ng-hide="hasTokushoho">
						<a  href="commercial_law">Đăng ký</a>
					</p>
					<p class="btn_low_m" ng-show="hasTokushoho" style="display: none;">
						<a  href="commercial_law">Chỉnh sửa</a>
					</p>
					<p class="btn_low_m" ng-show="hasTokushoho" style="display: none;">
						<a  href="">Xoá</a>
					</p>
				</dd>
			</dl>
			<dl class="cols">
				<dt>Phương thức thanh toán</dt>
				<dd class="horizon">
					<p class="btn_low_m">
						<a href="payment_method">Chỉnh sửa</a>
					</p>
				</dd>
			</dl>
			<dl class="cols" ng-show="sf.type == 'fix'" style="">
				<dt id="sipping_title">Cài đặt vận chuyển</dt>
				<dd id="sipping_contents" class="horizon">
					<p id="open_shipping_select" class="btn_low_m">
						<a href="javascript:0">Cài đặt</a>
					</p>
					<div id="shipping_select" style="display:none;">
						<div id="shipping_fix">
							<dl class="box_wht">
								<dd class="price">
									<input class="sz_s ng-pristine ng-valid" type="text" ng-model="sf.default_shipping_fee">
										Mối
								</dd>
							</dl>
							<ul class="shipping_free_wrapper">
								<li class="sz_fix" style="line-height:44px;">
									<div class="styled_checkbox">
										<input id="check_shipping_free_fix" class="check_shipping_free1 ng-pristine ng-valid" type="checkbox" ng-model="enabled_free_shipping" name="">
										<span class="checked-"></span>
									</div>
									<label for="check_shipping_fix">Miễn phí vận chuyển</label>
								</li>
								<li class="shipping_free1" ng-show="enabled_free_shipping" style="display:none;">
									<input class="sz_s ng-pristine ng-valid" type="text" ng-model="sf.free_shipping" name="">
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
									<button ng-click="save_fix_shipping_fee()">Lưu</button>
								</dd>
							</dl>
						</div>
					</div>
				</dd>
			</dl>

			<dl class="cols" style="clear:both;">
				<dt>
					Theo dõi
					<span class="info">
					<a class="modal" href="#follow_modal1">
						<img alt="Information" src="/img/main_page/icon_help.png">
					</a>
					</span>
				</dt>
				<dd class="ng-scope" addon="follow" sp-grip="">
					<div class="switch" ng-click="toggleAddon()">
						<p class="status active" ng-hide="closed" style="display: block!important;">ON</p>
						<p class="status deactive" ng-hide="isEnableAddon()" style="display: none;">OFF</p>
						<p class="grip" style="left: 57px;"></p>
					</div>
				</dd>
			</dl>

			<dl class="cols" ng-hide="data.mall" style="clear: both;">
				<dt>
					Khuyến mãi
					<span class="info">
						<a class="modal" ng-click="promotion_click()" href="#promotion_modal1">
							<img alt="Information" src="/img/main_page/icon_help.png">
						</a>
					</span>
				</dt>
				<dd>
					<ul>
						<li id="form_promotion">
								<div class="switch" ng-hide="promotion_config" style="">
									<p class="status active" ng-show="promotion" style="display: none;">ON</p>
									<p class="status deactive" ng-hide="promotion" style="">OFF</p>
									<p class="grip" style="left: 2px;"></p>
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
		<div id="modal-win-inner" style="opacity: 1; width: 540px; height: 590px;">
			<div id="promotion_modal" class="modal_slide ng-scope modal_contents" style="display: block; z-index: 101;" ng-class="class_modal_promotion()">
				<p class="modal_title">Những chức năng khuyến mãi</p>
				<p class="modal_image">
					<img alt="" src="/img/main_page/image_switch.png">
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
							<img alt="次へ" src="/img/main_page/btn_modal_next.png">
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
								<img alt="1" src="/img/main_page/btn_modal_on.png">
							</a>
						</li>
						<li>
							<a class="modal-move" href="#promotion_modal2">
								<img alt="2" src="/img/main_page/btn_modal_off.png">
							</a>
						</li>
						<li>
							<a class="modal-move" href="#promotion_modal3">
								<img alt="3" src="/img/main_page/btn_modal_off.png">
							</a>
						</li>
					</ul>
				</div>
				<p class="btn_modal_close">
					<a class="modal-close" href="#">
						<img alt="閉じる" src="/img/main_page/btn_modal_close.png">
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
							<img height="26" alt="ZOZOMARKET" src="/img/main_page/store_setting/logo_zozomarket.png">
						</a>
						<a target="_blank" href="http://market.pass-the-baton.com/">
							<img height="26" alt="PASS THE BATON MARKET" src="/img/main_page/store_setting/logo_passthebaton.png">
						</a>
					</p>
					<p class="promotion_logo_special">
						<a target="_blank" href="http://market.stores.jp/yuzawaya">
							<img height="26" style="padding:10px 10px 0 0;" alt="ユザワヤマーケット" src="/img/main_page/store_setting//logo_yuzawaya.png">
						</a>
						<a target="_blank" href="http://exmarket.exblog.jp">
							<img height="40" alt="エキサイトブログマーケット" src="/img/main_page/store_setting/logo_exblog.png">
						</a>
					</p>
					<p class="promotion_logo_special">
						<a target="_blank" href="http://market.village-v.co.jp/">
							<img width="270" style="padding:0 10px 0 0;" alt="ヴィレッジヴァンガードマーケット" src="/img/main_page/store_setting/logo_village.png">
						</a>
						<a target="_blank" href="http://www.mbok.jp">
							<img height="26" alt="モバオク" src="/img/main_page/store_setting/logo_mbok.png">
						</a>
					</p>
					<table id="promotion_logo" align="center">
						<tbody>
							<tr>
								<td>
									<a target="_blank" href="http://www.itempost.jp/">
										<img alt="アイテムポスト" src="/img/main_page/tore_setting/logo_itempost.png">
									</a>
								</td>
								<td>
									<a target="_blank" href="http://ecnavi.jp/">
										<img alt="ECナビ" src="/img/main_page/store_setting/logo_ecnavi.png">
									</a>
								</td>
								<td>
									<a target="_blank" href="http://market.amifa.jp/">
										<img alt="アミファ" src="/img/main_page/store_setting/logo_amifa.png">
									</a>
								</td>
							</tr>
							<tr>
								<td>
									<a target="_blank" href="https://www.valuecommerce.ne.jp/index.cfm">
										<img alt="バリューコマース" src="/img/main_page/store_setting/logo_valuecommerce.png">
									</a>
									</td>
									<td>
										<a target="_blank" href="http://www.coneco.net/">
											<img alt="コネコネット" src="/img/main_page/store_setting/logo_coneco.png">
										</a>
									</td>
									<td>
										<a target="_blank" href="http://park.jp/">
											<img alt="パーク" src="/img/main_page/store_setting/logo_park.png">
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
							<img alt="次へ" src="/img/main_page/btn_modal_next.png">
						</a>
					</li>
					<li class="modal_nav_back">
						<a class="modal-move" href="#promotion_modal1">
							<img alt="戻る" src="/img/main_page/btn_modal_back.png">
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
								<img alt="1" src="/img/main_page/btn_modal_off.png">
							</a>
						</li>
						<li>
							<a class="modal-move" href="#promotion_modal2">
								<img alt="2" src="/img/main_page/btn_modal_on.png">
							</a>
						</li>
						<li>
							<a class="modal-move" href="#promotion_modal3">
								<img alt="3" src="/img/main_page/btn_modal_off.png">
							</a>
						</li>
					</ul>
				</div>
				<p class="btn_modal_close">
					<a class="modal-close" href="#">
						<img alt="閉じる" src="/img/main_page/btn_modal_close.png">
					</a>
				</p>
			</div>
		</div>

		<div id="modal-win-inner" >
			<div id="promotion_modal3" class="modal_slide ng-scope modal_contents" style="display: none; z-index: 101;" ng-class="class_modal_promotion()">
				<p class="modal_title">費用について</p>
				<p class="modal_image">
				<img alt="料金" src="/img/main_page/image_fee.png">
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
							<img alt="次へ" src="/img/main_page/btn_modal_back.png">
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
								<img alt="1" src="/img/main_page/btn_modal_off.png">
							</a>
						</li>
						<li>
							<a class="modal-move" href="#promotion_modal2">
								<img alt="2" src="/img/main_page/btn_modal_off.png">
							</a>
						</li>
						<li>
							<a class="modal-move" href="#promotion_modal3">
								<img alt="3" src="/img/main_page/btn_modal_on.png">
							</a>
						</li>
					</ul>
				</div>
				<p class="btn_modal_close">
					<a class="modal-close" href="#">
						<img alt="閉じる" src="/img/main_page/btn_modal_close.png">
					</a>
				</p>
			</div>
		</div>
	</div>

</div>
@include('elements.footer')
<script>
	$(document).ready(function(){
		$('#open_shipping_select').on('click', function(event){
			 event.preventDefault();
			if ($('#shipping_select').css('display') == 'none') {
				$('#shipping_select').show();
			} else {
				$('#shipping_select').hide();
			}
		});
		$('button.cancel_button').on('click', function(){
			$('#shipping_select').hide();
		})
		$('#form_promotion').on('click', function(){
			$('#modal-win').show();
		});
		$('a.modal-move').on('click', function() {
			var modal = $(this).attr('href');
			$('#modal-win-inner').hide();
			$('.modal_slide').hide();
			$(modal).show();
		});
		$('a.modal-close').on('click', function(){
			$('#modal-win').hide();
		});
	});
</script>
