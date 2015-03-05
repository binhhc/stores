<div id="preview" name="preview_delay_5000" ng-init="index()" infinite-scroll="page_scroll()"  infinite-scroll-disabled=disable_flag infinite-scroll-distance="5">
  <input type='hidden' name='footer_fixed' value='false'>
  <div id="layout_pattern" ng-class="styles.layout">
    @include('elements.user_header', array('store_main_menu'=>$store_main_menu))
    
    <h1 ng-repeat="cate in categories" ng-if="cate.id == category" id="category_title">{[cate.name]}</h1>
    <div id='item_list' >
      <div ng-repeat="item in items" ng-style="styles.css.items" class="items">
        <a ng-href="#!/items/{[item.id]}">
          <div class="item_inner" ng-style="styles.css.item_inner" ng-class="styles.class.item_inner">
            <div class="thumb" >
              <img ng-src="{[item.images[0].src]}" width="100%" alt="{[item.name]}" onload="ImageGuide();">
              <span class="sticker" ng-if="show_sticker && item.sticker.store_image_path"><img ng-src="{[item.sticker.store_image_path]}"></span>
            </div>
            <div class="data">
              <dl>
                <dd class="name"><h2>{[item.name]}</h2></dd>
                <dd class="price" ng-show="item.quantity > 0">{[item.price | number:0]} <?php echo Config::get('constants.item.currency'); ?></dd>
                <dd class="price soldout ng-binding" ng-hide="item.quantity > 0"><img src="/img/icon_soldout.png" alt="SOLD OUT"></dd>
                <dd class="mybook_sale" style="height: 18px;" ng-show="{[item.sale_flag]}"><img src="/img/icon_mybook_sale.png" alt="SALE"></dd>
               </dl>
            </div>
          </div>
        </a>
      </div>
      <div ng-show='disable_flag' align="center"><img src="/img/store_loader.gif"></div>
    </div>
  </div>
  <!-- Footer/ -->
<div id="store_item_footer">
    @include('elements.user_footer')
</div>
  <!-- /Footer -->
</div>

<!-- Popup/ -->
@include('elements.user_cart')
<!-- /Popup -->

<script>
  //mixpanel.track("Shop Show", {'shop_referre': document.referrer.split("/")[2]});
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

  function ImageGuide() {
    $(".thumb").css( "background-image", "none");
  }

</script>
