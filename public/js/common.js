$(document).ready(function(){
	setTimeout(function() {
	       $('#alert_panel').fadeOut();
	   }, 3000);

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
		});
		$(document).on('click', '.switch_public_flag', function(e){
			var store_id = $(this).attr('store_id');
			var public_flg;
			if($('.switch_public_flag .status_store').hasClass('active')) {
				public_flg = 0;
				$('.switch_public_flag .status_store').removeClass('active');
				$('.switch_public_flag .status_store').addClass('deactive');
				$('.switch_public_flag .status_store').text('Private');
				$('.switch_public_flag .grip').css({'left':'2px'});
			} else {
				public_flg = 1;
				$('.switch_public_flag .status_store').removeClass('deactive');
				$('.switch_public_flag .status_store').addClass('active');
				$('.switch_public_flag .status_store').text('Public');
				$('.switch_public_flag .grip').css({'left':'57px'});
			}
			$.ajax({
                type: "POST",
                url: "/set_public_flag",
                data: {
                    store_id: store_id,
                    public_flg:public_flg
                },
                global: true,
                dataType: 'json',
                success: function(response) {
                	if(response.success=1) {
                		return;
                	} else {
                		alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
                		return;
                	}
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                },
            });

		});
		$(document).on('click', '.set_promotion', function(e){
			var store_id = $(this).attr('store_id');
			var promotion;
			if($('.set_promotion .status_promotion').hasClass('active')) {
				public_flg = 0;
				$('.set_promotion .status_promotion').removeClass('active');
				$('.set_promotion .status_promotion').addClass('deactive');
				$('.set_promotion .status_promotion').text('OFF');
				$('.set_promotion .grip').css({'left':'2px'});
			} else {
				public_flg = 1;
				$('.set_promotion .status_promotion').removeClass('deactive');
				$('.set_promotion .status_promotion').addClass('active');
				$('.set_promotion .status_promotion').text('ON');
				$('.set_promotion .grip').css({'left':'57px'});
			}
			$.ajax({
                type: "POST",
                url: "/set_promotion",
                data: {
                    store_id: store_id,
                    promotion: promotion
                },
                global: true,
                dataType: 'json',
                success: function(response) {
                	if(response.success=1) {
                		return;
                	} else {
                		alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
                		return;
                	}
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                },
            });

		});
		$(document).on('click', '.set_store_follow', function(e){
			var store_id = $(this).attr('store_id');
			var store_follow;
			if($('.set_store_follow .status_follow').hasClass('active')) {
				store_follow = 0;
				$('.set_store_follow .status_follow').removeClass('active');
				$('.set_store_follow .status_follow').addClass('deactive');
				$('.set_store_follow .status_follow').text('OFF');
				$('.set_store_follow .grip').css({'left':'2px'});
			} else {
				store_follow = 1;
				$('.set_store_follow .status_follow').removeClass('deactive');
				$('.set_store_follow .status_follow').addClass('active');
				$('.set_store_follow .status_follow').text('ON');
				$('.set_store_follow .grip').css({'left':'57px'});
			}
			$.ajax({
                type: "POST",
                url: "/set_store_follow",
                data: {
                    store_id: store_id,
                    store_follow:store_follow
                },
                global: true,
                dataType: 'json',
                success: function(response) {
                	if(response.success=1) {
                		return;
                	} else {
                		alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
                		return;
                	}
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                },
            });

		});
		$('#delete_store_about').on('click', function(e){
			e.preventDefault();
			conf = confirm('Bạn chắc chắn muốn xoá mô tả cửa hàng?');
			if(conf) {
				var store_id = $(this).attr('store_id');
				$.ajax({
	                type: "POST",
	                url: "/delete_store_about",
	                data: {
	                    store_id: store_id,
	                },
	                global: true,
	                dataType: 'json',
	                success: function(response) {
	                	if(response.success=1) {
	                		$('#delete_store_about').hide();
	                		$('#alert_delete_success p').text('Bạn đã xoá thành công mô tả cửa hàng!');
	                		$('.store_edit').text('Đăng ký');
	                         $('#alert_delete_success').fadeIn('slow').delay(3000).fadeOut('slow');
	                		return;
	                	} else {
	                		alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
	                		return;
	                	}
	                },
	                error: function(XMLHttpRequest, textStatus, errorThrown) {
	                },
	            });
			} else {
				return;
			}
		});
		$('#delete_trade_law').on('click', function(e){
			e.preventDefault();
			conf = confirm('Bạn chắc chắn muốn xoá luật thương mại?');
			if(conf) {
				var store_id = $(this).attr('store_id');
				$.ajax({
	                type: "POST",
	                url: "/delete_trade_law",
	                data: {
	                    store_id: store_id,
	                },
	                global: true,
	                dataType: 'json',
	                success: function(response) {
	                	if(response.success=1) {
	                		$('#delete_trade_law').hide();
	                		$('#alert_delete_success p').text('Bạn đã xoá thành công luật thương mại của cửa hàng!');
	                		$('.trade_law_edit').text('Đăng ký');
	                         $('#alert_delete_success').fadeIn('slow').delay(3000).fadeOut('slow');
	                		return;
	                	} else {
	                		alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
	                		return;
	                	}
	                },
	                error: function(XMLHttpRequest, textStatus, errorThrown) {
	                },
	            });
			} else {
				return;
			}
		});

});

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
