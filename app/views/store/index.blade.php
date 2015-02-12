<div id="preview" name="preview_delay_5000" ng-init="index()" infinite-scroll="page_scroll()"  infinite-scroll-disabled=disable_flag infinite-scroll-distance="5">
  <input type='hidden' name='footer_fixed' value='false'>
  <div id="layout_pattern" ng-class="styles.layout">
    <div id='header'>
      <h1 id="store_logo">
        <a href="/">
          <span class="mark" ng-show="styles.logo"><img ng-src="{[logo_src]}" alt="{[styles.name]}"></span>
          <span class="txt" ng-hide="styles.logo">{[styles.name]}</span>
        </a>
      </h1>
      <div id="navi_main" style="display:none;" ng-show="categories || hasAbout || showVirtualStore || news_navi">
        <dl style="font-family: Arial">
          <dd><a href="/">TRANG CHỦ</a></dd>
          <dd sp-controller="NewsController" addon="news" sp-show ng-show="news_navi"><a href="#!/news">TIN TỨC</a></dd>
          <dd ng-show="hasAbout"><a href="#!/about">GIỚI THIỆU</a></dd>
          <dd class="btn_dropdown" ng-show="categories">
            <a href="">DANH MỤC</a>
            <ul class="dropdown">
              <li ng-repeat="category in categories"><a ng-click="category_click(category.id)">{[category.name]}</a></li>
            </ul>
          </dd>
          <dd ng-show="showVirtualStore"><a href="{[virtualStore.url]}" target="_blank">VIRTUAL STORE</a></dd>
        </dl>
      </div>
    </div>
    
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
  <div id="store_footer">
    <div id="store_footer_inner">
      <ul class="navi fl_l">
        <li><a href="#!/inquiry" class="contact">Liên hệ</a></li>
        <li><a href="#!/tokushoho" class="tokusho">Các ký hiệu về luật thương mại</a></li>
      </ul>
      <div class="stores">
        <p><a href="https://stores.jp/?via={[ via ]}&id={[user_name]}" target="_blank" ng-mouseover="footer_mouse_over()"><img src="/img/logo_footer.png" alt="ネットショップの開業ならSTORES.jp"></a></p>
      </div>
    </div>
  </div>
  <!-- /Footer -->
</div>

<!-- Popup/ -->
<div style="display: none;">
  <div id="popup_cart" class="box_wht">
    <h2><span class="icon_cart">{[I18n.store.cart.title]}</span></h2>
    <dl id="cart_items">
      <dd class="title">
        <dl>
          <dd class="sz_l">{[I18n.store.cart.item]}</dd>
          <dd class="sz_s tl">{[I18n.store.cart.category]}</dd>
          <dd class="sz_s tr">{[I18n.store.cart.price]}</dd>
          <dd class="sz_s tc">{[I18n.store.cart.quantity]}</dd>
          <dd class="sz_s tr">{[I18n.store.cart.total]}</dd>
        </dl>
      </dd>
      <dd class="lists" ng-repeat="cart_item in cart.items">
        <dl>
          <dd class="sz_xs btn_delete_mini"><a href="" ng-click="cart.remove(cart_item)">Delete</a></dd>
          <dd class="sz_i"><img ng-src="{[cart_item.image.src]}"></dd>
          <dd class="sz_l">{[cart_item.name]}</dd>
          <dd class="sz_s tl">{[cart.null_to_hyphen(cart_item.variation)]}</dd>
          <dd class="sz_s tr"><?php echo Config::get('constants.item.currency'); ?>{[cart_item.price | number:0]}</dd>
          <dd class="sz_s tc">{[cart_item.quantity]}</dd>
          <dd class="sz_s tr"><?php echo Config::get('constants.item.currency'); ?>{[(cart_item.price * cart_item.quantity) | number:0]}</dd>
        </dl>
      </dd>
      <dd class="lists shipping">
        <dl>
          <dd class="sz_m tr">{[I18n.store.cart.shippingFee]}</dd>
          <dd class="sz_s tr"><?php echo Config::get('constants.item.currency'); ?>{[cart.shipping_fee | number:0]}</dd>
        </dl>
      </dd>
      <dd class="lists total">
        <dl>
          <dd class="sz_m tr">{[I18n.store.cart.subtotal]}</dd>
          <dd class="sz_s tr"><?php echo Config::get('constants.item.currency'); ?>{[cart.total | number:0]}</dd>
        </dl>
      </dd>
    </dl>
    <!-- <p class="btn_high_big cart" ng-show="cart.items.length > 0" style="padding-bottom: 20px;"><button id="checkout_button" type='button'>{[I18n.store.cart.check]}</button></p> -->
    <div ng-show="cart.items.length > 0" style="width: 300px; margin: 0 auto;">
      <iframe ng-src="{[ stores_domain ]}/iframe/store/cart_popup" style="background-color: transparent; overflow: visible;" name="cart_popup" id="cart_popup" scrolling="no" frameborder="0" sp-if="follow"></iframe>
      <p class="btn_high_big cart" style="padding-bottom: 20px;"><button id="checkout_button" type="button" class="ng-binding" sp-hide="follow">{[I18n.store.cart.check]}</button></p>
    </div>
  </div>
</div>
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
