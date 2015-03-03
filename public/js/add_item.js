 	var base_url = '';
    pathArray = location.href.split( '/' );
    protocol = pathArray[0];
    host = pathArray[2];
    base_url = protocol + '//' + host;
    var ftype = new Array();
    $("#imgInput").change(function (event) {
    	files = event.target.files;

    	if(!(/\.(gif|jpg|jpeg|tiff|png)$/i).test(files[0].name)){
            alert('Không đúng định dạng ảnh!');
            return;
        }

    	count_img = $('#result').find('li').length;
    	var output = document.getElementById("result");
    	if(count_img >=4) {
    		 alert('Bạn chỉ được upload tối đa 4 hình ảnh cho sản phẩm!');
             return;
    	}
    	var data = new FormData();

        // Thêm dữ liệu từ biến files vào form
        $.each(files, function(key, value) {
            data.append(key, value);
        });
          $.ajax({
            type: "POST",
            url: "/upload_image_item",
            data: data,
            global: true,
            dataType: 'json',
            processData: false, // Không cho jQuery xử lý lại dữ liệu form
            contentType: false,
            success: function(response) {
                     var div = document.createElement("li");
                     div.setAttribute('id', 'div_' + count_img);
                     div.setAttribute('class', 'divclass');
                         div.innerHTML = "<img class='thumbnail' src='" + base_url + response.source + "'" +
                             "title='" + response.name + "' width='96' height='80' alt='Item Image' style='position:relative;'"  + " /><span class='boxclose' style='cursor:pointer' id='span_" + count_img + "'>x</span>";
                         input = "<input type='hidden' name='image_name[]' id='input_"+ count_img + "' value='" + response.name + "' >";
                         $('#image_arrays').append(input);
                     output.insertBefore(div, null);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            },
        });
        //readURL(this);
    });

    function readURL(input) {
        var files = input.files;

        var output = document.getElementById("result");
        var count = 0;
        var count1 = 0;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var picReader = new FileReader();
            var divid = 'div_' + i;
            var spanid = 'span_' + i;
            picReader.addEventListener("load", function (event) {
                count_img = $('#result').find('li').length;
                var picFile = event.target;
                var picnames = files[count].name;
                var mimetypes = picFile.result.split(',');
                var mimetype1 = mimetypes[0];
                var mimetype = mimetype1.split(':')[1].split(';')[0];


                count++;
                if(count_img < 4){
                    count_img++;
                    var div = document.createElement("li");
                    div.setAttribute('id', 'div_' + count);
                    div.setAttribute('class', 'divclass');
                    if (mimetype.match('image')) {
                        div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picnames + "' width='100' height='100' alt='Item Image' style='position:relative;' data-valu='" + mimetype + "'/><span class='boxclose' style='cursor:pointer' id='span_" + count + "'>x</span>";
                        input = "<input type='hidden' name='image_name[]' value='" + picnames + "' >";
                        $('#image_arrays').append(input);
                    }
                    output.insertBefore(div, null);

                } else {
                    alert('Bạn chỉ được upload tối đa 4 hình ảnh cho sản phẩm!');
                    return;
                }


            });

            picReader.readAsDataURL(file);
        }
    }


    $('body').on('click','.boxclose','',function(e){
        var spanid = $(this).attr('id');
        var splitval = spanid.split('_');
        $('#div_' + splitval[1]).remove();
        var name_image =  $('#input_' + splitval[1]).val();
        $('#input_' + splitval[1]).remove();
        // remove image by ajax
        $.ajax({
            type: "POST",
            url: "/remove_image",
            data: {
                image_name: name_image
            },
            global: true,
            dataType: 'json',
            success: function(response) {
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            },
        });
    });

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
            $(this).prop('checked', true);
        }else{
            $(this).prop('checked', false);
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
    function update_sort (listId) {
   	 $.ajax({
            type: "POST",
            url: "/sort_category",
            data: {
                items_array: listId,
            },
            global: true,
            dataType: 'json',
            beforeSend: function() {
            	$('.btn_pair').hide();
                $('.btn_single').show();
            },
            success: function(response) {
            	$('#formItem').submit();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            },
        });
   }

    $(document).ready(function(){
        //sort category
        $(function() {
        	$( "#sortable" ).sortable({
            });

            $( "#sortable" ).disableSelection();
        });

        $( "#result" ).sortable({
    		start: function(event, ui) {
    			//$(ui.item[0]).find('dl').css("background-color", "#F2F2F2");
    			$(ui.item[0]).find('img').css("border", "1px dotted black");
    		},
    		stop:  function (event, ui) {
    			//$(event.target).parent().css("background-color", "#F2F2F2");
    			var listId = [];
    			  $('#result li').each(function(index) {
    				  var name = $(this).find('img').attr('title');
    				  listId.push(name);

                  });
    			  $('#image_arrays').empty();

    			  for (var k in listId) {
    				  input = "<input type='hidden' name='image_name[]' id='input_"+ k + "' value='" + listId[k] + "' >";
    				  $('#image_arrays').append(input);

    			  }
    		}
        });
        $( "#sortable dl" ).disableSelection();
        //sort image
        $(function() {
            $( "#result" ).sortable();
            $( "#result" ).disableSelection();
        });

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
                $('.err_price').append('Bạn hãy nhập một giá cả hợp lệ cho mặt hàng (>=100)');
            }else if(item_price < 100){
                flg_price = false;
                $('.err_price').empty();
                $('.err_price').append('Vui lòng điền giá mặt hàng lớn hơn 100');
            }else{
                flg_price = true;
                $('.err_price').empty();
            }

            //validate image
            var item_image = $('#result li').length;
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

                   // if(!size_quality.trim() || $.inArray(size_quality, arr_size) == -1){
                    if(!size_quality.trim()){
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
            } else {
            	// update order for category
            	var listId = [];
  			    $('#sortable ul').each(function(index) {
  				  var is_id = $(this).find('.category_id').val();
  				  listId.push(is_id);

                });
  			    update_sort (listId);
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
                            current_add.find('.category_name').val('');
                            //current_add.find('.category_id').val('');

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