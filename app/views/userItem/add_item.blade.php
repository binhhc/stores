{{HTML::style('css/account_setting.css')}}
{{HTML::style('css/item.css')}}
@include('elements.header')

<div class="wrapper">
  <div class="heading_box clearfix">
    <h2 class="heading fl_l"><font><font>Chỉnh sửa mặt hàng</font></font></h2>
    <p class="fl_r btn_low">
        <a href="{{URL::asset('/item_management')}}"><font><font>Danh sách mặt hàng</font></font></a>
    </p>
    </div>
    <!-- Mybook/ -->
    <p class="mybook_close hide" ng-show="item.mybook_item" style="display: none;"><font><font>
        Mặt hàng này là một sản phẩm được tạo trong danh sách của tôi
        </font></font><span class="delete"><img src="img/items/close2.png"></span>
    </p>
    <!-- /Mybook -->
    <dl class="form_basic">
        <dd>
            <dl class="cols">
            <dt><font><font>Tên mặt hàng</font></font></dt>
                <dd>
                    <input type="text">
                    <p class="error"></p>
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
                <dt><font><font>Giá</font></font></dt>
                <dd>
                    <ul>
                        <li>
                            <input type="text" class="sz_s ">
                        </li>
                        <li><font><font>Circle</font></font></li>
                    </ul>
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
                <dt><font><font>Hình mặt hàng</font></font></dt>
                <dd>
                    <input class="fileup" type="file" id="file" name="image" accept="image/jpeg,image/png,image/gif">
                    <ul class="images dragdrop image" id="image_back">
                        <!-- ngRepeat: image in item.images -->
                    </ul>
                    <p class="error" style="display: none;"><font><font>Please upload the item image</font></font></p>
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
                <dt><font><font>Chứng thực mặt hàng</font></font></dt>
                <dd>
                    <textarea name="item[description]" cols="30" rows="10" class="ng-pristine ng-valid"></textarea>
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
                <dt><font><font>Số lượng trong kho</font></font></dt>
                <dd>
                    <span id="itemSerial">
                        <ul class="list_items num_wrap top_quality">
                            <li>
                                <input class="sz_xs number" type="text">
                            </li>
                            <li>
                                <div class="status_lamp">
                                    <span class="a_quality" style="display:none">
                                        <p class="lamp active" name="lamp"></p>
                                    </span>
                                    <span class="d_quality">
                                        <p class="lamp" name="lamp"></p>
                                    </span>
                                    <p><font><font>Không giới hạn</font></font></p>
                                </div>
                            </li>
                        </ul>
                        <ul class="variation_add">
                            <li>
                                <p>
                                    <a class="btn_variation" href="#"><font><font>Thêm trường mới</font></font></a>
                                </p>
                            </li>
                            <li><font><font>S, M, L, etc. của mặt hàng </font></font><br><font><font>Tôi muốn thêm trường</font></font></li>
                        </ul>
                        <ul class="variation_heading" style="display: none;">
                            <li class="v1"><font><font>Thể loại</font></font></li>
                            <li><font><font>Số lượng</font></font></li>
                        </ul>
                        <!-- ngRepeat: quantity in item.quantities -->
                        <ul class="variation list_items" style="display: none;">
                            <li>
                                <input class="sz_sm" type="text" placeholder="（Ví dụ）S,M,L">
                            </li>
                            <li>
                                <input class="sz_xs number" type="text">
                            </li>
                            <li>
                                <div class="status_lamp">
                                    <span class="a_quality" style="display: none;">
                                        <p class="lamp active" name="lamp"></p>
                                    </span>
                                    <span class="d_quality">
                                        <p class="lamp" name="lamp"></p>
                                    </span>
                                    <p><font><font>Không giới hạn</font></font></p>
                                </div>
                            </li>
                            <li class="delete">
                                <a class="btn_delete" href=""></a>
                            </li>
                        </ul>
                    </span>
                    <!-- Mybook/ -->
                    <p class="variation_mybook hide" style="display: none;"><span class="ng-binding"><font><font>1</font></font></span><font><font> piece</font></font></p>
                    <!-- /Mybook -->
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
            <dt><font><font>Danh mục</font></font></dt>
            <dd class="category">
                <div id="sortable" ui-sortable="categorySortableOptions" class="category_list open ng-pristine ng-valid ui-sortable" ng-model="categories">
                    <!-- ngRepeat: category in categories -->
                    <ul class="categories">
                        <li class="name_category">
                            <div class="styled_checkbox">
                                <input type="checkbox">
                                <span class="checked-"></span>
                            </div>
                            <label><font><font>Ao</font></font></label>
                        </li>
                        <li class="menu_category">
                            <span class="edit_category">
                                <a href="#add_category_window">
                                    <img src="img/items/icon_category_edit.gif">
                                </a>
                            </span>
                            <span>
                                <a href="">
                                    <img src="img/items/icon_category_delete.gif">
                                </a>
                            </span>
                            <img class="move_category" src="img/items/icon_category_move.gif">
                        </li>
                    </ul>
                </div>
                <ul class="add_category">
                    <li><a class="btn_category" href="#add_category_window"><font><font>Thêm mới danh mục</font></font></a></li>
                    <li><font><font>Nếu cần thiết, hãy thiết lập các danh mục</font></font></li>
                </ul>
            </dd>
        </dl>
    </dd>
    <dd sp-controller="StickerController" addon="sticker" sp-show="" style="display: none;">
      <dl class="cols">
        <dt><font><font>Seal</font></font></dt>
        <dd class="select_sticker">
          <ul class="select_btn">
            <li>
              <div class="styled_radio">
                <input name="sticker" type="radio" value="new" id="radio_new" ng-model="sticker.selected_category" class="ng-pristine ng-valid">
                <span class="checked-false"></span>
              </div>
              <label for="radio_new"><font><font>NEW</font></font></label>
            </li>
            <li>
              <div class="styled_radio">
                <input name="sticker" type="radio" value="hot" id="radio_hot" ng-model="sticker.selected_category" class="ng-pristine ng-valid">
                <span class="checked-false"></span>
              </div>
              <label for="radio_hot"><font><font>HOT</font></font></label>
            </li>
            <li>
              <div class="styled_radio">
                <input name="sticker" type="radio" value="sale" id="radio_sale" ng-model="sticker.selected_category" class="ng-pristine ng-valid">
                <span class="checked-false"></span>
              </div>
              <label for="radio_sale"><font><font>SALE</font></font></label>
            </li>
          </ul>
          <div id="select_box">
            <div ng-show="sticker.selected_category == 'new'" style="display: none;">
              <ul>
                <!-- ngRepeat: image in table.news1 -->
                <!-- ngRepeat: image in table.news2 -->
              </ul>
            </div>
            <div ng-show="sticker.selected_category == 'hot'" style="display: none;">
              <ul>
                <!-- ngRepeat: image in table.hots1 -->
                <!-- ngRepeat: image in table.hots2 -->
              </ul>
            </div>
            <div ng-show="sticker.selected_category == 'sale'" style="display: none;">
              <ul>
                <!-- ngRepeat: image in table.sales1 -->
                <!-- ngRepeat: image in table.sales2 -->
              </ul>
            </div>
          </div>
        </dd>
      </dl>
    </dd>
    <dd ng-hide="digital_template">
      <dl class="cols" sp-show="detail_shipping_fee" style="display: none;">
        <dt><font><font>Shipping means</font></font></dt>
        <dd>
          <div class="styled_select_thick">
            <select name="delivery_method" ng-model="deliveryMethod" ng-options="method.name for method in deliveryMethods" class="ng-pristine ng-valid"><option value="?" selected="selected"></option></select>
            <span class="ng-binding"></span>
          </div>
        </dd>
      </dl>
    </dd>
    <dd ng-show="info.promotion_config.e &amp;&amp; !digital_template" style="display: none;">
      <dl class="cols">
        <dt><font><font>For promotion</font></font></dt>
        <dd class="promotion_category">
          <form name="popup_category_form" novalidate="" class="ng-pristine ng-invalid ng-invalid-required">
            <ul>
              <li>
                <p class="category_title"><font><font>Type</font></font></p>
                <ul class="type">
                  <li>
                    <div class="styled_radio">
                      <input type="radio" name="" ng-value="false" id="radio_type_new" ng-model="used" class="ng-pristine ng-valid" value="false">
                      <span ng-class="{'checked-true': used == false}"></span>
                    </div>
                    <label for="radio_type_new"><font><font>Brand new</font></font></label>
                  </li>
                  <li>
                    <div class="styled_radio">
                      <input type="radio" name="" ng-value="true" id="radio_type_used" ng-model="used" class="ng-pristine ng-valid" value="true">
                      <span ng-class="{'checked-true': used == true}"></span>
                    </div>
                    <label for="radio_type_used"><font><font>Second hand</font></font></label>
                  </li>
                </ul>
              </li>
              <li>
                <p class="category_title"><font><font>Large category</font></font></p>
                <div class="styled_select_thin">
                  <select name="category_large" ng-model="category_large" ng-change="change_category_large(category_large)" ng-options="cat_large[0] as cat_large[1] for cat_large in categories_large" required="" class="ng-pristine ng-invalid ng-invalid-required"><option value="" class=""></option></select>
                  <span class="ng-binding"></span>
                </div>
                <p class="error" ng-show="error.promotion_category" style="display: none;"><font><font>Please select the large category</font></font></p>
              </li>
              <li>
                <p class="category_title"><font><font>Medium category</font></font></p>
                <div class="styled_select_thin">
                  <select ng-model="category_middle" ng-change="change_category_middle(category_middle)" ng-disabled="!categories_middle.length" ng-options="cat_middle[0] as cat_middle[1] for cat_middle in categories_middle" class="ng-pristine ng-valid" disabled="disabled"><option value="" class=""></option></select>
                  <span ng-class="{'disabled-true':!categories_middle.length}" class="ng-binding disabled-true"></span>
                </div>
              </li>
              <li class="end">
                <p class="category_title"><font><font>Small category</font></font></p>
                <div class="styled_select_thin">
                  <select ng-model="category_small" ng-change="change_category_small(category_small)" ng-disabled="!categories_small.length" ng-options="cat_small[0] as cat_small[1] for cat_small in categories_small" class="ng-pristine ng-valid" disabled="disabled"><option value="" class=""></option></select>
                  <span ng-class="{'disabled-true':!categories_small.length}" class="ng-binding disabled-true"></span>
                </div>
              </li>
            </ul>
            <!-- ToranoanaMarket/ -->
            <div class="inner_l top" ng-show="disp_r18_check()" style="display: none;">
              <div class="styled_checkbox with_label">
                <input type="checkbox" id="r18" ng-model="for_adult" class="ng-pristine ng-valid">
                <span class="checked-"></span>
              </div>
              <label for="r18"><font><font>Including 18 prohibited content</font></font></label>
            </div>
            <!-- /ToranoanaMarket -->
          </form>
        </dd>
      </dl>
    </dd>
    <dd ng-show="mall == 'parco'" style="display: none;">
      <dl class="cols">
        <dt><font><font>For mall</font></font></dt>
        <dd class="category">
          <ul class="p_mall">
            <!-- ngRepeat: option_field in mall_categories.option_fields -->
          </ul>
          <ul class="p_mall">
            <li>
              <p class="category_title"><font><font>Large category</font></font></p>
              <div class="styled_select_thin">
                <select ng-model="item.mall_large_category_id" ng-options="l_cat.id as l_cat.name for l_cat in mall_categories.large_categories" class="ng-pristine ng-valid"><option value="?" selected="selected"></option></select>
                <span ng-bind="find_object_by_id(mall_categories.large_categories, item.mall_large_category_id).name" class="ng-binding"></span>
              </div>
            </li>
          </ul>
          <ul class="p_mall">
            <li>
              <p class="category_title"><font><font>Medium category</font></font></p>
              <div class="styled_select_thin">
                <select ng-model="item.mall_medium_category_id" ng-options="m_cat.id as m_cat.name for m_cat in mall_medium_categories" class="ng-pristine ng-valid"><option value="?" selected="selected"></option></select>
                <span ng-bind="find_object_by_id(mall_medium_categories, item.mall_medium_category_id).name" class="ng-binding"></span>
              </div>
            </li>
          </ul>
        </dd>
      </dl>
    </dd>
    <dd>
      <dl class="cols" ng-show="digital_template" style="display: none;">
        <dt><font><font>File upload</font></font></dt>
        <dd>
          <span ng-show="dl_status.first"><input class="fileup" type="file" id="file" name="digital_contents" size="" accept=" image/jpeg,image/png,image/gif,application/pdf,text/css,text/html,text/plain,text/richtext,audio/basic,audio/mpeg,audio/mp3,audio/x-aiff,audio/x-midi,audio/wav,audio/x-midi,video/mpeg,video/quicktime,video/x-msvideo,video/x-ms-asf,video/x-sgi-movie,application/zip,application/x-zip"></span>
          <div id="extendedprogressbar" name="extendedprogressbar" style="width: 298px; height: 45px; display: none;" ng-show="dl_status.progress" class="extendedprogressbarframe vtip" title="0/100 (0%)"><div class="full_horizontal_bar ltr_bar" style="left: 0px; width: 0px;"></div><div class="empty_horizontal_bar full_radius" style="right: 0px; width: 298px;"></div><div class="horizontal_bar_image ltr_bar" style="width: 0px;"></div><div class="bars_holder" style="display: inline; position: relative; z-index: 2;"><div class="normal_progress horizontalextendedprogressbar normal_bar left_radius" style="width: 0px; background-color: rgb(12, 133, 207);"></div><div class="critical_progress critical_bar horizontalextendedprogressbar" style="width: 0px; background-color: rgb(12, 133, 207);"></div><div class="separator horizontalextendedprogressbar" style="width: 0px; height: 0px;"></div><div class="overflow_bar horizontalextendedprogressbar" style="width: 0px; background-color: rgb(227, 62, 118);"></div></div><span class="label_holder percentage_label" style="color: rgb(0, 0, 0);"></span><span class="label_holder value_label" style="color: rgb(0, 0, 0);"></span><span class="label_holder minval_label" style="color: rgb(0, 0, 0);"></span><span class="label_holder maxval_label" style="color: rgb(0, 0, 0);"></span></div>
          <div class="dl_finish" ng-show="dl_status.uploaded" style="display: none;">
            <div class="box">
              <span class="delete"><a href=""><img src="img/items/btn_image_delete.gif" alt="btn_image_delete" width="16" height="16"></a></span>
              <div class="dl_sales  clearfix">
                <p class="file_name ng-binding"></p>
                <p class="volume ng-binding"></p>
              </div>
            </div>
          </div>
          <p class="error" ng-show="false" style="display: none;"><font><font>Please select the file</font></font></p>
          <p class="error" ng-show="error.digital_contents" style="display: none;"><font><font>Please select the file if you want to sell digital content</font></font></p>
        </dd>
      </dl>
    </dd>
    <dd class="border_top">
        <dl class="btn_pair" ng-hide="pending">
            <dd class="btn_low">
                <button type="button" onclick="URL::asset('/item_management')"><font><font>Hủy bỏ</font></font></button>
            </dd>
            <dd class="btn_high">
                <button type="submit"><font><font>Lưu lại</font></font></button>
            </dd>
        </dl>
        <dl class="btn_single btn_low none" ng-show="pending" style="display: none;"><button type="button" disabled="" class="send"><span><font><font>During transmission</font></font></span></button></dl>
    </dd>
  </dl>
</div>

<script type="text/javascript">
    $(document).on("click", '.d_quality',function() {
        $(this).hide();
        $(this).parent().find('span.a_quality').show();
        $(this).closest('ul').find('input.number').val('').attr('disabled', 'true');
    });

    $(document).on("click", '.a_quality',function() {
        $(this).hide();
        $(this).parent().find('span.d_quality').show();
        $(this).closest('ul').find('input.number').removeAttr('disabled');
    });

    $(document).on("click", '.btn_delete',function(e) {
        e.preventDefault();
        $(this).closest('ul').find('variation').hide();
    });

    $(document).ready(function(){
        $('.btn_variation').click(function(e){
            e.preventDefault();
            $('.top_quality').hide();
            $('.variation_heading').show();
            $('.variation').show();
            $('.variation:first').clone().appendTo('#itemSerial');
        });
    });
</script>


@include('elements.footer')