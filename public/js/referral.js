$(document).ready(function(){
    /**
     * Delete an item
     */
	$('#modal-bg,a.modal-close').on('click', function(e){
		e.preventDefault();
		$('#modal-win').hide();
	});
        $(document).on('click', '.send_email_invitation', function(e){
                var email = $('.email_send').val();
                var name = $('.name_send').val();
                $.ajax({
                    type: "POST",
                    url: "/invitation",
                    data: {
                        email: email,
                        name: name
                    },
                    beforeSend: function() {
                    	$('.send_email_invitation').hide();
                        $('.btn_low_big').show();
                    },
                    global: true,
                    dataType: 'json',
                    success: function(response) {
                        if(response=='success') {
                        	 $('.email_send').val('');
                        	 $('.name_send').val('');
                        	 $('.panel').fadeIn('slow').delay(3000).fadeOut('slow');

                        } else {
                            // Validate error
                        	if(response.email != '') {
                        		$('#error_email').text(response.email);
                        		$('#error_email').show();
                        	}
                        	if(response.email != '') {
                        		$('#error_name').text(response.name);
                        		$('#error_name').show();
                        	}
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                    },
                    complete: function() {
                        $('.btn_low_big').hide();
                        $('.send_email_invitation').show();
                    },
                });
    });
        var app_id = $('.facebook_app_id').val();
        window.fbAsyncInit = function() {
            FB.init({
              appId      : app_id,
              xfbml      : true,
              version    : 'v2.2'
            });
          };
        $(document).on('click', '.share_facebook', function(e){
        	var url_store = 'http://' + $(this).attr('url_store');
        	e.preventDefault();
        	FB.ui({
        		  method: 'feed',
        		  link: url_store,
        		}, function(response){
        		});


        });
        $(document).on('click', '.popup', function(e){
        	e.preventDefault();
        	var item_id = $(this).attr('item_id');
        		    var width  = 575,
        		        height = 400,
        		        left   = ($(window).width()  - width)  / 2,
        		        top    = ($(window).height() - height) / 2,
        		        url    = this.href,
        		        opts   = 'status=1' +
        		                 ',width='  + width  +
        		                 ',height=' + height +
        		                 ',top='    + top    +
        		                 ',left='   + left;

        		    window.open(url, 'twitter' + item_id, opts);

        		    return false;

        });
        $(document).on('click', '.send_email_list', function(e){
            var items_array = [];
            $("#popup_gmail input:checkbox:checked").each(function(){ items_array.push($(this).val()); });
            if(items_array.length == 0) {
            	alert('Bạn chưa chọn danh sách người muốn mời!');
            	return;
            }
        	$.ajax({
                    type: "POST",
                    url: "/send_email_list",
                    data: {
                        user_emails: items_array,
                    },
                    beforeSend: function() {
                    	$('.send_email_list').hide();
                    	$('#popup_gmail btn_low').show();
                    },
                    global: true,
                    dataType: 'json',
                    success: function(response) {
                        if(response=='success') {
                        	$('.send_email_list').hide();
                        	$('#popup_gmail btn_low').show();
                        	$('#modal-win').hide();
                        	 $('.panel').fadeIn('slow').delay(3000).fadeOut('slow');
                        } else {
                            alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
                            return;
                        }


                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                    },
                    complete: function() {
                    	$('#popup_gmail btn_low').hide();
                    	$('.send_email_list').show();
                    },
                });
    });

})