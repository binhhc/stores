@include('elements.header')
<script src="//connect.facebook.net/vi_VN/all.js"></script>
{{HTML::script('/js/jquery-ui.min.js')}}
 {{HTML::script('/js/item_management.js')}}
 <?php if(Session::has('success')) {?>
<div id="alert_panel" class="success" style="display: block; opacity: 1.0; top: -10px;">
    <p><?php echo Session::get('success');?></p>
</div>
<?php }?>
<?php $d_a = Session::get('userStoresDomain'); ?>
<div id="alert_panel" class="success" style="display: none; opacity: 1.0; top: -10px;">
    <p>Đã xoá thành công!</p>
</div>
<div class="wrapper">
    <div class="heading_box clearfix">
         <h2 class="heading fl_l">Danh sách mặt hàng</h2>
        <ul id="select_item">
            <li>
                <p class="btn_high">
                    <a href="{{URL::asset('/add_item')}}">Thêm hàng</a>
                </p>
            </li>
        </ul>
    </div>
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
        <div id="sortable">
        @foreach ($items as $item)
                <dl id="list_public" class="list_items <?php echo ($item['public_flg'] == 1) ? 'ui-state-enabled' : ''?>">
                    <dd class="items ng-scope" ng-hide="item.animate" ng-repeat="item in items_shown">
                    @if ($item['public_flg'] == 1)
                        <ul class="sort">
                            <li class="sort_item up" up_down="up" order_value="<?php echo $item['order'];?>" item_id="{{$item['id']}}">UP</li>
                            <li class="sort_item down" up_down="down" order_value="<?php echo $item['order'];?>" item_id="{{$item['id']}}">DOWN</li>
                        </ul>
                    @endif
                        <dl class="lists move" id="<?php echo $item['id']?>" order_value="<?php echo $item['order']?>">
                            <dd class="sz_xs tc count ng-binding">@if ($item['public_flg'] == 1) <?php echo $item['order'] ;?> @endif</dd>
                            <dd class="sz_i">
                                {{HTML::image($item['image_url'], 'Hình ảnh sản phẩm', array('width' => 50, 'height' => 50))}}
                            </dd>
                            <dd class="sz_l">
                                <a href="{{URL::asset('/edit_item/'.Crypt::encrypt($item['id']))}}"><?php echo (strlen($item['name']) > 50) ? substr($item['name'], 0, 50). "..." : $item['name']?></a>
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
												<a ng-click="share_sns(item)" class="twitter popup" item_id="{{$item['id']}}" href="http://twitter.com/intent/tweet?ount=none&lang='vi'&text={{$item['name']}} / https%3A%2F%2F<?php echo $d_a['domain'].'.'.  Config::get('constants.domain') ; ?>%2F%28883!%2Fitems%2F<?php echo $item['id']?> @stores_vn" target="_blank">Tweet</a>
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
            </div>
            <input type="hidden" name="count_public_item" class="count_public_items" value="{{$count_public_items}}" >
    </div>
    @endif
</div>
<div class="loading ng-scope" ng-show="state == 'wait'" style="display: none;"></div>
@include('elements.footer')
<input type="hidden" name="facebook_id" class="facebook_app_id" value="{{$app_id}}"/>
<input type="hidden" name="website_url" class="website_url" value="<?php echo Config::get('constants.website_name');?>"/>
<style>
 .switch .deactive {
    text-indent: 1em!important;
}
.wrapper {
    margin: 50px auto 0;
    width: 792px!important;
}
.switch .active {
    text-indent: 0.5em!important;
}
</style>

<div id="fb-root"></div>
<script>
var app_id = $('.facebook_app_id').val();
window.fbAsyncInit = function() {
    FB.init({
      appId      : app_id,
      xfbml      : true,
      version    : 'v2.2'
    });
  };
</script>
