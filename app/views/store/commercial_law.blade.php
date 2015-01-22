@include('elements.header')
<div id="store_cart" class="wrapper row">
	<div class="height_fix">
		<div id="header_basic">
		<h1 id="store_logo" ng-style="styles.store_logo">
			<a ng-hide="styles.logo" href="/">
				<span class="txt ng-binding"></span>
			</a>
		</h1>
		</div>
		<h2 class="heading">Luật thương mại</h2>
	</div>
	{{Form::open(array('url' => 'trade_law', 'method' => 'post','class' => 'form_basic'))}}
	<div class="box_wht" ng-hide="accepted">
		<dl class="form_basic" style="padding-top:20px;">
			<dd>
				<dl class="cols_single">
					<dt>Đối với giá bán</dt>
					<dd>
					{{Form::textarea('price', $price, array('placeholder' => '', 'style' => "height: 80px;"))}}
					</dd>
				</dl>
			</dd>
			<dd>
				<dl class="cols_single">
					<dt>Thanh toán khi nào và như thế nào về giá cả (xem xét)</dt>
					<dd>
						{{Form::textarea('charge', $charge, array('placeholder' => '', 'style' => "height: 80px;"))}}
					</dd>
				</dl>
			</dd>
			<dd>
				<dl class="cols_single">
					<dt>Các vấn đề liên quan đến hợp đồng</dt>
					<dd>
						{{Form::textarea('contract', $contract, array('placeholder' => '', 'style' => "height: 80px;"))}}
					</dd>
				</dl>
			</dd>
			<dd>
				<dl class="cols_single">
					<dt>Thời gian giao hàng của các dịch vụ hoặc hàng hóa</dt>
					<dd>
						{{Form::textarea('time_ship', $time_ship, array('placeholder' => '', 'style' => "height: 80px;"))}}
					</dd>
				</dl>
			</dd>
			<dd>
				<dl class="cols_single">
					<dt>Tên và thông tin liên lạc của điều hành</dt>
					<dd>
						{{Form::textarea('contact', $contact, array('placeholder' => '', 'style' => "height: 80px;"))}}
					</dd>
				</dl>
			</dd>
		</dl>
	</div>
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