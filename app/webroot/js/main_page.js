	$(document).ready(function(){
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
	      var slider2 = new Slider($('#modal-win'),$('.modal_nav_next'));
	      slider2.init();
	      //$('[data-toggle="tooltip"]').tooltip();
	});
