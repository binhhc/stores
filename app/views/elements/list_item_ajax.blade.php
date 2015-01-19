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
							<li class="sort_item up" up_down="up" order_value="<?php echo $stt;?>" item_id="{{$item['id']}}">UP</li>
							<li class="sort_item down" up_down="down" order_value="<?php echo $stt;?>" item_id="{{$item['id']}}">DOWN</li>
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
							<dd class="sz_xs tc product_quantity">{{$item['quantity']}}</dd>
							<dd class="sz_s">
								<div class="switch">
									@if ($item['public_flg'] == 0)
									 	<p class="item_status status active" item_id="{{$item['id']}}" public_flg="{{$item['public_flg']}}">Publish</p>
										<p class="grip"></p>
									@else
										<p class="item_status status deactive" style="text-indent: 2em!important" item_id="{{$item['id']}}" public_flg="{{$item['public_flg']}}">Private</p>
										<p class="grip gripdeactive"></p>
									@endif
								</div>
							</dd>
							<dd class="navi">
								<ul>
									<li class="navi_delete" >
										<a class="delete_item" item_id="{{$item['id']}}" href="javascript:(0)">Xoá</a>
									</li>
									<li class="navi_edit" item_id="{{$item['id']}}">
										<a ng-click="edit(item)" href="">Sửa</a>
									</li>
									<li class="navi_share" item_id="{{$item['id']}}">
										<p class="navi_share_btn" ng-class="item_share(item)">Xem</p>
									</li>
								</ul>
							</dd>
						</dl>
					</dd>
				</dl>
				<?php $stt=$stt + 1 ;?>
			@endforeach
<!-- 								{{HTML::image($item['image_url'], 'Hình ảnh sản phẩm', array('width' => 50, 'height' => 50))}}
 -->