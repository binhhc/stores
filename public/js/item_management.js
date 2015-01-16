$(document).ready(function(){
	 //move items up/down for reordering setting items
    window.orderList = function(list_id, go_up) {
    	var click = $(this);
    	var row = $(this).parent().parent().parent();

    	//console.log(row);

        var index = row.attr('data-a');
        //alert(index);
        if (go_up) {
            if (index == 0)
                return;
            row.insertBefore(row.prev());
        } else {
            row.insertAfter(row.next());
        }
    }
    $('#start_with_store').on('click', function(e) {
    	e.preventDefault();
    	$('.modal_dashboard').hide();
    });
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
    $(document).on('click', 'li.sort_item', function(){
    	var item_id = $(this).attr('item_id');
    	var order_value = $(this).attr('order_value');
    	var list_public_item = $('li.sort_item.up');
    	var items = [];
    	$.each( list_public_item, function(index, item){
    		var id = $(item).attr('item_id');
    		var order = $(item).attr('order_value');
    		items.push([id, order]);
    		//items.push({id:order});
    	});
    	//console.log(items);
    	//return;
    	$.ajax({
            type: "GET",
            url: "/sort_item",
            data: {
                item_id: item_id,
                items: items
                order_value: order_value
            },
            beforeSend: function() {
            },
            global: true,
            dataType: 'json',
            success: function(response) {
           	 	$('.items_contents').html(response.html);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            },
            complete: function() {
            },
        });
    });

    $(document).on('click', '.switch p.status', function(){
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
            },
            global: true,
            dataType: 'json',
            success: function(response) {
           	 	$('.items_contents').html(response.html);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            },
            complete: function() {
            },
        });
    });

});