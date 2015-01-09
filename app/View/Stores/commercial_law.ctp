<?php echo $this->Html->css(array('item_management'))?>
<div id="store_cart" class="wrapper ng-scope">
	<div class="height_fix">
		<div id="header_basic">
		<h1 id="store_logo" ng-style="styles.store_logo">
			<a ng-hide="styles.logo" href="/">
				<span class="txt ng-binding"></span>
			</a>
		</h1>
		</div>
		<h2 class="heading">「特定商取引法に関する表記」の登録</h2>
	</div>
	<div class="box_wht" ng-hide="accepted">
		<dl class="form_basic" style="padding-top:20px;">
			<dd>
				<dl class="cols_single">
					<dt>Đối với giá bán</dt>
					<dd>
						<textarea class="ng-pristine ng-valid ng-valid-required" required="" ng-model="data.price" style="height:80px;" name="price"></textarea>
					</dd>
				</dl>
			</dd>
			<dd>
				<dl class="cols_single">
					<dt>Thanh toán khi nào và như thế nào về giá cả (xem xét)</dt>
					<dd>
						<textarea class="ng-pristine ng-valid ng-valid-required" required="" ng-model="data.period" style="height:80px;" name="period"></textarea>
					</dd>
				</dl>
			</dd>
			<dd>
				<dl class="cols_single">
					<dt>Các vấn đề liên quan đến hợp đồng đặc biệt của Trả lại</dt>
					<dd>
						<textarea class="ng-pristine ng-valid ng-valid-required" required="" ng-model="data.price" style="height:80px;" name="price"></textarea>
					</dd>
				</dl>
			</dd>
			<dd>
				<dl class="cols_single">
					<dt>Thời gian giao hàng của các dịch vụ hoặc hàng hóa</dt>
					<dd>
						<textarea class="ng-pristine ng-valid ng-valid-required" required="" ng-model="data.period" style="height:80px;" name="period"></textarea>
					</dd>
				</dl>
			</dd>
			<dd>
				<dl class="cols_single">
					<dt>Tên và thông tin liên lạc của điều hành</dt>
					<dd>
						<textarea class="ng-pristine ng-valid ng-valid-required" required="" ng-model="data.period" style="height:80px;" name="period"></textarea>
					</dd>
				</dl>
			</dd>
		</dl>
	</div>
	<dl class="btn_pair" ng-hide="pending">
		<dd class="btn_low">
			<button onclick="history.back()" type="button">Quay lại</button>
		</dd>
		<dd class="btn_high">
			<button type="submit">Lưu</button>
		</dd>
	</dl>
</div>