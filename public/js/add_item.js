$(document).on("click", '.d_quality',function() {
        $(this).hide();
        $(this).parent().find('span.a_quality').show();
        $(this).closest('ul').find('input.number_quality').val('').attr('readonly', 'true');
    });

    $(document).on("click", '.a_quality',function() {
        $(this).hide();
        $(this).parent().find('span.d_quality').show();
        $(this).closest('ul').find('input.number_quality').removeAttr('readonly');
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
            $('#itemSerial > ul.variation.list_items input').prop('disabled', true);
            $('.top_quality').show();
            $('.top_quality input.number_quality.item_size').prop('disabled', false);
            $('.variation_heading').hide();
        }
        $(this).closest('ul').remove();

    });


    $(document).ready(function(){
        //validate before submit
        $('.btn_submit_item').click(function(e){
            //validate item name
            var flg_name = flg_price = flg_size = flg_image = flg_size_extend = flg_quality_extend = true;

            var item_name = $('.item_name').val();
            if(item_name.length == 0){
                flg_name = false;
                $('.err_name').empty();
                $('.err_name').append('Vui lòng điền vào tên mặt hàng');
            }else{
                flg_name = true;
                $('.err_name').empty();
            }

            //validate item price
            var item_price = $('.item_price').val();
            if(item_price.length == 0 || !$.isNumeric(item_price)){
                flg_price = false;
                $('.err_price').empty();
                $('.err_price').append('Vui lòng điền vào giá mặt hàng');
            }else if(item_price < 100){
                flg_price = false;
                $('.err_price').empty();
                $('.err_price').append('Vui lòng điền giá mặt hàng lớn hơn 100');
            }else{
                flg_price = true;
                $('.err_price').empty();
            }

            //validate image
            var item_image = $('#image_back li').length;
            if(item_image < 1){
                flg_image = false;
                $('.err_image').empty();
                $('.err_image').append('Vui lòng tải lên hình ảnh mặt hàng');
            }else{
                flg_image = true;
                $('.err_image').empty();
            }

            //validate size simple
            if($('.top_quality').is(':visible')){
                if($('.item_size').attr('readonly') == 'readonly'){
                    flg_size = true;
                    $('.err_size').empty();
                }else{
                    var size = $('.item_size').val();
                    if(size.length == 0 || !$.isNumeric(size)){
                        flg_size = false;
                        $('.err_size').empty();
                        $('.err_size').append('Vui lòng nhập số lượng mặt hàng');
                    }else{
                        flg_size = true;
                        $('.err_size').empty();
                    }
                }
            }

            var arr_size = ['S', 'L', 'M', 's', 'l', 'm'];
            if($('.variation.list_items').is(':visible')){
                $('.variation.list_items').each(function(){
                    var size_quality = $(this).find('.size_quality').val();
                    var number_quality = $(this).find('.number_quality').val();

                    if(!size_quality.trim() || $.inArray(size_quality, arr_size) == -1){
                        console.log($(this));
                        flg_size_extend = false;
                        $(this).find('.size_extend').empty();
                        $(this).find('.size_extend').append('Vui lòng nhập kích cỡ');
                    }else{
                        flg_size_extend = true;
                        $(this).find('.size_extend').empty();
                        if ($(this).find('.number_quality').is('[readonly]')) {
                            flg_quality_extend = true;
                            $(this).find('.size_extend').empty();
                        } else {
                            if(number_quality.length == 0 || !$.isNumeric(number_quality)){
                                flg_quality_extend = false;
                                $(this).find('.size_extend').empty();
                                $(this).find('.size_extend').append('Vui lòng nhập số lượng');
                            }else{
                                flg_quality_extend = true;
                                $(this).find('.size_extend').empty();
                            }
                        }
                    }
                });
            }

            //disabled input category not check
            $('.categories:visible').each(function(){
                if(!$(this).find('.chk_category').is(':checked')){
                    $(this).find('.category_id').attr('disabled','disabled');
                }
            });

            if(flg_name == false || flg_price == false || flg_image == false || flg_size == false || flg_quality_extend == false || flg_size_extend == false){
                e.preventDefault();
            }
        });

        //ajax edit category
        $('.btn_edit_category').click(function(e){
            e.preventDefault();
            var current = $(this).closest('ul.categories');
            var category_id = current.find('.category_id').val();
            var category_name = current.find('.category_name').text();
            $("#add_category_window input.category_id").val(category_id);
            $("#add_category_window input.category_name").val(category_name);
            $.ajax({
                type: "POST",
                url: path_add_category,
                data: {
                    id : category_id,
                    name : category_name,
                },
                global: true,
                dataType: 'json',
                success: function(response) {

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                },
            });

        });

        //ajax delete category
        $('.btn_delete_category').click(function(e){
            e.preventDefault();
            var current = $(this).closest('ul.categories');
            var category_id = current.find('.category_id').val();
            var category_name = current.find('.category_name').text();

            $.ajax({
                type: "POST",
                url: path_delete_category,
                data: {
                    id : category_id,
                    name : category_name,
                },
                global: true,
                dataType: 'json',
                success: function(response) {
                    if(response == 1) {
                        $(current).remove();
                        // return;
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                },
            });
        });

        //ajax add new category
        $('.btn_save_category').click(function(){
            var current_add = $(this).closest('div#add_category_window');
            var name = current_add.find('.category_name').val();
            var id = current_add.find('.category_id').val();

            $.ajax({
                type: "POST",
                url: path_add_category,
                data: {
                    id : id,
                    name : name,
                },
                global: true,
                dataType: 'json',
                success: function(response) {
                    if(response.success == 1) {
                        if(response.action == 'add'){
                            var clone_ul = $('#new_row_clone ul').clone();

                            clone_ul.find('.category_id').val(response.id);
                            clone_ul.find('.category_name').text(response.name);

                            $('#sortable').append(clone_ul);
                        }else if(response.action == 'edit'){
                            $('#sortable ul li.name_category input[value="'+response.id+'"].category_id').next( "label.category_name").text(response.name);
                        }

                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                },
            });
        });

        //add new size and quality item
        $('.btn_variation').click(function(e){
            e.preventDefault();
            $('.err_size').empty();
            $('.top_quality').hide();
            $('.top_quality input.number_quality.item_size').prop('disabled', true);
            $('.variation_heading').show();
            $('.variation').show();
            $('#itemSerial > ul.variation.list_items input').prop('disabled', false);
            var tmp_field_cl = $('.variation:first').clone();
            tmp_field_cl.find("input").val('');
            $('#itemSerial').append(tmp_field_cl);
        });
    });