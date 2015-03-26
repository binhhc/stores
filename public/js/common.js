$(document).ready(function(){
	setTimeout(function() {
	       $('#alert_panel').fadeOut();
	   }, 5000);

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

});

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
