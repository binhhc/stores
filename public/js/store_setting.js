$(document).ready(function(){
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