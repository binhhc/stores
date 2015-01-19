// Slide in main page
	var slide_width = 880;
      var Slider = function(trg,btn,swidth){
        this.$slide = trg;
        this.$control = btn;
        // this.width = this.$slide.children().width();
        this.width = swidth;
        this.direction = 'right';
        this.$current;
        this.$next;
      }
      Slider.prototype = {
        init: function(){
          var that = this;
          this.$slide.children().each(function(i){
            if(i === 0){
              that.$current = $(this);
            }else{
              $(this).css('left',slide_width);
            }
          });
          this.setControl();
        },
        actionSlide: function(){
          var that = this;
          this.$slide.data('sliding',true);
          this.$current.stop().animate({
            'left' : (this.direction === 'left' ? '-=' : '+=') + slide_width + 'px'
          },200)
          this.$next.stop().animate({
            'left' : '0px'
          },200,function(){
            that.$current = that.$next;
            that.$slide.data('sliding',false);
          });
        },
        rePosition: function(){
          if(this.$slide.data('sliding')) return;
          if(this.direction === 'right'){
            if(this.$current.prevAll().length !== 0){
              this.$next = this.$current.prev();
            }else{
              this.$next = this.$current.parent().children().last();
            }
            this.$next.css({
              'left' : -slide_width + 'px'
            });
          }else{
            if(this.$current.nextAll().length !== 0){
              this.$next = this.$current.next();
            }else{
              this.$next = this.$current.parent().children().first();
            }
            this.$next.css({
              'left' : slide_width + 'px'
            });
          }
          this.actionSlide();
        },
        setControl: function(){
          var that = this;
          this.$control.find('.prev').on('click', function(){
            that.direction = 'right';
            that.rePosition();
          });
          this.$control.find('.next').on('click', function(){
            that.direction = 'left';
            that.rePosition();
          });
        }
      }
	$( window ).resize(function() {
		if ($(window).width() > 1024) {
			slider_home = new Slider($('.slide_wrap'),$('.slide_navi'),880);
			slide_width = 880;
		} else {
			slider_home = new Slider($('.slide_wrap'),$('.slide_navi'),320);
			slide_width = 320;
		}
		slider_home.init();
	}).trigger('resize');


$(document).ready(function(){
	// Main.js
	$('#btn_menu').on('click', function(){
		if($('ul#mobile_nav').css('display') !== 'none'){
			$('ul#mobile_nav').slideUp();
		} else {
			$('ul#mobile_nav').slideDown();
		}
	});
	$('#panel_error .close').on('click', function(){
		$('#panel_error').hide();
	});

	 // Validate register user
    var div_err = $('#panel_error');
    var em_err= $('p.valid_email');
    var p_err = $('p.pass_error');
    var e_p = $('p.email_pass_error');
    function validateForm() {
  	  	var pass = document.forms["myForm"]["password"].value;
  	  	var x = document.forms["myForm"]["email"].value;
  	    var atpos = x.indexOf("@");
  	    var dotpos = x.lastIndexOf(".");
  	    if (pass.length <= 0 && x.length <=0) {
  	    	$(div_err).show();
  	    	$(p_err).show();
  	    	$(e_p).show();
  	    	$(em_err).show();
  	    	return false;
  	    } else {
  	        if (pass.length <= 0 || x.length <=0) {
  	        	$(p_err).hide();
	    	    	$(em_err).hide();
	    	    	$(div_err).show();
	    	    	$(e_p).show();
	    	    	return false;
	    	    } else {
	    	    	$(e_p).hide();
	    	    	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		    	    	$(div_err).show();
		    	    	$(em_err).show();
		    	    	return false;
		    	    } else {
		    	    	$(em_err).hide();
		    	    	if (pass.length < 6) {
			    	    	$(div_err).show();
			    	    	$(p_err).show();
			    	    	return false;
			    	    } else {
			    	    	$(p_err).hide();
			    	    }

		    	    }

	    	    }
  	    }
  	    $(div_err).hide();
  	    return true;
  }
	// Register user by js (main)
	$(document).on('click', 'button.btn_submit', function(e){
		  e.preventDefault();
		  if (validateForm()) {
			  var pass = document.forms["myForm"]["password"].value;
			  var x = document.forms["myForm"]["email"].value;
			  // Send data to server and ....
			  $.ajax({
		          type: "POST",
		          url: "/register",
		          data: {
		             email: x,
			  		 password: pass
		          },
		          global: true,
		          dataType: 'json',
		          beforeSend: function() {
		        	  $('button.btn_submit').hide();
		        	  $('.btn_wait').show();
		          },
		          success: function(response) {
		        	  if(response.status == 'fail validate') {
		        		  $('p.unique_email').text(response.msg);
		        		  $(div_err).show();
		        		  $('p.unique_email').show();
		        		  return false;
		        	  } else {
		        		  if(response.status== "success") {
		        			  window.location.href = "/dashboard/1";
		        		  } else {
		        			  $(div_err).show();
		        			  $('p.unique_email').text("Lỗi không thể lưu vào cơ sở dữ liệu");
		            		  $('p.unique_email').show();
		        		  }

		        	  }
		          },
		          error: function(XMLHttpRequest, textStatus, errorThrown) {
		          },
		          complete: function() {
		        	  $('button.btn_submit').show();
		        	  $('.btn_wait').hide();
		          },
		      });
		  } else {
			  return false;
		  }
		});

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

});
