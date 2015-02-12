
<div class="wrapper" id="store_cart" ng-init="about()">
  <div class="height_fix">
    <div id="header_basic">
      <h1 id="store_logo" ng-style="styles.store_logo">
        <a href="/" ng-show="styles.logo"><span class="mark"><img ng-src="{[logo_src]}" alt="logo" /></span></a>
        <a href="/" ng-hide="styles.logo"><span class="txt">{[styles.name]}</span></a>
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
    <div class="box_wht" ng-hide="accepted">
      <h2>Giới thiệu</h2>
      <!-- Account/ -->
      <div class="account">
        <p id="store_image" style="display:table-cell; vertical-align:middle;"><img ng-src="{[profile.profile_image.src_url]}"></p>
        <div id="store_info" style="display:table-cell; vertical-align:middle;">
          <h3>{[styles.name]}</h3>
          <p>{[profile.name]}</p>
          <iframe ng-src="{[ stores_domain ]}/iframe/store/follow_about" width="145" height="40" scrolling="no" frameborder="0" sp-if="follow"></iframe>
        </div>
      </div>
      <!-- /Account -->
      <div id="store_about" style="overflow: auto; white-space: pre-wrap; word-wrap: break-word;">{[data.detail]}</div>
      <dl class="about_links">
        <dd ng-show="data.links.twitter">
          <a ng-href="https://twitter.com/{[data.links.twitter]}" target="_blank">
            <img src="/img/icon_about_tw.gif" height="29" width="29" alt="">
          </a>
        </dd>
        <dd ng-show="data.links.facebook">
          <a ng-href="https://www.facebook.com/{[data.links.facebook]}" target="_blank">
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

<!-- FOOTER/ -->
<div id="store_item_footer">
  <div id="store_footer_inner">
    <ul class="navi fl_l">
      <li><a href="#!/inquiry" class="contact">ãŠå•ã„åˆã‚ã›</a></li>
      <li><a href="#!/tokushoho" class="tokusho">ç‰¹å®šå•†å–å¼•æ³•ã«é–¢ã™ã‚‹è¡¨è¨˜</a></li>
    </ul>
    <div class="stores">
      <p><a href="https://stores.jp/?via={[ via ]}&id={[user_name]}" target="_blank" ng-mouseover="footer_mouse_over()"><img src="/img/logo_footer.png" alt="ãƒãƒƒãƒˆã‚·ãƒ§ãƒƒãƒ—ã®é–‹æ¥­ãªã‚‰STORES.jp"></a></p>
    </div>
  </div>
</div>
<!-- /FOOTER -->

<!-- POPUP/ -->
<div style="display: none;">
  <div id="popup_cart" class="box_wht">
    <h2><span class="icon_cart">{[I18n.store.cart.title]}</span></h2>
    <dl id="cart_items">
      <dd class="title">
        <dl>
          <dd class="sz_l">{[I18n.store.cart.item]}</dd>
          <dd class="sz_s tc">{[I18n.store.cart.category]}</dd>
          <dd class="sz_s tr">{[I18n.store.cart.price]}</dd>
          <dd class="sz_s tc">{[I18n.store.cart.quantity]}</dd>
          <dd class="sz_s tr">{[I18n.store.cart.total]}</dd>
        </dl>
      </dd>
      <dd class="lists" ng-repeat="cart_item in cart.items">
        <dl>
          <dd class="sz_xs btn_delete_mini"><a href="" ng-click="cart.remove(cart_item)">Delete</a></dd>
          <dd class="sz_i"><img ng-src="{[cart_item.image.src]}" /></dd>
          <dd class="sz_l">{[cart_item.name]}</dd>
          <dd class="sz_s tc">{[cart.null_to_hyphen(cart_item.variation)]}</dd>
          <dd class="sz_s tr">Â¥{[cart_item.price | number:0]}</dd>
          <dd class="sz_s tc">{[cart_item.quantity]}</dd>
          <dd class="sz_s tr">Â¥{[(cart_item.price * cart_item.quantity) | number:0]}</dd>
        </dl>
      </dd>
      <dd class="lists shipping">
        <dl>
          <dd class="sz_m tr">{[I18n.store.cart.shippingFee]}</dd>
          <dd class="sz_s tr">Â¥{[cart.shipping_fee | number:0]}</dd>
        </dl>
      </dd>
      <dd class="lists total">
        <dl>
          <dd class="sz_m tr">{[I18n.store.cart.subtotal]}</dd>
          <dd class="sz_s tr">Â¥{[cart.total | number:0]}</dd>
        </dl>
      </dd>
    </dl>
    <!-- <p class="btn_high_big cart" ng-show="cart.items.length > 0" style="padding-bottom: 20px;"><button id="checkout_button" type='button'>{[I18n.store.cart.check]}</button></p> -->
    <p ng-show="cart.items.length > 0" style="width: 300px; margin: 0 auto;">
      <iframe src="/iframe/store/cart_popup" style="background-color: transparent;" scrolling="no" frameborder="0"></iframe>
    </p>
  </div>
</div>
<!-- /POPUP -->

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
