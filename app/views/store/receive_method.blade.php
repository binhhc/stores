
<h2>{{I18n.store.checkout.receiveMehtod.title}}</h2>
<dl class="form_basic spb">
  <dd>
    <dl class="cols no_border">
      <dt ng-bind="I18n.store.checkout.receiveMehtod.title"></dt>
      <dd class="select_m">
        <ul>
          <li class="select_s">
            <div class="styled_select_thick payment_methods">
              <select class="payment styled" ng-model="customer.receive_method" ng-options="rm.value for rm in preset.receive_methods" ng-change="cart.sum()"></select>
              <span>{{customer.receive_method.value}}</span>
            </div>
          </li>
        </ul>
        <p class="error" ng-show="customer.receive_method.key == '-' && clicked_submit">受取方法を選択してください</p>
      </dd>
    </dl>
  </dd>
</dl>
