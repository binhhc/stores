
<div class="wrapper" id="store_cart" ng-init="about()">
  <div class="height_fix">
    @include('elements.user_header_others', array('store_main_menu'=>$store_main_menu))
    <div class="box_wht" ng-hide="accepted">
      <h2>{{$store_about['label_about']}}</h2>
      <!-- Account/ -->
      <div class="account">
        <p id="store_image" style="display:table-cell; vertical-align:middle;"><img ng-src="{[profile.profile_image.src_url]}"></p>
        <div id="store_info" style="display:table-cell; vertical-align:middle;">
          <h3>{[styles.name]}</h3>
          <p>{[profile.name]}</p>
            <?php if($on_off_follow == 1) {?>
	          <div id="follow" class="follow_about">
		      <?php if($follow_status == 0) { ?>
		        <p class="follow_btn">
		        	<a href="" class="about"  user_store_id="{{md5($user_store_id)}}" follow_status="{{$follow_status}}" >{{$follow}}</a>
		        </p>
		       <?php }else {?>
		        <p class="follow_btn follow_already" >
					<a href="" class="about" user_store_id="{{md5($user_store_id)}}" follow_status="{{$follow_status}}">{{$following}}</a>
				</p>
				<?php }?>
		      </div>
		      <?php }?>
          <!-- <iframe ng-src="{[ stores_domain ]}/iframe/store/follow_about" width="145" height="40" scrolling="no" frameborder="0" sp-if="follow"></iframe> -->
        </div>
      </div>
      <!-- /Account -->
      <div id="store_about" style="overflow: auto; white-space: pre-wrap; word-wrap: break-word;">{[data.detail]}</div>
      <dl class="about_links">
        <dd ng-show="data.links.twitter">
          <a ng-href="{[data.links.twitter]}" target="_blank">
            <img src="/img/icon_about_tw.gif" height="29" width="29" alt="">
          </a>
        </dd>
        <dd ng-show="data.links.facebook">
          <a ng-href="{[data.links.facebook]}" target="_blank">
            <img src="/img/icon_about_fb.gif" height="29" width="29" alt="">
          </a>
        </dd>
        <dd ng-show="data.links.website">
          <a ng-href="{[data.links.website]}" target="_blank">
            <img src="/img/icon_about_hp.gif" height="29" width="29" alt="">
          </a>
        </dd>
        <dd style="margin:-50px 10px 0 10px;" ng-show="data.links.exblog">
          <a ng-href="{[data.links.exblog]}" target="_blank">
            <img src="/img/icon_about_excite.png" height="29" width="24" alt="">
          </a>
        </dd>
      </dl>
    </div>
  </div>
</div>
<!-- /PopupAlertFollow -->
<!-- FOOTER/ -->
<div id="store_item_footer">
@include('elements.user_footer')
</div>
<!-- /FOOTER -->

<!-- POPUP/ -->
@include('elements.user_cart')
<!-- /POPUP -->
<style>
.follow_about .follow_btn a:hover {
    opacity: 0.8;
}
#follow .follow_btn.follow_already a.about {
    background: url("../img/main_page/icon_check_white.png") no-repeat scroll 15px center #999;
}
#follow .follow_btn a.about {
    background: url("../img/main_page/icon_plus.png") no-repeat scroll 15px center #0083d2;
    border-radius: 2px;
    color: #fff;
    display: block;
    font-size: 13px;
    height: 30px;
    line-height: 30px;
    padding-left: 15px;
    text-align: center;
    text-decoration: none;
    width: 130px;
}
</style>
<script>
  $(document).ready(function() {
    $('.img_big a').fancybox();

    $('#checkout_button').click(function() {
      $('.fancybox-close').click();
      var iframe = window.frames['stores_iframe'];
      if (iframe) {
        iframe.postMessage(localStorage.cart, '*');
        location.replace(STORES_JP.ORIGIN + '/#!/checkout');
      } else {
        location.hash = '#!/checkout';
      }
    });

  });
  $(function(){
    $('.btn_dropdown').on({
      'mouseenter':function(){
        $(this).find('.dropdown').fadeIn(100);
      },
      'mouseleave':function(){
        $(this).find('.dropdown').fadeOut(100);
      }
    });
    $('#temp_select').change(function(){
      var temp = $(this).val();
      $('#layout_pattern').removeClass().addClass('layout_'+temp);
    })
  });
</script>
