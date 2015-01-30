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
    <!-- Mybook/ -->
    <p class="mybook_close hide" style="display: none;">
        Mặt hàng này là một sản phẩm được tạo trong danh sách của tôi
        <span class="delete"><img src="img/items/close2.png"></span>
    </p>
    <!-- /Mybook -->
    <dl class="form_basic">
        <dd>
            <dl class="cols">
            <dt>Tên mặt hàng</dt>
                <dd>
                    <input type="text">
                    <p class="error"></p>
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
                <dt>Giá</dt>
                <dd>
                    <ul>
                        <li>
                            <input type="text" class="sz_s ">
                        </li>
                        <li>Circle</li>
                    </ul>
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
                <dt>Hình mặt hàng</dt>
                <dd>
                    <!-- <input class="fileup" type="file" id="file" name="image" accept="image/jpeg,image/png,image/gif"> -->
                    {{Form::file('image', array('accept'=>'image/jpeg,image/png,image/gif', 'onchange'=>'previewFile()', 'class'=>'fileup'))}}
                    <ul class="images dragdrop image" id="image_back">
                        <!-- ngRepeat: image in item.images -->
                    </ul>
                    <p class="error" style="display: none;">Please upload the item image</p>
                </dd>
            </dl>
        </dd>
        <dd>
            <dl class="cols">
                <dt>Chứng thực mặt hàng</dt>
                <dd>
                    <textarea name="item[description]" cols="30" rows="10"></textarea>
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
                        <ul class="variation_heading" style="display: none;">
                            <li class="v1">Thể loại</li>
                            <li>Số lượng</li>
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
                                    <p>Không giới hạn</p>
                                </div>
                            </li>
                            <li class="delete">
                                <a class="btn_delete" href=""></a>
                            </li>
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

                    @foreach (UserCategory::all() as $cate)
                        <ul class="categories">
                            <li class="name_category">
                                <div class="styled_checkbox">
                                    <input type="checkbox" class="chk_category">
                                    <span class=""></span>
                                </div>
                                <label>{{$cate->name}}</label>
                            </li>
                            <li class="menu_category">
                                <span class="edit_category">
                                    <a href="#">
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
                <button type="submit">Lưu lại</button>
            </dd>
        </dl>
        <dl class="btn_single btn_low none" style="display: none;">
            <button type="button" disabled="" class="send"><span>Đang gửi</span></button>
        </dl>
    </dd>
    </dl>
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
                                {{Form::hidden('id', isset($category['id'])?$category['id']:null, array('class'=>'id_category'))}}
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

<script type="text/javascript">

        //load ajax image
    function previewFile(){
        // var preview = document.querySelector('#image_back'); //selects the query named img
        var file    = document.querySelector('input[type=file]').files[0]; //sames as here
        var reader  = new FileReader();

        reader.onloadend = function () {
            // console.log(preview);
            $('#image_back').html("<li>");
            // preview.‎appendTo("<li>");
            preview.html("<img src="+reader.result+">");
            preview.html("</li>");
        }

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
    }


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

    $(document).on("click", '.chk_category',function() {
        $(this).parent().find('span').toggleClass('checked-true');

        if($(this).parent().find('span').hasClass('checked-true')){
            $(this).attr('check', 'true');
        }else{
            $(this).attr('check', 'false');
        }
    });


    $(document).on("click", '.btn_delete',function(e) {
        e.preventDefault();
        //count ul
        var length_ul = $('#itemSerial > ul.variation').length;
        if(length_ul <= 2){
            $('#itemSerial > ul.variation').hide();
            $('.top_quality').show();
            $('.variation_heading').hide();
        }
        $(this).closest('ul').remove();

    });

    $(document).ready(function(){
        $('.btn_save_category').click(function(){
            var name = $('.category_name').val();
            var id = $('.id_category').val();
            $.ajax({
                type: "POST",
                url: "{{URL::asset('/create_category')}}",
                data: {
                    id : id,
                    name : name,
                },
                global: true,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if(response.success == 1) {

                        return;
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                },
            });
        });

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