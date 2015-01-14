{{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/item_management.css')}}
        {{HTML::script('js/jquery.min.js')}}
         {{HTML::script('js/main_page.js')}}
        @include('elements.header')
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
					<dd class="sz_xs tc">STT</dd>
					<dd class="sz_i"></dd>
					<dd class="sz_l">Tên sản phẩm</dd>
					<dd class="sz_s tr">Giá</dd>
					<dd class="sz_xs tc product_quantity">Số lượng</dd>
					<dd class="sz_s tc publish">Trạng thái</dd>
				</dl>
			</dd>
		</dl>
		@if (count($item) === 0)
		@else
				<dl id="list_public" data-a="1" class="list_items ng-pristine ng-valid ui-sortable" ng-model="items_shown" ui-sortable="items_sortable_options">
					<dd class="items ng-scope" ng-hide="item.animate" ng-repeat="item in items_shown">
						<ul class="sort">
							<li class="up" onclick="orderList('list_public', true); return false;">UP</li>
							<li class="down" onclick="orderList('list_public', false); return false;">DOWN</li>
						</ul>
						<dl class="lists move">
							<dd class="sz_xs tc count ng-binding">1</dd>
							<dd class="sz_i">
								{{HTML::image('img/main_page/oanh.jpg', '', array('width' => 50, 'height' => 50))}}
							</dd>
							<dd class="sz_l">
								<a class="ng-binding" ng-click="edit(item)" href="">item 3</a>
							</dd>
							<dd class="sz_s tr ng-binding">¥123</dd>
							<dd class="sz_xs tc product_quantity">2</dd>
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
		@endif


	</span>
</div>
@include('elements.footer')
<style>
.switch .active, .switch .deactive {
	text-indent: 1em!important;
}
</style>
