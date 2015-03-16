@extends('layouts.owner_store')
@section('content')
<div id="fb-root"></div>

<div class="contents_view">
	<div id="follow" style="top: 20px; right: 90px; position: fixed;position:absolute; top: 80px !important; width: 120px; height: 40px; z-index:100; background-color:transparent;" >
          	<?php if($follow_status == 0) { ?>
          		<p><a href="" class="header"  user_store_id="{{md5($user_store_id)}}" follow_status="{{$follow_status}}" >{{$follow}}</a>
            <?php } else {?>
            <p class="follow_already"><a href="" class="header" user_store_id="{{md5($user_store_id)}}" follow_status="{{$follow_status}}">{{$following}}</a>
            <?php }?>
		</p>
      </div>
    <!-- <iframe src="/iframe/store/follow_header?position=header&follow=<?php echo $follow_status?>&follow_count=<?php echo $follow_count?>&user_store_id={{$user_store_id}}" style="top: 20px; right: 90px; position: fixed;position:absolute; top: 80px !important; width: 120px; height: 40px; z-index:100; background-color:transparent;" scrolling="no" frameborder="0" sp-if="follow"></iframe> -->

    <!-- Cart/ -->
    <div id="cart_button" class="private" style="z-index:1">
        <a href="#popup_cart">
            <span>{[cart.quantity]}</span>
        </a>
    </div>
    <!-- /Cart -->

    <!-- Private/ -->
    <?php if(!$public_flg):?>
        <div class="private">
            <p class="text">Cửa hàng chưa được công khai, vui lòng vào<a href="{{$url}}">「cài đặt cửa hàng」</a></p>
        </div>
    <?php endif;?>
    <!-- /Private -->

    <div ng-view></div>

    <!-- FollowBox/ -->
    <?php $style =  ($follow_status == 1) ? 'display: block!important' : 'display: none'; ?>
    <div class="follow_box" style="<?php echo $style ?>">
        <p class="close"><a href="">close</a>
        </p>
        <p class="message">{{$languagePopupFollow['label_popup_follow']}}</p>
        <p class="store_image"><img src="https://stores.jp/images/follow/user_icon/user_icon_01.png">
        </p>
        <div class="store_info">

            <h3>{[styles.name]}</h3>
            <p></p>
        </div>
        <div id="follow" style="float:right; width:100px; height:26px; margin:8px 12px 0 0; background-color:transparent; vertical-align:middle;" >
          	<?php if($follow_status == 0) { ?>
          		<p><a href="" class="box"  user_store_id="{{md5($user_store_id)}}" follow_status="{{$follow_status}}" >{{$follow}}</a>
            <?php } else {?>
            <p class="follow_already"><a href="" class="box" user_store_id="{{md5($user_store_id)}}" follow_status="{{$follow_status}}">{{$following}}</a>
            <?php }?>
		</p>
      </div>
        <!-- <iframe id="follow_iframe" src="/iframe/store/follow_header?position=box&follow=<?php echo $follow_status?>&follow_count=<?php echo $follow_count?>" style="float:right; width:100px; height:26px; margin:8px 12px 0 0; background-color:transparent; vertical-align:middle;" scrolling="no" frameborder="0"></iframe>-->
    </div>
    <!-- /FollowBox -->

</div>






<!-- PopupAlertFollow/ -->
<div id="dummy_modal" class="ng-scope">
	<div id="modal-win" style="top: 200px; display: none">
		<div id="modal-bg" style="opacity: 1;"></div>
		<div id="modal-win-inner">
			<div class=modal_contents>
				<div id="popup_alert_follow" class="fancybox popup_alert">
				    <p class="image"><img src="/img/icon_attention_big_gray.png" alt="Flow">
				    </p>
				    <p class="text">Bạn không thể theo dõi cửa hàng của chính mình</p>
				</div>
				<p class="btn_modal_close">
					<a class="modal-close" href="#">
					{{HTML::image('img/main_page/btn_modal_close.png', 'Information') }}
					</a>
				</p>
			</div>
		</div>
	</div>
