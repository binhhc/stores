@include('elements.header')
{{HTML::script('js/main_page.js')}}
<div class="wrapper ng-scope" ng-init="payment_method()">
	<h2 class="heading">Thiết lập các phương thức thanh toán</h2>
	<form class="ng-pristine ng-valid" novalidate="" ng-submit="submit()" name="form">
		<dl id="form_payment_method" class="form_basic">
			<dd>
				<dl class="cols">
					<dt>
						Phương thức thanh toán
						<span class="info">
							<a target="_blank" href="#!/faq/payment/cc">
								{{HTML::image('img/main_page/icon_help.png')}}
							</a>
						</span>
						</dt>
					<dd>
						<ul class="payment_select_wrapper">
							<li class="payment_select">
								<p class="checked">
								{{HTML::image('img/main_page/icon_check_simple.png')}}
								</p>
								<label>Thẻ tín dụng</label>
							</li>
						</ul>
						<ul class="payment_select_wrapper">
							<li class="payment_select">
								<div class="styled_checkbox">
									<input id="convenience_store_payment" class="ng-valid ng-dirty" type="checkbox" ng-model="payment_methods.convenience_store_payment.enabled">
									<span class="checked-false"></span>
								</div>
								<label for="convenience_store_payment">Thanh toán cửa hàng tiện lợi</label>
							</li>
						</ul>
						<ul class="payment_select_wrapper">
							<li class="payment_select">
								<div class="styled_checkbox">
									<input class="ng-valid ng-dirty" type="checkbox" ng-model="payment_methods.bank_transfer.enabled" name="q1">
									<span class="checked-false"></span>
								</div>
								<label>Chuyển khoản ngân hàng</label>
							</li>
						</ul>

						<ul class="payment_select_wrapper" ng-hide="mall">
							<li class="payment_select cash_on_delivery">
								<div class="styled_checkbox">
									<input id="cash_on_delivery" class="ng-valid ng-dirty" type="checkbox" ng-model="payment_methods.cash_on_delivery.enabled" name="q1">
									<span class="checked-true"></span>
								</div>
								<label for="cash_on_delivery">Tiền mặt khi giao hàng</label>
								<div class="cash_on_delivery_option" ng-show="payment_methods.cash_on_delivery.enabled" style="">
									<label>Hoa Hồng</label>
									<div class="cash_on_delivery_fee" ng-show="payment_methods.cash_on_delivery.enabled" style="">
										<input class="sz_s ng-pristine ng-valid ng-valid-stores-required ng-valid-stores-min ng-valid-stores-max" type="text" stores-max="3000" stores-min="0" stores-numeric="" stores-required="payment_methods.cash_on_delivery.enabled" ng-model="payment_methods.cash_on_delivery.fee" name="cash_on_delivery_fee">
										円
									</div>
									<p class="error" ng-show="form.cash_on_delivery_fee.$invalid" style="display: none;">Tối đa 3000</p>
								</div>
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
	</form>
</div>
@include('elements.footer')