<?php echo $this->Html->css(array('item_management')); ?>
<div class="wrapper ng-scope">
	<form class="ng-pristine ng-invalid ng-invalid-required" ng-submit="submit()" novalidate="" name="form">
		<h2 class="heading">ストアURL</h2>
		<dl class="form_basic">
			<dd>
				<dl class="cols form_basic">
					<dt>新しいURL</dt>
					<dd>
						<div class="big url">
							<span class="first">https://</span>
							<input class="sz_m ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength ng-valid-minlength" type="text" required="" ng-maxlength="20" ng-minlength="3" ng-model="user_name" name="user_name">
							<span class="second">.stores.jp</span>
						</div>
					</dd>
				</dl>
			</dd>
			<dd class="border_top">
				<dl class="btn_pair" ng-hide="pending">
					<dd class="btn_low">
						<button onclick="history.back()" type="button">Quay lại</button>
					</dd>
					<dd class="btn_high">
						<button type="submit">Lưu</button>
					</dd>
				</dl>
			</dd>
		</dl>
	</form>
</div>