</div>
<!-- /PopupAlertFollow -->
<style>
#follow .follow_already a {
    background: url("../img/main_page/icon_check_white.png") no-repeat scroll 12px center #aaa;
}
.popup_alert {
    display: block!important;
}
#modal-win {
    position: absolute;
    width: 100%;
}
.modal_contents .btn_modal_close {
    position: absolute;
    right: -15px;
    top: -15px;
}
#modal-win-inner {
    background-color: #fff;
    border-radius: 4px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    margin: 0 auto;
    position: relative;
    width: 500px;
    z-index: 101;
}
#modal-bg {
    background: url("../img/main_page/fancybox_overlay.png") repeat scroll 0 0 rgba(0, 0, 0, 0);
    cursor: pointer;
    height: 100%;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 100;
}
#follow a.box:hover {
    opacity: 0.8;
}
#follow .follow_already a.box {
    background: url("../img/main_page/icon_check_white.png") no-repeat scroll 7px center #aaa;
}
#follow a.box {
    background: url("../img/main_page/icon_plus.png") no-repeat scroll 8px center #177dc0;
    font-size: 12px;
    height: 26px;
    line-height: 26px;
    padding-left: 14px;
    width: 86px;
}
</style>
<script>
    var I18n = I18n.translations.ja.js;
    //I18n.locale = 'ja';
    I18n.locale = '{{$language}}';
    I18n.fb_locale = 'ja_JP';
    document.getElementById('cart_button').style.position = 'fixed';

    $('#cart_button a').fancybox({
        afterLoad: function() {
            _gaq.push(['_trackPageview', '/#!/cart']);
        }
    });

    //FollowBox
    $(function() {
        var followBox = $('.follow_box');
        followBox.hide();
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                followBox.fadeIn();
            } else {
                followBox.fadeOut();
            }
        });
    });
    var login_user = "<?php echo Session::get('user.id') ?>";
    var login_user_md5 = "<?php echo md5(Session::get('user.id')) ?>";
    $(document).ready(function(){
        var follow = "<?php echo $follow ?>";
        var following = "<?php echo $following ?>";
    	 $(document).on('click', '#follow p a', function(e){
        	 var btn=$(this);

        	 var store_user_id = $(btn).attr("user_store_id");
        	 if(login_user_md5 == store_user_id) {
        		 $('#modal-win').show();
        		 return;
        	 }
        	 if(login_user == "") {
            	 // Not login
        		 window.location.href = "/login?store_user_id=" + store_user_id + "&redirect_url=" + window.location.href;
        	 } else {
            	 var follow_status = $(btn).attr('follow_status');
            	 $.ajax({
                     type: "POST",
                     url: "/do_follow",
                     data: {
                    	 store_user_id: store_user_id,
                    	 login_user:login_user
                     },
                     global: true,
                     dataType: 'json',
                     success: function(response) {
                     	if(response==1) {
                     		if($(btn).parent().hasClass('follow_already')) {
                         		// Following -> Follow
                         		var following_btn = $('#follow p.follow_already');
                         		$(following_btn).children().text(follow);
                         		$(following_btn).removeClass('follow_already');

                     		} else {
                     		// Follow -> Following
                     		var follow_btn = $('#follow p').not('.follow_already');
                     		$(follow_btn).children().text(following);
                     		$(follow_btn).addClass('follow_already');
                     		}
                     	} else {
                     		alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
                     		return;
                     	}
                     },
                     error: function(XMLHttpRequest, textStatus, errorThrown) {
                     },
                 });
        	 }
    	 });
    	 $('.follow_box .close').on('click', function(){
			$('.follow_box').hide();
        });
    	 $('#modal-bg,a.modal-close').on('click', function(e){
    			e.preventDefault();
    			$('#modal-win').hide();
    		});
    });
</script>

<script src='//platform.twitter.com/widgets.js'></script>
<script type="text/javascript">
    if (!NREUMQ.f) {
        NREUMQ.f = function() {
            NREUMQ.push(["load", new Date().getTime()]);
            var e = document.createElement("script");
            e.type = "text/javascript";
            e.src = (("http:" === document.location.protocol) ? "http:" : "https:") + "//" +
                "js-agent.newrelic.com/nr-100.js";
            document.body.appendChild(e);
            if (NREUMQ.a) NREUMQ.a();
        };
        NREUMQ.a = window.onload;
        window.onload = NREUMQ.f;
    };
    NREUMQ.push(["nrfj", "beacon-2.newrelic.com", "34671cb182", "1739642", "cglXTEtbWAhWSx5EEl4UXEsWR1wLRA==", 0, 19, new Date().getTime(), "", "", "", "", ""]);
</script>
@stop