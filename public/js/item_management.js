function update_sort (listId) {
	 $.ajax({
         type: "GET",
         url: "/sortable_item",
         data: {
             items_array: listId,
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
}
$(document).ready(function(){
	 /**
     * Sort item in item management
     */
    $(document).on('click', 'li.sort_item', function(){
    	var sort_item = $(this);
        var item_id = $(this).attr('item_id');
        var order_value = $(this).attr('order_value');
        var up_down = $(this).attr('up_down');
        if(order_value == 1 && up_down == 'up') return false;
        if(up_down=='down' && order_value == $('.count_public_items').val()) return false;
        var list_public_item = $('li.sort_item.up');
        var items_array = [];
        $.each( list_public_item, function(index, item){
            var id = $(item).attr('item_id');
            var order = $(item).attr('order_value');
            items_array.push([id, order]);
        });
        $.ajax({
            type: "POST",
            url: "/sort_item",
            data: {
                item_id: item_id,
                items_array: items_array,
                order_value: order_value,
                up_down:up_down
            },
            beforeSend: function() {
                $(sort_item).parent().parent().slideUp('fast');
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
    	var sort_item = $(this);
        var item_id = $(this).attr('item_id');
        var public_flg = $(this).attr('public_flg');
        $.ajax({
            type: "POST",
            url: "/set_status",
            data: {
                item_id: item_id,
                public_flg: public_flg
            },
            beforeSend: function() {
            	$(sort_item).parent().parent().parent().slideUp('fast');
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
            var sort_item = $(this);
            var conf = confirm('Bạn chắc chắn muốn xoá mặt hàng này?');
            if(conf) {
                var item_id = $(this).attr('item_id');
                $.ajax({
                    type: "POST",
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

        $(document).on('click', '.share_facebook', function(e){
        	var item_name = $(this).attr('item_name');
        	var img_url = $(this).attr('image_url');
        	url = $('.website_url').val();
        	img_url =   url + img_url;
        	e.preventDefault();
        	FB.ui({
        		  method: 'feed',
        		  link: url,
        		  caption: item_name,
        		  picture: img_url
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
        $(document).on('mouseover', 'li.navi_share', function(e){
        	var item_id = $(this).attr('item_id');
        	var tooltip_share = $('.tooltip_share' + item_id);
        	$(tooltip_share).show();
        });
        $(document).on('mouseout', 'li.navi_share', function(e){
        	var item_id = $(this).attr('item_id');
        	var tooltip_share = $('.tooltip_share' + item_id);
        	$(tooltip_share).hide();
        });

        $( "#sortable" ).sortable({
        	opacity: 0.6,
    		start: function(event, ui) {
    			$(event.target).parent().css("background-color", "#cccccc");
    		},
    		stop:  function (event, ui) {
    			$(event.target).parent().css("background-color", "#F2F2F2");
    			var listId = [];
    			  $('.sortable dl#list_public').each(function(index) {
    				  alert(index);
    				  var is_id = $(this).find('li.sort_item.up').attr('item_id');
    				  listId.push([is_id, index]);

                  });
    			  update_sort (listId);
    		}
        });
})