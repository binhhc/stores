
<div class="wrapper" id="store_cart" ng-init="checkout_confirm()">
  <div class="height_fix">
    <div id="header_basic">
      <h1 id="store_logo">
        <a href="/" ng-show="styles.logo"><span class="mark"><img ng-src="{[logo_src]}" alt="logo" class="checkout_logo"></span></a>
        <a href="/" ng-hide="styles.logo"><span class="txt">{[styles.name]}</span></a>
      </h1>
    </div>
    <div class="step">
      <p class="img"><img ng-src="/img/step{[ step ]}.png"></p>
      <p class="step1">{[I18n.store.checkout.input]}</p>
      <p class="step2">{[I18n.store.checkout.confirm]}</p>
      <p class="step3">{[I18n.store.checkout.complete]}</p>
    </div>
    <form name="form" ng-submit="submit()">
      <!-- Cart/ -->
      @include('elements.order_cart')
      <!-- /Cart -->
      <!-- Shipping/ -->
      <div class="box_wht">
        <h2><span class="icon_shipping">{[I18n.store.checkout.receiverAddress]}</span></h2>
        <dl class="form_basic">
          <dd>
            <dl class="cols no_border">
              <dt>{[I18n.store.checkout.nameInfo]}</dt>
              <dd>{[customer.last_name]}&nbsp;{[customer.first_name]}</dd>
            </dl>
          </dd>
          <dd>
            <dl class="cols">
              <dt>{[I18n.store.checkout.country]}</dt>
              <dd class="select_m">
                {[customer.prefecture]}
              </dd>
            </dl>
          </dd>
          <dd>
            <dl class="cols">
              <dt>{[I18n.store.checkout.address]}</dt>
              <dd>{[customer.address]}</dd>
            </dl>
          </dd>
          <dd>
            <dl class="cols">
              <dt>{[I18n.store.checkout.tel]}</dt>
              <dd>{[customer.tel]}</dd>
            </dl>
          </dd>
          <dd>
            <dl class="cols">
              <dt>{[I18n.store.checkout.email]}</dt>
              <dd>{[customer.email]}</dd>
            </dl>
          </dd>
          <dd style="display: none;" ng-show="customer.note">
            <dl class="cols">
              <dt>{[I18n.store.checkout.notes]}</dt>
              <dd style="width: 500px; white-space: pre-wrap; word-wrap: break-word;">{[customer.note]}</dd>
            </dl>
          </dd>
        </dl>
      </div>
      <!-- /Shipping -->
      <!-- Member -->
      <div class="box_wht" ng-show="customer.signup_terms && customer.password">
        <h2 ng-bind="I18n.follow.member.registration"></h2>
        <dl class="form_basic">
          <dd>
            <dl class="cols">
              <dt ng-bind="I18n.follow.member.password"></dt>
              <dd ng-bind="customer.password | hideNumber"></dd>
            </dl>
          </dd>
        </dl>
      </div>
      <!-- /Member -->
      <!-- Gift/ -->
      <div sp-show="gift_form">
        <div ng-hide="shipToSameAddress">
          <div class="box_wht">
            <h2><span class="icon_shipping">{[I18n.store.checkout.shippingAddress]}</span></h2>
            <dl class="form_basic">
              <dd>
                <dl class="cols no_border">
                  <dt>{[I18n.store.checkout.nameInfo]}</dt>
                  <dd>{[other_shipping.last_name]}&nbsp;{[other_shipping.first_name]}</dd>
                </dl>
              </dd>
              <dd>
                <dl class="cols">
                  <dt>{[I18n.store.checkout.postalCode]}</dt>
                  <dd>{[other_shipping.zip]}</dd>
                </dl>
              </dd>
              <dd>
                <dl class="cols">
                  <dt>{[I18n.store.checkout.country]}</dt>
                  <dd class="select_m">
                    {[other_shipping.prefecture]}
                  </dd>
                </dl>
              </dd>
              <dd>
                <dl class="cols">
                  <dt>{[I18n.store.checkout.address]}</dt>
                  <dd>{[other_shipping.address]}</dd>
                </dl>
              </dd>
              <dd>
                <dl class="cols">
                  <dt>{[I18n.store.checkout.tel]}</dt>
                  <dd>{[other_shipping.tel]}</dd>
                </dl>
              </dd>
            </dl>
          </div>
        </div>
      </div>
      <!-- /Gift -->
      <!-- Card/ -->
      <div class="box_wht">
        <dl class="btn_pair" sp-hide="receive_method">
          <dd class="btn_low"><button type="button" onclick="history.back()">{[I18n.store.checkout.credit.back]}</button></dd>
          <dd class="btn_high"><button type="submit">{[I18n.store.inquiry.checkout]}</button></dd>
        </dl>
      </div>
      <!-- /Card -->
    </form>
    <!-- Loading/ -->
    <div class="loading" ng-show="state == 'wait'"></div>
    <!-- /Loading -->
    <div class="box_wht" style="padding-top: 40px; padding-bottom: 60px;" ng-show="state == 'done'">
      <h2 style="background: none; padding-bottom: 20px;" ng-show="customer.payment_method[0] != 'convenience_store_payment'">{[I18n.store.checkout.thanks]}</h2>
      <h2 style="background: none; padding-bottom: 20px;" ng-show="customer.payment_method[0] == 'convenience_store_payment'">ご注文ありがとうございます</h2>
      <p style="color: red;text-align:center; padding-bottom: 20px;" ng-show="customer.payment_method[0] == 'convenience_store_payment'">
        コンビニの店頭端末を操作し、代金のお支払いをお願いします。<br>
        {[I18n.store.checkout.convenienceStoreNotification]}
      </p>
      <!-- ConvenienceStore/ -->
      <div class="convenience_store" ng-show="customer.payment_method[0] == 'convenience_store_payment'" >
        <table>
          <tr>
            <th>お客様番号／オンライン決済番号</th>
            <td>{[data.no]}</td>
          </tr>
          <tr>
            <th>確認番号</th>
            <td>98765</td>
          </tr>
            <th>支払い期限</th>
            <td>{[limit_date]}</td>
            </tr>
        </table>
        <p><img src="/img/icon_convenience_store.png" alt="ファミリーマート ローソン ミニストップ サークルKサンクス セイコーマート"></p>
        <p>
          ※上記のコンビニでお支払い頂けます。<br>
          ※各コンビ二での端末の操作方法は、お控えのメール、または<a href="http://hayamise.com/#convenience_list" target="_blank">よくある質問</a>をご参照ください。
        </p>
      </div>
      <!-- /ConvenienceStore -->
      <div id="dowmload_sales" ng-show="is_digit">
        <ul class="box">
          <li ng-repeat="order_item in order_items">
            <div class="dl_sales {[order_item.digital_contents.file_type]} clearfix" ng-show="is_digit">
              <p class="fl_r btn_high download"><a href="/orders/download/{[order_id]}/{[order_item._id]}"><span>{[I18n.store.download.download]}</span></a></p>
              <p class="file_name">{[order_item.digital_contents.name]}</p>
              <p class="volume">{[order_item.digital_contents.human_size]}</p>
            </div>
          </li>
        </ul>
      </div>
      <!-- ItemShare/ -->
      <div id="thanks_order_item" ng-hide="is_digit">
        <ul class="box">
          <li ng-repeat="order_item in order_items">
          <div class="dl_sales" style="background: url('{[origin_image_url]}{[resize_order_done(order_item.images[0].n)]}'); background-repeat: no-repeat; background-position: 0; height: 50px;">
              <p class="item_name">{[order_item.n]}</p>
              <p class="price">{[order_item.p]}JPY</p>
              <ul class="btn_sns" id="btn_sns">
                <li id="btn_sns_twitter"><a class="tweet" ng-class="I18n.locale" href="http://twitter.com/intent/tweet?ount=none&lang='ja'&text= 購入しました！ / {[origin_url_tw]}{[order_item.item_id]} @stores_jp " name='tw_btn' ng-bind="I18n.store.show.tweet"></a></li>
                <li id="btn_sns_facebook" ng-hide="original_domain"><a ng-click='postToFeedOrder(order_item)' ng-class="I18n.locale" name='fb_btn' ng-bind="I18n.store.show.share"></a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <!-- /ItemShare -->
      <p style="margin-bottom: 20px; line-height: 1.8em; text-align: center; font-size: 13px;">{[I18n.store.checkout.confirmMailAlert1]}<br>
      {[I18n.store.checkout.confirmMailAlert2]}</p>
      <p style="text-align: center; line-height: 1.8em; font-size: 13px;" ng-show="customer.payment_method[0] == 'bank_transfer'">銀行振込に関する詳細はお控えのメールをご確認ください。</p>
      <div ng-show="register_user_results.try && !register_user_results.result" style="margin-top: 30px; text-align: center; font-size: 13px;">
        <p style="color: #ff0000;">会員登録に失敗しました。</p>
        <p style="color: #ff0000;" ng-show="register_user_results.errors.email">そのメールアドレスは既に使用されています。</p>
        <p>大変お手数お掛けいたしますが、<a href="/signup" style="color: #217fbe;">こちら</a>から再度会員登録をお願いいたします。</p>
      </div>
      <p class="order_logo nopopup" style="margin: 40px 0; text-align: center;"> <a href="http://hayamise.com/?via=shop&id={[store_name]}" target="_blank"><img src="/img/logo_footer.png" alt="ネットショップの開業ならHayamise"></a></p>
      <p class="btn_low" style=""><a href="/" style="margin: 0 auto;">{[I18n.store.top.back]}</a></p>
    </div>
    <div id="promotion_tag"></div>
  </div>
</div>
