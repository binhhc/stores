
<h2>{[I18n.store.checkout.credit.title]}</h2>
<dl class="form_basic spb">
  <!-- <dd ng-hide="payment_methods.length == 1 && customer.payment_method[0] == 'credit'"> -->
  <dd>
    <dl class="cols no_border">
      <dt ng-bind="I18n.store.checkout.credit.title"><!--<span class="required">必須</span>--></dt>
      <dd class="select_m">
        <ul>
          <li class="select_s">
            <div class="styled_select_thick payment_methods" ng-hide="payment_methods.length == 0">
              <select class="payment styled" ng-model="customer.payment_method" ng-options="pm[1] for pm in payment_methods" ng-change="cart.sum()"></select>
              <span>{[customer.payment_method[1]]}</span>
            </div>
            <p ng-show="payment_methods.length == 0">ただいまメンテナンス中です</p>
          </li>
          <li class="fee" ng-show="customer.payment_method[2] > 0">手数料{[customer.payment_method[2] | number]}円が発生します。</li>
          <li class="fee" ng-show="customer.payment_method[0] == 'credit' && !customer.use_registered_cc"><img src="/img/icon_card_set.png" alt="クレジットカード"></li>
        </ul>
        <p class="error" ng-show="customer.payment_method[0] == '-' && clicked_submit">お支払い方法を選択してください</p>
        <p class="txt" style="display: none" ng-show="payment_maintenance_flag">※毎月第2木曜日 午前1時〜午前5時まではシステムメンテナンスの為<br>コンビニ決済はご利用頂くことが出来ません。</p>

        <!-- 登録済みカード情報を使う/ -->
        <div class="card_yes" ng-show="customer.payment_method[0] == 'credit' && customer.cc_info" sp-if="follow">
          <div class="styled_radio">
            <input type="radio" name="registered_card" ng-value="true" id="card_yes" ng-model="customer.use_registered_cc" ng-change="customer.cc.register = false">
            <span class="checked-{[customer.use_registered_cc]}"></span>
          </div>
          <label for="card_yes" ng-bind="I18n.follow.credit_card.use_registered"></label>
          <dl class="card_info" ng-show="customer.use_registered_cc">
            <dt ng-bind="I18n.store.checkout.credit.num"></dt>
            <dd>{[customer.cc_info.number]}</dd>
            <dt ng-bind="I18n.store.checkout.credit.until"></dt>
            <dd>{[customer.cc_info.expires.month]}/{[customer.cc_info.expires.year]}</dd>
          </dl>
        </div>
        <!-- 登録済みカード情報を使う/ -->
        <!-- 別のカードを使う/ -->
        <div class="card_no" ng-show="customer.payment_method[0] == 'credit'" sp-if="follow">
          <div ng-show="customer.cc_info">
            <div class="styled_radio">
              <input type="radio" name="registered_card" ng-value="false" id="card_no" ng-model="customer.use_registered_cc">
              <span class="checked-{[!customer.use_registered_cc]}"></span>
            </div>
            <label for="card_no" ng-bind="I18n.follow.credit_card.use_other"></label>
          </div>
        </div>
        <!-- /別のカードを使う -->
      </dd>
    </dl>
  </dd>
  <dd ng-show="customer.payment_method[0] == 'credit' && !customer.use_registered_cc">
    <dl class="cols">
      <dt>{[I18n.store.checkout.credit.num]}</dt>
      <dd>
        <input class="sz_m" type="text" name="cc_number" ng-model="customer.cc.number" ng-class="{error: is_field_invalid(form.cc_number, true)}" ng-required="customer.payment_method[0] == 'credit' && !customer.use_registered_cc">
        <span style="font-size:12px; margin-left:20px;">{[I18n.store.checkout.credit.example]}）1234567890123456</span>
        <span class="error" ng-show="is_field_invalid(form.cc_number) || (clicked_submit && !customer.cc.company)">{[I18n.store.error.credit.num]}</span>
        <input type="hidden" name="cc_company" ng-model="customer.cc.company" ng-required="customer.payment_method[0] == 'credit' && !customer.use_registered_cc" />
      </dd>
    </dl>
  </dd>
  <dd class="delete_elm" ng-show="customer.payment_method[0] == 'credit' && !customer.use_registered_cc">
    <dl class="cols">
      <dt>{[I18n.store.checkout.credit.holder]}</dt>
      <dd><input class="sz_m" type="text" name="cc_name" ng-model="customer.cc.name" ng-class="{error: is_field_invalid(form.cc_name, true)}" ng-required="customer.payment_method[0] == 'credit' && !customer.use_registered_cc"><span style="font-size:12px; margin-left:20px;">{[I18n.store.checkout.credit.example]}）TARO YAMADA</span><span class="error" ng-show="is_field_invalid(form.cc_name)">{[I18n.store.error.credit.holder]}</span></dd>
    </dl>
  </dd>
  <dd ng-show="customer.payment_method[0] == 'credit' && !customer.use_registered_cc">
    <dl class="cols">
      <dt>{[I18n.store.checkout.credit.until]}</dt>
      <dd>
        <ul>
          <li class="select_s">
            <div class="styled_select_thick">
              <select id="credit_month" class="styled" name="cc.expires.month" ng-model="customer.cc.expires.month" ng-options="month for month in preset.cc.expires.months"></select>
              <span>{[customer.cc.expires.month]}</span>
            </div>
          </li>
          <li>{[I18n.store.checkout.credit.month]}</li>
          <li>&frasl;</li>
          <li class="select_s">
            <div class="styled_select_thick">
              <select id="credit_year" class="styled" name="cc.expires.year" ng-model="customer.cc.expires.year" ng-options="year for year in preset.cc.expires.years"></select>
              <span>{[customer.cc.expires.year]}</span>
            </div>
          </li>
          <li>{[I18n.store.checkout.credit.year]}</li>
        </ul>
      </dd>
    </dl>
  </dd>
  <dd class="delete_elm" ng-show="customer.payment_method[0] == 'credit'">
    <dl class="cols">
      <dt>{[I18n.store.checkout.credit.cardId]}</dt>
      <dd>
        <input class="sz_m" type="text" name="cc_security_code" style="width: 60px;" maxlength="4" ng-model="customer.cc.security_code" ng-class="{error: is_field_invalid(form.cc_security_code, true)}" ng-required="customer.payment_method[0] == 'credit'">
        <span style="font-size:12px; margin-left:20px;">{[I18n.store.checkout.credit.security_code]}</span>
        <span class="error" ng-show="is_field_invalid(form.cc_security_code)">{[I18n.store.error.credit.cardId]}</span>
      </dd>
    </dl>
  </dd>
  <dd ng-show="customer.payment_method[0] == 'credit' && (customer.signup_terms || (customer.login && !customer.use_registered_cc))" sp-if="follow">
    <dl class="cols">
      <dt ng-bind="I18n.follow.credit_card.save"></dt>
      <dd>
        <div class="styled_checkbox">
          <input type="checkbox" name="cc_register" ng-model="customer.cc.register">
          <span class="checked-{[customer.cc.register]}"></span>
        </div>
      </dd>
    </dl>
  </dd>
  <!-- ConvenienceStore/ -->
  <dd ng-show="customer.payment_method[0] == 'convenience_store_payment'">
    <dl class="cols">
      <dt>コンビニの種類</dt>
      <dd>
        <p><img src="/img/icon_convenience_store.png" alt="コンビニ"></p>
        <p>※上記のコンビニでお支払い頂けます。</p>
      </dd>
    </dl>
  </dd>
  <!-- /ConvenienceStore -->
</dl>
<div class="mybook_notice" style="display: none" ng-show="cart.items[0].mybook_item">
購入される商品は株式会社アスカネットから発送いたしますので、<br>
ご入力いただいた個人情報は株式会社アスカネットに送信いたします。
</div>
<!--
<dl ng-class="{btn_single: meta.dontBack, btn_pair: !meta.dontBack}">
  <dd>
    <p class="btn_high"><button type="submit">{[I18n.store.checkout.credit.preview]}</button></p>
    <p style="padding:15px 0 0 0;text-align:center;">
      <a href="/" style="color: #217fbe;" ng-hide="market_back_url && !meta.dontBack">{[ I18n.store.cart.continue ]}</a>
      <a style="color: #217fbe;" ng-show="market_back_url && !meta.dontBack" ng-click="back_to_market()">{[ I18n.store.cart.continue ]}</a>
    </p>
  </dd>
</dl>
-->
