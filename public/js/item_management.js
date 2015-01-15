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
     	e.preventDefault();
     	 $.ajax({
              type: "POST",
              url: "/send_email",
              data: {
                  email: register,
              },
              beforeSend: function() {
                  // setting a timeout
                  $('.send_email').hide();
                  $('#sending_email').show();
              },
              global: true,
              dataType: 'json',
              success: function(response) {
             	 alert(response.aa);
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
              },
              complete: function() {
                  $('.activate').hide();
              },
          });
     });

});