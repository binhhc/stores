
$(document).ready(function(){
	setTimeout(function() {
	       $('#alert_panel').fadeOut();
	   }, 4000);

    $('#start_with_store').on('click', function(e) {
    	e.preventDefault();
    	$('.modal_dashboard').hide();
    });
    /**
     * Send email for new user
     */
    $('.send_email').on('click', function(e) {
    	var email=$('#email_user').val();
     	e.preventDefault();
     	 $.ajax({
              type: "POST",
              url: "/send_email",
              data: {
                  email: email,
              },
              beforeSend: function() {
                  // setting a timeout
                  $('.send_email').hide();
                  $('#sending_email').show();
              },
              global: true,
              dataType: 'json',
              success: function(response) {
            	  $('.activate').hide();
             	 //alert(response);
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
              },
              complete: function() {
                  $('.activate').hide();
              },
          });
     });

    //$('li.sort_item').on('click', function(){
    /**
     * Sort item in item management
     */
    $(document).on('click', 'li.sort_item', function(){
    	var item_id = $(this).attr('item_id');
    	var order_value = $(this).attr('order_value');
    	var up_down = $(this).attr('up_down');
    	var list_public_item = $('li.sort_item.up');
    	var items_array = [];
    	$.each( list_public_item, function(index, item){
    		var id = $(item).attr('item_id');
    		var order = $(item).attr('order_value');
    		items_array.push([id, order]);
    	});
    	$.ajax({
            type: "GET",
            url: "/sort_item",
            data: {
                item_id: item_id,
                items_array: items_array,
                order_value: order_value,
                up_down:up_down
            },
            beforeSend: function() {
            	$(this).parent().parent().slideUp();
            	$('.loading').show();
            },
            global: true,
            dataType: 'json',
            success: function(response) {
           	 	$('.items_contents').html(response.html);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            },
            complete: function() {
            	$('.loading').hide();
            },
        });
    });

    /**
     * Change status of item
     */
    $(document).on('click', '.switch p.item_status', function(){
    	var item_id = $(this).attr('item_id');
    	var public_flg = $(this).attr('public_flg');
    	$.ajax({
            type: "GET",
            url: "/set_status",
            data: {
                item_id: item_id,
                public_flg: public_flg
            },
            beforeSend: function() {
            	$('.loading').show();
            },
            global: true,
            dataType: 'json',
            success: function(response) {
           	 	$('.items_contents').html(response.html);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            },
            complete: function() {
            	$('.loading').hide();
            },
        });
    });
    /**
     * Delete an item
     */
    	$(document).on('click', 'a.delete_item', function(e){
    		e.preventDefault();
    		var conf = confirm('Bạn chắc chắn muốn xoá mặt hàng này?');
    		if(conf) {
    			var item_id = $(this).attr('item_id');
            	$.ajax({
                    type: "GET",
                    url: "/delete_item",
                    data: {
                        item_id: item_id,
                    },
                    beforeSend: function() {
                    	$('.loading').show();
                    },
                    global: true,
                    dataType: 'json',
                    success: function(response) {
                    	if(response.success=1) {
                    		$('.items_contents').html(response.html.html);
                    		$('#alert_panel').fadeIn('slow').delay(3000).fadeOut('slow');
                    	} else {
                    		alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
                    		return;
                    	}


                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                    },
                    complete: function() {
                    	$('.loading').hide();
                    },
                });
    		} else {
    			return;
    		}
    });

    	/**
    	 * Open ship for store setting
    	 */
    	$('#open_shipping_select').on('click', function(event){
			 event.preventDefault();
			if ($('#shipping_select').css('display') == 'none') {
				$('#shipping_select').show();
			} else {
				$('#shipping_select').hide();
			}
		});
		$('button.cancel_button').on('click', function(){
			$('#shipping_select').hide();
		})
		$('#form_promotion').on('click', function(){
			$('#modal-win').show();
		});
		$('a.modal-move').on('click', function() {
			var modal = $(this).attr('href');
			$('#modal-win-inner').hide();
			$('.modal_slide').hide();
			$(modal).show();
		});
		$('a.modal-close').on('click', function(){
			$('#modal-win').hide();
		});
		if($('input[name="check_free_ship"]').val() == 1) {
			$('li.shipping_free1').show();
			$('#checkbox_image').removeClass('checked-');
			$('#checkbox_image').addClass('checked-true');
		}
		$(document).on('click', '.styled_checkbox', function(e){
			if($('#checkbox_image').hasClass('checked-')) {
				$('#checkbox_image').removeClass('checked-');
				$('#checkbox_image').addClass('checked-true');
				$('li.shipping_free1').show();
				$('input[name="check_free_ship"]').val('1');
				$('input[name="check_free_ship"]').prop('checked', true);
			} else {
				$('#checkbox_image').removeClass('checked-true');
				$('#checkbox_image').addClass('checked-');
				$('li.shipping_free1').hide();
				$('input[name="check_free_ship"]').val('0');
				$('input[name="check_free_ship"]').prop('checked', false);
			}
		});
		$('.save_shipping').on('click', function() {
			var circle = $('input[name="circle"]').val();
			var check_free_ship = $('input[name="check_free_ship"]').val();
			var free_ship = $('input[name="free_ship"]').val();
			$.ajax({
                type: "POST",
                url: "/ship_setting",
                data: {
                    circle: circle,
                    check_free_ship: check_free_ship,
                    free_ship:free_ship
                },
                global: true,
                dataType: 'json',
                success: function(response) {
                	if(response.success=1) {
                		$('#shipping_select').hide();
                	} else {
                		alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
                		return;
                	}


                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                },
            });
		})
});
