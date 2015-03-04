
<h2><span class="icon_shipping">{[I18n.store.checkout.receiverAddress]}</span></h2>
<dl class="form_basic">
  <dd>
    <dl class="cols no_border">
      <dt><!--<span class="required">必須</span>-->{[I18n.store.checkout.nameInfo]}</dt>
      <dd>
        <ul>
          <li>{[I18n.store.checkout.firstName]}</li>
          <li><input class="sz_sm" type="text" name="last_name" ng-model="customer.last_name" required ng-class="{error: is_field_invalid(form.last_name, true)}"></li>
          <li>{[I18n.store.checkout.lastName]}</li>
          <li><input class="sz_sm" type="text" name="first_name" ng-model="customer.first_name" required ng-class="{error: is_field_invalid(form.first_name, true)}"></li>
        </ul>
        <span class="error" ng-show="is_field_invalid(form.last_name, false, true) || is_field_invalid(form.first_name)">{[I18n.store.error.name]}</span>
      </dd>
    </dl>
  </dd>
  <dd>
    <dl class="cols">
      <dt><!--<<span class="required">必須</span>-->{[I18n.store.checkout.postalCode]}</dt>
      <dd><input class="sz_s" type="text" name="zip" ng-model="customer.zip" placeholder="" stores-zip-code required ng-class="{error: is_field_invalid(form.zip, true)}"><span style="font-size:12px; margin-left:20px;" class="ng-binding" ng-show="I18n.locale == 'ja'">{{$checkout_label_address}}</span><span class="error" ng-show="is_field_invalid(form.zip)">{[I18n.store.error.postalCode]}</span></dd>
    </dl>
  </dd>
  <dd>
    <dl class="cols">
      <dt><!--<span class="required">必須</span>-->{[I18n.store.checkout.country]}</dt>
      <dd class="select_m">
        <div class="styled_select_thick">
          <select size="1" id="address" class="styled" ng-model="customer.prefecture" ng-options="prefecture for prefecture in preset.prefectures" ng-change="cart.sum()"></select>
          <span>{[customer.prefecture]}</span>
        </div>
      </dd>
    </dl>
  </dd>
  <dd>
    <dl class="cols">
      <dt><!--<span class="required">必須</span>-->{[I18n.store.checkout.address]}</dt>
      <dd><input class="sz_l" type="text" name="address" ng-model="customer.address" placeholder="" required ng-class="{error: is_field_invalid(form.address, true)}"><span class="txt note">{[ I18n.store.checkout.exampleAddress ]}</span><span class="error" ng-show="is_field_invalid(form.address)">{[I18n.store.error.address]}</span></dd>
    </dl>
  </dd>
  <dd>
    <dl class="cols">
      <dt><!--<span class="required">必須</span>-->{[I18n.store.checkout.tel]}</dt>
      <dd><input class="sz_sm" type="text" name="tel" ng-model="customer.tel" placeholder="" required ng-class="{error: is_field_invalid(form.tel, true) || (!valid_customer_tel && form.tel.$dirty)}"><span class="txt">{[I18n.store.error.tel_warning]}</span><span class="error" ng-show="is_field_invalid(form.tel)">{[I18n.store.error.tel]}</span></dd>
    </dl>
  </dd>
  <dd>
    <dl class="cols">
      <dt><!--<span class="required">必須</span>-->{[I18n.store.checkout.email]}</dt>
      <dd>
        <input class="sz_l" type="text" name="email" ng-model="customer.email" placeholder="" required ng-class="{error: is_field_invalid(form.email, true) || (!match_email && form.email.$dirty)}" autocomplete="off"><span class="txt note">{[I18n.store.checkout.emailWarning]}</span><span class="error" ng-show="is_field_invalid(form.email) || (!match_email && clicked_submit)">{[I18n.store.error.email]}</span>
        <p class="email_check" ng-show="customer.email">
          <span class="check" ng-bind="customer.email"></span><br>
          <span class="caption">{[ I18n.store.checkout.confirmEmail ]}</span>
        </p>
      </dd>
    </dl>
  </dd>
  <dd>
    <dl class="cols">
      <dt><span class="option">{[ I18n.store.checkout.optional ]}</span>{[I18n.store.checkout.notes]}</dt>
      <dd>
        <textarea class="sz_l" name="note" style="height: 100px;" ng-model="customer.note" ng-maxlength="2000"></textarea><span class="txt note">{[I18n.store.checkout.notesWarning]}</span><span class="error" ng-show="is_field_invalid(form.note)">{[I18n.store.error.notes]}</span>
      </dd>
    </dl>
  </dd>
  <dd class="cols" ng-show="I18n.locale == 'ja' && customer.login" style="text-align:center; padding-bottom:20px; letter-spacing: 0;" sp-if="follow">
    <div class="caution_box" style="margin:0 0 5px 0;">
      <div class="styled_checkbox">
        <input type="checkbox" name="address_change" id="address_change" ng-model="customer.address_change">
        <span class="checked-{[ customer.address_change ]}"></span>
      </div>
      <label for="address_change" ng-bind="address_change_text"></label>
    </div>
  </dd>
</dl>
