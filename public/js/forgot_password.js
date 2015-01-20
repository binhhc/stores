/*
    @author Binh Hoang
    @since 2015.01.16
*/
$(document).ready(function(){
    $('#forgetPass').submit(function(event){
        event.preventDefault();
        var email = $('.email_pass').val();
        if (validateEmail(email)) {
            $.ajax({
                url : "{{URL::asset('/forgetPassword')}}",
                type: "POST",
                data: "email="+email,
                beforeSend: function( xhr ) {
                    $(".btn_submit_1").hide();
                    $(".btn_wait_1").show();
                },
                success: function(data, textStatus, jqXHR){
                    if (data == '1') {
                        $('.finish').show();
                        $('.form_submit').hide();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown){
                    $(".btn_submit_1").hide();
                    $(".btn_wait_1").show();
                }
            });
        } else {
            $(".btn_submit_1").hide();
            $(".btn_wait_1").show();
        }
    });
});

