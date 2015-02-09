$(document).ready(function(){
    /**
     * Delete an item
     */
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
})