<?php echo $this->Html->css(array('item_management'));?>
<?php echo $this->Html->script('jquery.min.js');?>
<?php echo $this->Html->script('item_management.js');?>
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
		<dl id="list_public" data-a="1" class="list_items ng-pristine ng-valid ui-sortable" ng-model="items_shown" ui-sortable="items_sortable_options">
			<dd class="items ng-scope" ng-hide="item.animate" ng-repeat="item in items_shown">
				<ul class="sort">
					<li class="up" onclick="orderList('list_public', true); return false;">UP</li>
					<li class="down" onclick="orderList('list_public', false); return false;">DOWN</li>
				</ul>
				<dl class="lists move">
					<dd class="sz_xs tc count ng-binding">1</dd>
					<dd class="sz_i">
						<img width="50" height="50" alt=""  src="/img/main_page/oanh.jpg">
					</dd>
					<dd class="sz_l">
						<a class="ng-binding" ng-click="edit(item)" href="">item 3</a>
					</dd>
					<dd class="sz_s tr ng-binding">¥123</dd>
					<dd class="sz_xs tc ng-binding">2</dd>
					<dd class="sz_s">
						<div class="switch">
							<p class="status active" ng-click="hide(item)">Publish</p>
							<p class="grip"></p>
						</div>
					</dd>
					<dd class="navi">
						<ul>
							<li class="navi_delete">
								<a ng-click="delete(item, '削除してもよろしいですか？')" href="">Xoá</a>
							</li>
							<li class="navi_edit">
								<a ng-click="edit(item)" href="">Sửa</a>
							</li>
							<li class="navi_share">
								<p class="navi_share_btn" ng-class="item_share(item)">Xem</p>
							</li>
						</ul>
					</dd>
				</dl>
			</dd>
		</dl>
		<dl id="list_public" data-a="2" class="list_items ng-pristine ng-valid ui-sortable" ng-model="items_shown" ui-sortable="items_sortable_options">
			<dd class="items ng-scope" ng-hide="item.animate" ng-repeat="item in items_shown">
				<ul class="sort">
					<li class="up" onclick="orderList('list_public', true); return false;">UP</li>
					<li class="down" onclick="orderList('list_public', false); return false;">DOWN</li>
				</ul>
				<dl class="lists move">
					<dd class="sz_xs tc count ng-binding">2</dd>
					<dd class="sz_i">
						<img width="50" height="50" alt=""  src="/img/main_page/oanh.jpg">
					</dd>
					<dd class="sz_l">
						<a class="ng-binding" ng-click="edit(item)" href="">item 3</a>
					</dd>
					<dd class="sz_s tr ng-binding">¥123</dd>
					<dd class="sz_xs tc ng-binding">2</dd>
					<dd class="sz_s">
						<div class="switch">
							<p class="status active" ng-click="hide(item)">Publish</p>
							<p class="grip"></p>
						</div>
					</dd>
					<dd class="navi">
						<ul>
							<li class="navi_delete">
								<a ng-click="delete(item, '削除してもよろしいですか？')" href="">Xoá</a>
							</li>
							<li class="navi_edit">
								<a ng-click="edit(item)" href="">Sửa</a>
							</li>
							<li class="navi_share">
								<p class="navi_share_btn" ng-class="item_share(item)">Xem</p>
							</li>
						</ul>
					</dd>
				</dl>
			</dd>
		</dl>
		<dl id="list_public" data-a="3" class="list_items ng-pristine ng-valid ui-sortable" ng-model="items_shown" ui-sortable="items_sortable_options">
			<dd class="items ng-scope" ng-hide="item.animate" ng-repeat="item in items_shown">
				<ul class="sort">
					<li class="up" onclick="orderList('list_public', true); return false;">UP</li>
					<li class="down" onclick="orderList('list_public', false); return false;">DOWN</li>
				</ul>
				<dl class="lists move">
					<dd class="sz_xs tc count ng-binding">3</dd>
					<dd class="sz_i">
						<img width="50" height="50" alt=""  src="/img/main_page/oanh.jpg">
					</dd>
					<dd class="sz_l">
						<a class="ng-binding" ng-click="edit(item)" href="">item 3</a>
					</dd>
					<dd class="sz_s tr ng-binding">¥123</dd>
					<dd class="sz_xs tc ng-binding">2</dd>
					<dd class="sz_s">
						<div class="switch">
							<p class="status active" ng-click="hide(item)">Publish</p>
							<p class="grip"></p>
						</div>
					</dd>
					<dd class="navi">
						<ul>
							<li class="navi_delete">
								<a ng-click="delete(item, '削除してもよろしいですか？')" href="">Xoá</a>
							</li>
							<li class="navi_edit">
								<a ng-click="edit(item)" href="">Sửa</a>
							</li>
							<li class="navi_share">
								<p class="navi_share_btn" ng-class="item_share(item)">Xem</p>
							</li>
						</ul>
					</dd>
				</dl>
			</dd>
		</dl>
	</span>
</div>
