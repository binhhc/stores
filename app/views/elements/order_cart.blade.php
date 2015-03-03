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
                <dd class="sz_i"><img ng-src="{[cart_item.image.src]}" width="50px" height="50px"></dd>
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
