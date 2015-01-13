<?php echo $this->Html->css(array('item_management')); ?>
<div class="wrapper ng-scope">
<?php echo Form::open(array('url' => 'foo/bar', 'method' => 'put'))?>
		<h2 class="heading">Thay đổi địa chỉ URL</h2>
		<dl class="form_basic">
			<dd>
				<dl class="cols form_basic">
					<dt>Thay đổi địa chỉ URL</dt>
					<dd>
						<div class="big url">
							<span class="first">https://</span>
								<?php echo Form::email('url', $value = null, $attributes = array());?>
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
						<?php echo Form::submit('Lưu', array());?>
					</dd>
				</dl>
			</dd>
		</dl>
		<?php echo Form::close();?>
</div>