@include('elements.header')

{{HTML::style('css/account_setting.css')}}
{{HTML::style('css/item.css')}}
{{HTML::script('js/bootstrap.min.js')}}

<div class="wrapper">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l">Chỉnh sửa mặt hàng</h2>
        <p class="fl_r btn_low">
            <a href="{{URL::asset('/item_management')}}">Danh sách mặt hàng</a>
        </p>
    </div>
    <!-- /Mybook -->
    {{Form::open(array('url' => 'add_item', 'method' => 'post', 'files' => true))}}
    <dl class="form_basic">
        <dd>
            <dl class="cols">
            <dt>Tên mặt hàng</dt>
                <dd>
                    {{Form::text('name', null, array('class'=>'item_name'))}}
                    <p class="error err_name"></p>
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
                <dt>Giá</dt>
                <dd>
                    <ul>
                        <li>
                            {{Form::text('price', null, array('class' => 'sz_s item_price'))}}
                        </li>
                        <li>USD</li>
                    </ul>
                    <p class="error err_price">{{ $errors->first('price') }}</p>
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
                <dt>Hình mặt hàng</dt>
                <dd>
                    <!-- <input class="fileup" type="file" id="file" name="image" accept="image/jpeg,image/png,image/gif"> -->
                    {{Form::file('image_url', array('accept'=>'image/jpeg,image/png,image/gif', 'onchange'=>'previewFile()', 'class'=>'fileup', 'multiple'=>true))}}
                    <ul class="images dragdrop image" id="image_back">
                        <!-- ngRepeat: image in item.images -->
                    </ul>
                    <p class="error err_image"></p>
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
                <dt>Đặc tả</dt>
                <dd>
                    {{Form::textarea('description', null, array('col'=>'30', 'rows'=>10))}}
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
                <dt>Số lượng trong kho</dt>
                <dd>
                    <span id="itemSerial">
                        <ul class="list_items num_wrap top_quality">
                            <li>
                                {{Form::text('quality_single', null, array('class' => 'sz_xs number_quality item_size'))}}
                            </li>
                            <li>
                                <div class="status_lamp">
                                    <span class="a_quality" style="display:none">
                                        <p class="lamp active" name="lamp"></p>
                                    </span>
                                    <span class="d_quality">
                                        <p class="lamp" name="lamp"></p>
                                    </span>
                                    <p>Không giới hạn</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="variation_add">
                            <li>
                                <p>
                                    <a class="btn_variation" href="#">Thêm trường mới</a>
                                </p>
                            </li>
                            <li>S, M, L, etc. của mặt hàng <br>Tôi muốn thêm trường</li>
                        </ul>
                        <p class="error err_size"></p>


                        <ul class="variation_heading" style="display: none;">
                            <li class="v1">Thể loại</li>
                            <li>Số lượng</li>
                        </ul>
                        <!-- ngRepeat: quantity in item.quantities -->
                        <ul class="variation list_items" style="display: none;">
                            <li>
                                {{Form::text('size[]', null, array('class'=>'sz_sm size_quality', 'placeholder'=>'（Ví dụ）S,M,L'))}}
                            </li>
                            <li>
                                {{Form::text('quality[]', null, array('class'=>'sz_xs number_quality'))}}
                            </li>
                            <li>
                                <div class="status_lamp">
                                    <span class="a_quality" style="display: none;">
                                        <p class="lamp active" name="lamp"></p>
                                    </span>
                                    <span class="d_quality">
                                        <p class="lamp" name="lamp"></p>
                                    </span>
                                    <p>Không giới hạn</p>
                                </div>
                            </li>
                            <li class="delete">
                                <a class="btn_delete" href=""></a>
                            </li>
                            <p class="error size_extend" style="letter-spacing: 0em;"></p>
                        </ul>
                    </span>
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
                <dt>Danh mục</dt>
                <dd class="category">
                    <div id="sortable" ui-sortable="categorySortableOptions" class="category_list open ui-sortable">
                        <!-- ngRepeat: category in categories -->

                        @foreach ($category as $cate)
                            <ul class="categories">
                                <li class="name_category">
                                    <div class="styled_checkbox">
                                        <input type="checkbox" class="chk_category">
                                        <span class=""></span>
                                    </div>
                                    {{Form::hidden('category_id[]', $cate->id, array('class'=>'category_id'))}}
                                    <label class="category_name">{{$cate->name}}</label>
                                </li>
                                <li class="menu_category">
                                    <span class="edit_category">
                                        <a href="#" class="btn_edit_category" data-toggle="modal" data-target="#myModal">
                                            {{HTML::image('img/items/icon_category_edit.gif')}}
                                        </a>
                                    </span>
                                    <span>
                                        <a href="" class="btn_delete_category">
                                            {{HTML::image('img/items/icon_category_delete.gif')}}
                                        </a>
                                    </span>
                                    {{HTML::image('img/items/icon_category_move.gif', null,array('class'=>'move_category'))}}
                                </li>
                            </ul>
                        @endforeach

                    </div>
                    <ul class="add_category">
                        <li>
                            <button type="button" class="btn_category" data-toggle="modal" data-target="#myModal">
                                Thêm mới danh mục
                            </button>
                        </li>
                        <li>Nếu cần thiết, hãy thiết lập các danh mục</li>

                    </ul>
                </dd>
            </dl>
        </dd>

        <dd class="border_top">
            <dl class="btn_pair">
                <dd class="btn_low">
                    <a href="{{URL::asset('/item_management')}}">Hủy bỏ</a>
                </dd>
                <dd class="btn_high">
                    <button type="submit" class="btn_submit_item">Lưu lại</button>
                </dd>
            </dl>
            <dl class="btn_single btn_low none" style="display: none;">
                <button type="button" disabled="" class="send"><span>Đang gửi</span></button>
            </dl>
        </dd>
    </dl>
    {{Form::close()}}
