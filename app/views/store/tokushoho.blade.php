
<div class="wrapper" id="store_cart" ng-init="tokushoho()">
  <div class="height_fix">
    <div id="header_basic">
      <h1 id="store_logo" ng-style="styles.store_logo">
        <a href="/" ng-show="styles.logo"><span class="mark"><img ng-src="{{logo_src}}" alt="logo"></span></a>
        <a href="/" ng-hide="styles.logo"><span class="txt">{{styles.name}}</span></a>
      </h1>
      <div id="navi_main" style="display:none;" ng-show="categories || hasAbout || showVirtualStore || news_navi">
        <dl style="font-family: Allerta">
          <dd><a href="/">HOME</a></dd>
          <dd sp-controller="NewsController" addon="news" sp-show ng-show="news_navi"><a href="#!/news">NEWS</a></dd>
          <dd ng-show="hasAbout"><a href="#!/about">ABOUT</a></dd>
          <dd class="btn_dropdown" ng-show="categories">
            <a href="">CATEGORY</a>
            <ul class="dropdown">
              <li ng-repeat="category in categories"><a ng-click="category_click(category.name)">{{category.name}}</a></li>
            </ul>
          </dd>
          <dd ng-show="showVirtualStore"><a href="{{virtualStore.url}}" target="_blank">VIRTUAL STORE</a></dd>
        </dl>
      </div>
    </div>
    <div class="box_wht" ng-hide="accepted">
      <h2>{{I18n.store.tokushoho.title}}</h2>
      <ul class="terms_link">
        <li class="current"><a href="#!/tokushoho/">{{I18n.store.tokushoho.buttonTokushoho}}</a></li>
        <li><a href="#!/terms/">{{I18n.store.tokushoho.buttonTerms}}</a></li>
        <li><a href="#!/privacy_policy/">{{I18n.store.tokushoho.buttonPrivacyPolicy}}</a></li>
      </ul>
      <div class="store_tokushoho">
        <div>
          <h4>{{I18n.store.tokushoho.price}}</h4>
          <p>{{data.price}}</p>
        </div>
        <div>
          <h4>{{I18n.store.tokushoho.payment}}</h4>
          <p>{{data.period}}</p>
        </div>
        <div>
          <h4>{{I18n.store.tokushoho.returning}}</h4>
          <p>{{data.refund}}</p>
        </div>
        <div>
          <h4>{{I18n.store.tokushoho.merchandise}}</h4>
          <p>{{data.shipment}}</p>
        </div>
        <div>
          <h4>{{I18n.store.tokushoho.contact}}</h4>
          <p>{{data.contact}}</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer/ -->
<div id="store_item_footer">
  <div id="store_footer_inner">
    <ul class="navi fl_l">
      <li><a href="#!/inquiry" class="contact">お問い合わせ</a></li>
      <li><a href="#!/tokushoho" class="tokusho">特定商取引法に関する表記</a></li>
    </ul>
    <div class="stores">
      <p><a href="https://stores.jp/?via={{ via }}&id={{user_name}}" target="_blank" ng-mouseover="footer_mouse_over()"><img src="/img/logo_footer.png" alt="ネットショップの開業ならSTORES.jp"></a></p>
    </div>
  </div>
</div>
<!-- /Footer -->

<!-- Popup/ -->
<div style="display: none;">
  <div id="popup_cart" class="box_wht">
    <h2><span class="icon_cart">{{I18n.store.cart.title}}</span></h2>
    <dl id="cart_items">
      <dd class="title">
        <dl>
          <dd class="sz_l">{{I18n.store.cart.item}}</dd>
          <dd class="sz_s tc">{{I18n.store.cart.category}}</dd>
          <dd class="sz_s tr">{{I18n.store.cart.price}}</dd>
          <dd class="sz_s tc">{{I18n.store.cart.quantity}}</dd>
          <dd class="sz_s tr">{{I18n.store.cart.total}}</dd>
        </dl>
      </dd>
      <dd class="lists" ng-repeat="cart_item in cart.items">
        <dl>
          <dd class="sz_xs btn_delete_mini"><a href="" ng-click="cart.remove(cart_item)">Delete</a></dd>
          <dd class="sz_i"><img ng-src="{{cart_item.image.src}}" /></dd>
          <dd class="sz_l">{{cart_item.name}}</dd>
          <dd class="sz_s tc">{{cart.null_to_hyphen(cart_item.variation)}}</dd>
          <dd class="sz_s tr">¥{{cart_item.price | number:0}}</dd>
          <dd class="sz_s tc">{{cart_item.quantity}}</dd>
          <dd class="sz_s tr">¥{{(cart_item.price * cart_item.quantity) | number:0}}</dd>
        </dl>
      </dd>
      <dd class="lists shipping">
        <dl>
          <dd class="sz_s tr">{{I18n.store.cart.shippingFee}}</dd>
          <dd class="sz_s tr">¥{{cart.shipping_fee | number:0}}</dd>
        </dl>
      </dd>
      <dd class="lists total">
        <dl>
          <dd class="sz_s tr">{{I18n.store.cart.subtotal}}</dd>
          <dd class="sz_s tr">¥{{cart.total | number:0}}</dd>
        </dl>
      </dd>
    </dl>
    <!-- <p class="btn_high_big cart" ng-show="cart.items.length > 0" style="padding-bottom: 20px;"><button id="checkout_button" type='button'>{{I18n.store.cart.check}}</button></p> -->
    <p ng-show="cart.items.length > 0" style="width: 300px; margin: 0 auto;">
      <iframe src="/iframe/store/cart_popup" style="background-color: transparent;" scrolling="no" frameborder="0"></iframe>
    </p>
  </div>
</div>
<!-- /Popup -->

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
