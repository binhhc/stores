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
	/*$( window ).resize(function() {
		if ($(window).width() > 1024) {
			slider_home = new Slider($('.slide_wrap'),$('.slide_navi'),880);
			slide_width = 880;
		} else {
			slider_home = new Slider($('.slide_wrap'),$('.slide_navi'),320);
			slide_width = 320;
		}
		slider_home.init();
	}).trigger('resize');*/


$(document).ready(function(){
   // var slider = new Slider($('.slide_wrap'),$('.slide_navi'));
    //slider.init();
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
		        	  $("button.btn_submit").text('Đang tạo...');
		          },
		          success: function(response) {
		        	  if(response.status == 'fail validate') {
		        		  $('p.unique_email').text(response.msg);
		        		  $(div_err).show();
		        		  $('p.unique_email').show();
		        		  return false;
		        	  } else {
		        		  if(response.status== "success") {
		        			  window.location.href = "/dashboard";
		        		  } else {
		        			  $(div_err).show();
		        			  $('p.unique_email').text(response.msg);
		            		  $('p.unique_email').show();
		        		  }

		        	  }
		          },
		          error: function(XMLHttpRequest, textStatus, errorThrown) {
		          },
		          complete: function() {
		        	  $('button.btn_submit').text('TẠO CỬA HÀNG');
		          },
		      });
		  } else {
			  return false;
		  }
		});
});
