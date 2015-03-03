
<div id="store_cart" class="wrapper" ng-init="checkout()">
  <div class="height_fix">
    <div id="header_basic">
      <h1 id="store_logo">
        <a href="/" ng-show="styles.logo"><span class="mark"><img ng-src="{[logo_src]}" alt="logo" class="checkout_logo"></span></a>
        <a href="/" ng-hide="styles.logo"><span class="txt">{[styles.name]}</span></a>
      </h1>
    </div>
    <div class="step" ng-class="{en: I18n.locale == 'en'}">
      <p class="img"><img ng-src="/img/step{[ step ]}.png"></p>
      <p class="step1">{[I18n.store.checkout.input]}</p>
      <p class="step2">{[I18n.store.checkout.confirm]}</p>
      <p class="step3">{[I18n.store.checkout.complete]}</p>
    </div>
    <form name="form" ng-submit="submit()" novalidate>
      <!-- Cart/ -->
      <!-- CreditCardPaymentError -->
      <div style="background-color:#fff; padding:15px; border:3px solid red; color: red; margin-bottom: 30px; text-align: center; font-size: 20px; font-weight:bold; display: none;" ng-show="error_credit">{[I18n.store.error.credit.checkout]}</div>
      <!-- BankTransferPaymentError -->
      <div style="background-color:#fff; padding:15px; border:3px solid red; color: red; margin-bottom: 30px; text-align: center; font-size: 20px; font-weight:bold; display: none;" ng-show="error_bank_transfer">{[I18n.store.error.bank_transfer.checkout]}</div>
      <!-- ConvenienceStorePaymentError -->
      <div style="background-color:#fff; padding:15px; border:3px solid red; color: red; margin-bottom: 30px; text-align: center; font-size: 20px; font-weight:bold; display: none;" ng-show="error_convenience_store_payment">{[I18n.store.error.convenience_store_payment.checkout]}</div>

      <!-- error_asukanet_order error -->
      <div style="background-color:#fff; padding:15px; border:3px solid red; color: red; margin-bottom: 30px; text-align: center; font-size: 20px; font-weight:bold; display: none;" ng-show="error_asukanet_order">{[error_asukanet_order_msg]}</div>

      <div class="box_wht">
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
              <dd class="sz_s tl">{[cart_item.variation]}</dd>
              <dd class="sz_s tr"><?php echo Config::get('constants.item.currency'); ?>{[cart_item.price | number:0]}</dd>
              <dd class="sz_s tc">{[cart_item.quantity]}</dd>
              <dd class="sz_s tr"><?php echo Config::get('constants.item.currency'); ?>{[(cart_item.price * cart_item.quantity) | number:0]}</dd>
            </dl>
          </dd>
          <dd class="lists shipping checkout">
            <dl>
              <dd class="sz_ex tr">{[I18n.store.cart.shippingFee]}</dd>
              <dd class="sz_s tr"><?php echo Config::get('constants.item.currency'); ?>{[cart.shipping_fee | number:0]}</dd>
            </dl>
          </dd>
          <dd class="lists shipping checkout" ng-show="customer.payment_method && customer.payment_method[2] > 0">
            <dl>
              <dd class="sz_ex tr">{[customer.payment_method[1]]}æ‰‹æ•°æ–™</dd>
              <dd class="sz_s tr"><?php echo Config::get('constants.item.currency'); ?>{[customer.payment_method[2] | number:0]}</dd>
            </dl>
          </dd>
          <dd class="lists shipping checkout" style="display:none;" ng-show="coupon">
            <dl>
                <dd class="sz_s tr">{[I18n.store.checkout.coupon]}</dd>
              <dd class="sz_s tr" style="color: red;">- <?php echo Config::get('constants.item.currency'); ?>{[coupon.price | number:0]}</dd>
            </dl>
          </dd>
          <dd class="lists total checkout">
            <dl>
                <dd class="sz_ex tr">{[I18n.store.cart.total]}</dd>
              <dd class="sz_s tr"><?php echo Config::get('constants.item.currency'); ?>{[cart.total | number:0]}</dd>
            </dl>
          </dd>
          <dd class="coupon" ng-hide="(coupon || !enable_coupon) || cart.items[0].mybook_item">
            <dl>
              <dt class="">{[I18n.store.checkout.couponCode]}</dt>
              <dd class=""><input type="text" ng-model="couponCode"></dd>
              <dd><button type="button" ng-click="useCoupon(couponCode)">{[I18n.store.checkout.couponUse]}</button></dd>
            </dl>
            <span id="error_coupon" class="error" style="display:none;" ng-show="errors.coupon[0]">{[errors.coupon[0]]}</span>
          </dd>
        </dl>
      </div>
      <!-- /Cart -->
      <!-- Shipping/ -->
      <div class="box_wht" ng-include="'/partials/c/shared/checkout_shipping'">
      </div>
      <!-- /Shipping -->
      <!-- Gift/ -->
      <div sp-controller="GiftFormController" addon="gift_form" sp-show>
        <div class="box_wht" ng-include="'/partials/c/shared/checkout_other_shipping'">
        </div>
      </div>
      <!-- /Gift -->
      <!-- Card/ -->
      <div class="box_wht" ng-include="'/partials/c/shared/checkout_card'">
      </div>
      <!-- /Card -->

      <!-- ReceiveMethod/ -->
      <div sp-show="receive_method">
        <div class="box_wht" ng-include="'/partials/c/shared/receive_method'">
        </div>
      </div>
      <!-- /ReceiveMethod -->

      <!-- Member/ -->
      <div class="box_wht store_cart_member" style="overflow:hidden;" ng-hide="customer.login" sp-if="follow">
        <h2 ng-bind="I18n.follow.member.registration"></h2>
        <div class="caution_box">
          <div class="styled_checkbox">
            <input id="signup_terms" type="checkbox" name="" ng-model="customer.signup_terms">
            <span class="checked-{[customer.signup_terms]}"></span>
          </div>
          <label for="signup_terms" ng-bind-html-unsafe="I18n.follow.member.aggree_terms_html"></label>
          <p class="text" ng-bind-html-unsafe="I18n.follow.member.registration_note_html1"></p>
          <p class="note" ng-bind-html-unsafe="I18n.follow.member.registration_note_html2"></p>
        </div>
        <dl class="form_basic" ng-show="customer.signup_terms">
          <dd>
            <dl class="cols">
              <dt ng-bind="I18n.follow.member.password"></dt>
              <dd>
                <input class="sz_l" type="password" name="password" ng-minlength="6" ng-model="customer.password" ng-required="customer.signup_terms" ng-class="{error: is_field_invalid(form.password, true)}">
                <span class="error" ng-show="is_field_invalid(form.password)" ng-bind="I18n.follow.member.error.password.min_length"></span>
              </dd>
            </dl>
          </dd>
        </dl>
      </div>
      <!-- /Member -->
      <!-- Button/ -->
      <div class="store_cart_button box_wht">
        <p class="btn_high"><button type="submit">{[I18n.store.checkout.credit.preview]}</button></p>
        <p>
          <a href="/" style="color: #217fbe;" ng-hide="market_back_url && !meta.dontBack">{[ I18n.store.cart.continue ]}</a>
          <a style="color: #217fbe;" ng-show="market_back_url && !meta.dontBack" ng-click="back_to_market()">{[ I18n.store.cart.continue ]}</a>
        </p>
        <ul class="info_link">
          <li><a href="#!/terms/">{[I18n.store.checkout.termsOfService]}</a></li>
          <li><a href="#!/privacy_policy/">{[I18n.store.checkout.privacyPolicy]}</a></li>
        </ul>
      </div>
      <!-- /Button -->
    </form>
  </div>
</div>
