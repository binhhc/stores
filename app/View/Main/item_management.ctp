<?php echo $this->Html->css(array('item_management'));?>
<div class="wrapper">
	<div class="heading_box clearfix">
		<h2 class="heading fl_l">Danh sách mặt hàng</h2>
		<ul id="select_item">
			<li>
				<p class="btn_high">
					<a href="">Thêm hàng</a>
				</p>
			</li>
		</ul>
	</div>
	<span>
		<dl class="list_items">
			<dd class="title">
				<dl>
					<dd class="sz_xs tc">No</dd>
					<dd class="sz_i"></dd>
					<dd class="sz_l">Tên</dd>
					<dd class="sz_s tr">Giá</dd>
					<dd class="sz_xs tc">Số lượng</dd>
					<dd class="sz_s tc publish">Tình trạng</dd>
				</dl>
			</dd>
		</dl>
		<dl id="list_public" class="list_items ng-pristine ng-valid ui-sortable" ng-model="items_shown" ui-sortable="items_sortable_options">
			<dd class="items ng-scope" ng-hide="item.animate" ng-repeat="item in items_shown">
				<ul class="sort">
					<li class="up" ng-click="swap(item, -1)">UP</li>
					<li class="down" ng-click="swap(item, +1)">DOWN</li>
				</ul>
			</dd>
		</dl>
	</span>
</div>