<div class="wrapper" id="store_cart" ng-init="inquiry()">
  <div class="height_fix">
    <div id="header_basic">
      <h1 id="store_logo" ng-style="styles.store_logo">
        <a href="/" ng-show="styles.logo"><span class="mark"><img ng-src="{[logo_src]}" alt="logo" /></span></a>
        <a href="/" ng-hide="styles.logo"><span class="txt">{[styles.name]}</span></a>
      </h1>
      <div id="navi_main" style="display:none;" ng-show="categories || hasAbout || showVirtualStore || news_navi">
        <dl style="font-family: Allerta">
          <dd><a href="/">HOME</a></dd>
          <dd sp-controller="NewsController" addon="news" sp-show ng-show="news_navi"><a href="#!/news">NEWS</a></dd>
          <dd ng-show="hasAbout"><a href="#!/about">ABOUT</a></dd>
          <dd class="btn_dropdown" ng-show="categories">
            <a href="">CATEGORY</a>
            <ul class="dropdown">
              <li ng-repeat="category in categories"><a ng-click="category_click(category.name)">{[category.name]}</a></li>
            </ul>
          </dd>
          <dd ng-show="showVirtualStore"><a href="{[virtualStore.url]}" target="_blank">VIRTUAL STORE</a></dd>
        </dl>
      </div>
    </div>
    <!-- Contact/ -->
    <div class="box_wht" ng-hide="accepted">
      <h2>{[I18n.store.inquiry.title]}</h2>
      <form name="form" ng-submit="submit()" novalidate>
        <dl class="form_basic border_bottom spb">
          <dd>
            <dl class="cols no_border">
              <dt>{[I18n.store.inquiry.nameInfo]}</dt>
              <dd>
                <ul>
                  <li>{[I18n.store.inquiry.firstName]}</li>
                  <li><input class="sz_sm" type="text" name="last_name" ng-model="customer.last_name" required></li>
                  <li>{[I18n.store.inquiry.lastName]}</li>
                  <li><input class="sz_sm" type="text" name="first_name" ng-model="customer.first_name" required></li>
                </ul>
                <span class="error" ng-show="(form.last_name.$invalid && (form.last_name.$dirty || clicked_submit)) || (form.first_name.$invalid && (form.first_name.$dirty || clicked_submit))">{[I18n.store.error.name]}</span>
              </dd>
            </dl>
          </dd>
          <dd>
            <dl class="cols">
              <dt>{[I18n.store.inquiry.email]}</dt>
              <dd><input class="sz_l" type="email" name="email" ng-model="customer.email" required><span class="error" ng-show="(form.email.$invalid && (form.email.$dirty || clicked_submit))">{[I18n.store.error.email]}</span></dd>
            </dl>
          </dd>
          <dd>
            <dl class="cols">
              <dt>{[I18n.store.inquiry.question]}</dt>
              <dd><textarea name="body" id="" cols="30" rows="10" ng-model="customer.body" required></textarea><span class="error" ng-show="(form.body.$invalid && (form.body.$dirty || clicked_submit))">{[I18n.store.error.question]}</span></dd>
            </dl>
          </dd>
        </dl>
        <ul class="btn_pair" style="text-align: center;">
          <li class="btn_low" ng-hide="pending">
            <button type='button' onclick="history.back()">{[I18n.store.inquiry.cancel]}</button>
          </li>
          <li class="btn_high" ng-hide="pending">
            <button type='submit'>{[I18n.store.inquiry.send]}</button>
          </li>
          <li class="btn_low" ng-show="pending"><button type='button' disabled>{[I18n.store.inquiry.sending]}</button></li>
        </ul>
      </form>
    </div>
    <div class="box_wht" style="padding-bottom:30px;" ng-show="accepted">
      <h2>{[I18n.store.inquiry.title]}</h2>
      <p style="text-align:center; font-size:20px; margin:30px;">{[I18n.store.inquiry.done]}</p>
      <div class="btn_high"><a href="/" style="margin:auto;">{[I18n.store.show.back]}</a></div>
    </div>
    <!-- /Contact -->
  </div>
</div>
<!-- Footer/ -->
<div id="store_item_footer">
  @include('elements.user_footer')
</div>
<!-- /Footer -->

<!-- Popup/ -->
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
          <dd class="sz_s tr">¥{[cart_item.price | number:0]}</dd>
          <dd class="sz_s tc">{[cart_item.quantity]}</dd>
          <dd class="sz_s tr">¥{[(cart_item.price * cart_item.quantity) | number:0]}</dd>
        </dl>
      </dd>
      <dd class="lists shipping">
        <dl>
          <dd class="sz_s tr">{[I18n.store.cart.shippingFee]}</dd>
          <dd class="sz_s tr">¥{[cart.shipping_fee | number:0]}</dd>
        </dl>
      </dd>
      <dd class="lists total">
        <dl>
          <dd class="sz_s tr">{[I18n.store.cart.subtotal]}</dd>
          <dd class="sz_s tr">¥{[cart.total | number:0]}</dd>
        </dl>
      </dd>
    </dl>
    <!-- <p class="btn_high_big cart" ng-show="cart.items.length > 0" style="padding-bottom: 20px;"><button id="checkout_button" type='button'>{[I18n.store.cart.check]}</button></p> -->
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
