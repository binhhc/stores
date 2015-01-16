	$(document).ready(function(){

			$('#btn_menu').on('click', function(){
	    	  if($('ul#mobile_nav').css('display') !== 'none')
	    		  $('ul#mobile_nav').slideUp();
	    	  else  $('ul#mobile_nav').slideDown();
	      });
			$('#panel_error .close').on('click', function(){
				$('#panel_error').hide();
		  });
	      var Slider = function(trg,btn){
	        this.$slide = trg;
	        this.$control = btn;
	        this.width = this.$slide.children().width();
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
	              $(this).css('left',that.width);
	            }
	          });
	          this.setControl();
	        },
	        actionSlide: function(){
	          var that = this;
	          this.$slide.data('sliding',true);
	          this.$current.stop().animate({
	            'left' : (this.direction === 'left' ? '-=' : '+=') + this.width + 'px'
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
	              'left' : -this.width + 'px'
	            });
	          }else{
	            if(this.$current.nextAll().length !== 0){
	              this.$next = this.$current.next();
	            }else{
	              this.$next = this.$current.parent().children().first();
	            }
	            this.$next.css({
	              'left' : this.width + 'px'
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
	      var slider = new Slider($('.slide_wrap'),$('.slide_navi'));
	      slider.init();

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
	    	    if (pass.length <= 0 || x.length <=0) {
	    	    	$(div_err).show();
	    	    	$(p_err).show();
	    	    	$(e_p).show();
	    	    	$(em_err).show();
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

	    	    $(div_err).hide();
	    	    return true;
	    }
	      $('button.btn_submit').on('click', function(e) {
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
	                  success: function(response) {
	                	  if(response.status == 'fail') {
	                		  $(div_err).show();
	                		  $('p.unique_email').show();
	                		  return false;
	                	  } else {
	                		  window.location.href = "/dashboard/1";
	                	  }
	                  },
	                  error: function(XMLHttpRequest, textStatus, errorThrown) {
	                  }
	              });
	    	  } else {
	    		  return false;

	    	  }
	      })
	});
