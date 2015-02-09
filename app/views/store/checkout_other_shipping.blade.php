
<h2><span class="icon_shipping">{{I18n.store.checkout.shippingAddress}}</span></h2>
<div class="check">
  <div class="inner">
    <div class="styled_checkbox">
      <input type="checkbox" name="" id="check_same_address" ng-model="shipToSameAddress" ng-change="changeSameAddress()">
      <span class="checked-{{shipToSameAddress}}"></span>
    </div>
    <label for="check_same_address">{{I18n.store.checkout.sameAddress}}</label>
  </div>
</div>
<div ng-hide="shipToSameAddress">
  <dl class="form_basic">
    <dd>
      <dl class="cols">
        <dt>{{I18n.store.checkout.nameInfo}}</dt>
        <dd>
          <ul>
            <li>{{I18n.store.checkout.firstName}}</li>
            <li><input class="sz_sm" type="text" name="ship_last_name" ng-model="other_shipping.last_name" ng-class="{error: giftFormValid(form.ship_last_name)}"></li>
            <li>{{I18n.store.checkout.lastName}}</li>
            <li><input class="sz_sm" type="text" name="ship_first_name" ng-model="other_shipping.first_name" ng-class="{error: giftFormValid(form.ship_first_name)}"></li>
          </ul>
          <span class="error" ng-show="giftFormValid(form.ship_last_name) || giftFormValid(form.ship_first_name)">{{I18n.store.error.name}}</span>
        </dd>
      </dl>
    </dd>
    <dd>
      <dl class="cols">
        <dt>{{I18n.store.checkout.postalCode}}</dt>
        <dd>
          <input class="sz_s" type="text" name="ship_zip" ng-model="other_shipping.zip" placeholder="" stores-zip-code ng-class="{error: giftFormValid(form.ship_zip)}" ng-pattern="/^[0-9-]+$/">
          <span style="font-size:12px; margin-left:20px;" ng-show="I18n.locale == 'ja'">※住所が自動入力されます。</span>
          <span class="error" ng-show="giftFormValid(form.ship_zip)">{{I18n.store.error.postalCode}}</span>
        </dd>
      </dl>
    </dd>
    <dd>
      <dl class="cols">
        <dt>{{I18n.store.checkout.country}}</dt>
        <dd class="select_m">
          <div class="styled_select_thick">
            <select size="1" id="address" class="styled" ng-model="other_shipping.prefecture" ng-options="prefecture for prefecture in preset.prefectures" ng-change="cart.sum()"></select>
            <span>{{other_shipping.prefecture}}</span>
          </div>
        </dd>
      </dl>
    </dd>
    <dd>
      <dl class="cols">
        <dt>{{I18n.store.checkout.address}}</dt>
        <dd><input class="sz_l" type="text" name="ship_address" ng-model="other_shipping.address" placeholder="" ng-class="{error: giftFormValid(form.ship_address)}"><span class="txt note">{{ I18n.store.checkout.exampleAddress }}</span><span class="error" ng-show="giftFormValid(form.ship_address)">{{I18n.store.error.address}}</span></dd>
      </dl>
    </dd>
    <dd>
      <dl class="cols">
        <dt>{{I18n.store.checkout.tel}}</dt>
        <dd><input class="sz_sm" type="text" name="ship_tel" ng-model="other_shipping.tel" placeholder="" ng-class="{error: giftFormValid(form.ship_tel) || (!valid_ship_tel && form.ship_tel.$dirty)}"><span class="txt">{{I18n.store.error.tel_warning}}</span><span class="error" ng-show="giftFormValid(form.ship_tel)">{{I18n.store.error.tel}}</span></dd>
      </dl>
    </dd>
  </dl>
</div>