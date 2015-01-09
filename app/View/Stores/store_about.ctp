<?php echo $this->Html->css(array('item_management')); ?>
<div class="wrapper ng-scope">
	<h2 class="heading">ストアURL</h2>
	<form class="ng-pristine ng-valid" ng-submit="submit()" name="form">
		<dl class="form_basic form_multi">
			<dd>
				<dl class="cols">
					<dt>Mô tả</dt>
					<dd>
						<textarea class="ng-pristine ng-valid" ng-model="data.detail" placeholder="ストアの説明をご記入ください" style="width:500px; height:200px;"></textarea>
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
							<li class="sz_fix">ホームページ</li>
							<li>
								<input class="ng-pristine ng-valid" type="text" ng-model="data.links.website" placeholder="http://www.stores.jp/">
							</li>
						</ul>
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