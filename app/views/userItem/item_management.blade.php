{{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/item_management.css')}}
        {{HTML::script('js/jquery.min.js')}}
         {{HTML::script('js/item_management.js')}}
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
	@if (count($items) === 0)

	<span ng-hide="items.length">
		<div id="nodata" ng-hide="orders.length">
			<p>
				{{HTML::image('img/main_page/icon_nodata.png', '', array('width' => 301, 'height' => 297))}}
			</p>
			<h3>Không có thông tin mặt hàng</h3>
		</div>
	</span>
	@else
	<div class="items_contents">
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
		<?php $stt = 1;?>
		@foreach ($items as $item)
				<dl id="list_public" data-a="1" class="list_items ng-pristine ng-valid ui-sortable" ng-model="items_shown" ui-sortable="items_sortable_options">
					<dd class="items ng-scope" ng-hide="item.animate" ng-repeat="item in items_shown">
					@if ($item['public_flg'] == 0)
						<ul class="sort">
							<li class="sort_item up" order_value="1" item_id="{{$item['id']}}">UP</li>
							<li class="sort_item down" order_value="0" item_id="{{$item['id']}}">DOWN</li>
						</ul>
					@endif
						<dl class="lists move">
							<dd class="sz_xs tc count ng-binding"><?php echo $stt;?></dd>
							<dd class="sz_i">
							</dd>
							<dd class="sz_l">
								<a class="ng-binding" ng-click="edit(item)" href="">{{$item['name']}}</a>
							</dd>
							<dd class="sz_s tr ng-binding">{{$item['price']}}</dd>
							<dd class="sz_xs tc product_quantity">2</dd>
							<dd class="sz_s">
								<div class="switch">
									@if ($item['public_flg'] == 0)
									 	<p class="status active" item_id="{{$item['id']}}" public_flg="{{$item['public_flg']}}">Publish</p>
										<p class="grip"></p>
									@else
										<p class="status deactive" item_id="{{$item['id']}}" public_flg="{{$item['public_flg']}}">Private</p>
										<p class="grip"></p>
									@endif
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
				<?php $stt=$stt + 1 ;?>
			@endforeach
	</div>
	@endif
</div>
@include('elements.footer')
<style>
.switch .active, .switch .deactive {
	text-indent: 1em!important;
}
</style>
