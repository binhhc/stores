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
          <dd class="sz_i"><img ng-src="{[cart_item.image.src]}" width="50px" height="50px"></dd>
          <dd class="sz_l">{[cart_item.name]}</dd>
          <dd class="sz_s tl">{[cart.null_to_hyphen(cart_item.variation)]}</dd>
          <dd class="sz_s tr"><?php echo Config::get('constants.item.currency'); ?>{[cart_item.price | number:0]}</dd>
          <dd class="sz_s tc">{[cart_item.quantity]}</dd>
          <dd class="sz_s tr"><?php echo Config::get('constants.item.currency'); ?> {[(cart_item.price * cart_item.quantity) | number:0]}</dd>
        </dl>
      </dd>
      <!-- <dd class="lists shipping">
        <dl>
          <dd class="sz_m tr">{[I18n.store.cart.shippingFee]}</dd>
          <dd class="sz_s tr"><?php echo Config::get('constants.item.currency'); ?>{[cart.shipping_fee | number:0]}</dd>
        </dl>
      </dd> -->
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