</div>


<!-- modal -->
<div id="myModal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="fancybox-wrap fancybox-type-inline fancybox-opened" style="margin: 23% 22%;">
            <div class="fancybox-skin">
                <div class="fancybox-outer">
                    <div class="fancybox-inner" >
                        <div id="add_category_window">
                            <!-- {{Form::open(array('url' => 'create_category', 'method' => 'post'))}} -->
                                {{Form::hidden('id', null, array('class'=>'category_id'))}}
                                {{Form::text('name', null, array('class' => 'category_name', 'placeholder' => 'Điền vào tên danh mục'))}}
                                <dl class="btn_pair">
                                    <dd class="btn_low">
                                        <button type="" data-dismiss="modal">Hủy bỏ</button>
                                    </dd>
                                    <dd class="btn_high">
                                        <button type="" class="btn_save_category" data-dismiss="modal">Lưu</button>
                                    </dd>
                                </dl>
                            <!-- {{Form::close()}} -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hidden" id="new_row_clone">
    <ul class="categories">
        <li class="name_category">
            <div class="styled_checkbox">
                <input type="checkbox" class="chk_category">
                <span class="check_category"></span>
            </div>
            {{Form::hidden('category_id[]', null, array('class'=>'category_id'))}}
            <label class="category_name"></label>
        </li>
        <li class="menu_category">
            <span class="edit_category">
                <a href="#" class="btn_edit_category" data-toggle="modal" data-target="#myModal">
                    {{HTML::image('img/items/icon_category_edit.gif')}}
                </a>
            </span>
            <span>
                <a href="" class="btn_delete_category">
                    {{HTML::image('img/items/icon_category_delete.gif')}}
                </a>
            </span>
            {{HTML::image('img/items/icon_category_move.gif', null, array('class'=>'move_category'))}}
        </li>
    </ul>
</div>

<script type="text/javascript">
    var path_add_category = "{{URL::asset('/create_category')}}";
    var path_delete_category = "{{URL::asset('/delete_category')}}";

    //load ajax image
    function previewFile(){
        // var preview = document.querySelector('#image_back'); //selects the query named img
        var file    = document.querySelector('input[type=file]').files[0]; //sames as here
        var reader  = new FileReader();

        if(!(/\.(gif|jpg|jpeg|tiff|png)$/i).test(file.name)){
            alert('Không đúng định dạng ảnh!');
            $('input[name=image_url]').val('');
            // preview.src = "";
            submit_flg = false;
        }else{
            if(file){
                reader.readAsDataURL(file); //reads the data as a URL
            } else {
                // preview.src = "";
            }
        }

        reader.onloadend = function () {
            var count_img = $('#image_back li').length;
            if(count_img < 4){
                $('#image_back').append("<li><img name=image  src="+reader.result+" width=98 height=87></li>");
            }
        }
    }

</script>

{{HTML::script('js/add_item.js')}}


@include('elements.footer')