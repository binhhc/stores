@if (count($items) === 0)
    <span ng-hide="items.length">
        <div id="nodata" ng-hide="orders.length">
            <p>
                {{HTML::image('img/main_page/icon_nodata1.png', '', array('width' => 301, 'height' => 297))}}
            </p>
            <h3>Không có thông tin mặt hàng</h3>
        </div>
    </span>
    @else
 <div id="sortable">
		@foreach ($items as $item)
				<dl id="list_public" class="list_items <?php echo ($item['public_flg'] == 1) ?  'ui-state-enabled' : ''?>">
					<dd class="items ng-scope" ng-hide="item.animate" ng-repeat="item in items_shown">
					@if ($item['public_flg'] == 1)
						<ul class="sort">
							<li class="sort_item up" up_down="up" order_value="<?php echo $item['order'];?>" item_id="{{$item['id']}}">UP</li>
							<li class="sort_item down" up_down="down" order_value="<?php echo $item['order']?>" item_id="{{$item['id']}}">DOWN</li>
						</ul>
					@endif
						<dl class="lists move" id="<?php echo $item['id']?>" order_value="<?php echo $item['order']?>">
							<dd class="sz_xs tc count ng-binding">@if ($item['public_flg'] == 1)<?php echo $item['order'];?> @endif</dd>
							<dd class="sz_i">
								{{HTML::image($item['image_url'], 'Hình ảnh sản phẩm', array('width' => 50, 'height' => 50))}}
							</dd>
							<dd class="sz_l">
								<a class="ng-binding" ng-click="edit(item)" href=""><?php echo (strlen($item['name']) > 50) ? substr($item['name'], 0, 50). "..." : $item['name']?></a>
							</dd>
							<dd class="sz_s tr ng-binding">{{$item['price']}}</dd>
							<dd class="sz_xs tc product_quantity">{{$item['quantity']}}</dd>
							<dd class="sz_s">
								<div class="switch">
									@if ($item['public_flg'] == 1)
									 	<p class="item_status status active" item_id="{{$item['id']}}" public_flg="{{$item['public_flg']}}">Công bố</p>
										<p class="grip"></p>
									@else
										<p class="item_status status deactive" style="text-indent: 2em!important" item_id="{{$item['id']}}" public_flg="{{$item['public_flg']}}">Riêng tư</p>
										<p class="grip gripdeactive"></p>
									@endif
								</div>
							</dd>
							 <dd class="navi">
                                <ul>
                                    <li class="navi_delete" >
                                        <a class="delete_item" item_id="{{$item['id']}}" href="javascript:(0)">Xoá</a>
                                    </li>
                                    <li class="navi_edit">
                                        <a href="{{URL::asset('/edit_item/'.Crypt::encrypt($item['id']))}}">Sửa</a>
                                    </li>
                                    <li class="navi_share" item_id="{{$item['id']}}">
                                        <p class="navi_share_btn_true" ng-class="item_share(item)">Chia sẻ</p>
                                        @if ($item['public_flg'] == 1)
                                        <ul class="baloon1 navi_share_baloon tooltip_share{{$item['id']}}" ng-class="{navi_share_baloon: is_postable_parco_blog(item) == false && is_exblog == false && is_postable_parcocity_blog(item) == false}" data-share-display="false" style="display: none;">
											<li class="navi_share_fb">
												<div class="fb-share-button" data-layout="icon_link"><a ng-click="postToFeedItem(item)" class="share_facebook" href="" item_name="{{$item['name']}}" image_url="{{$item['image_url']}}">Chia sẻ</a></div>
											</li>
											<li class="navi_share_tw" >
												<a ng-click="share_sns(item)" class="twitter popup" item_id="{{$item['id']}}" href="http://twitter.com/intent/tweet?ount=none&lang='vi'&text={{$item['name']}} / https%3A%2F%2Foanhht.stores.vn%2F%28883!%2Fitems%2F54bf2b9986b188c7540009f9 @stores_vn" target="_blank">Tweet</a>
											</li>
										</ul>
										@endif
                                    </li>
                                </ul>
                            </dd>
						</dl>
					</dd>
				</dl>
			@endforeach
			<input type="hidden" name="count_public_item" class="count_public_items" value="{{$count_public_items}}" >
	</div>
<!-- 								{{HTML::image($item['image_url'], 'Hình ảnh sản phẩm', array('width' => 50, 'height' => 50))}}
 -->
 @endif