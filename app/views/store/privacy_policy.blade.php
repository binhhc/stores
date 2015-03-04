
<div class="wrapper" id="store_cart">
  <div class="height_fix">
    <div id="header_basic">
      <h1 id="store_logo" ng-style="styles.store_logo">
        <a href="/" ng-show="styles.logo"><span class="mark"><img ng-src="{[logo_src]}" alt="logo"></span></a>
        <a href="/" ng-hide="styles.logo"><span class="txt">{[styles.name]}</span></a>
      </h1>
      <div id="navi_main" style="display:none;" ng-show="categories || hasAbout || showVirtualStore">
        <dl style="font-family: Allerta">
          <dd><a href="/">HOME</a></dd>
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
    <div class="box_wht" ng-hide="accepted">
      <h2>{[I18n.store.privacyPolicy.title]}</h2>
      <ul class="terms_link">
        <li><a href="#!/tokushoho/">{[I18n.store.privacyPolicy.buttonTokushoho]}</a></li>
        <li><a href="#!/terms/">{[I18n.store.privacyPolicy.buttonTerms]}</a></li>
        <li class="current"><a href="#!/privacy_policy/">{[I18n.store.privacyPolicy.buttonPrivacyPolicy]}</a></li>
      </ul>
      <div class="store_terms">
        <p class="lead">お客様が、当ウェブサイトを利用する場合または商品の購入をする場合、下記「お客様情報の取扱規定（プライバシーポリシー）」を熟読のうえ、内容に同意していただく必要があります。なお、ご同意いただけない場合は、商品の購入ができません。</p>
        <h4>1.お客様情報について</h4>
        <p class="inner">お客様情報とは、生存する個人に関する情報であって、当該情報に含まれる氏名、生年月日、住所、電話番号、その他の記述等により特定の個人を識別することが出来るものを言います。これには他の情報と照合することが出来、それにより特定の個人を識別できる事となるものを含みます。</p>
        <h4>2.お客様情報の利用目的について</h4>
        <p class="inner">当方は、(1)売買取引における当方の債務を履行するため、(2)売買取引におけるアフターサービスを実施するため、(3)お客様に特別なサービスや新商品等をご案内すること、又は、(4)メールマガジン等のお知らせの送信することを目的とし、お客様情報を利用させていただきます。これらの利用目的以外には、下記3に記載する場合または事前にお客様に同意をいただいた場合を除き、利用致しません。</p>
        <h4>3.お客様情報の第三者への委託について</h4>
        <p class="inner">当方は、利用目的の達成に必要な範囲内において、お客様情報の全部又は一部を委託する場合があります。</p>
        <h4>4.お客様情報の第三者への提供について</h4>
        <p class="inner">当方は、事前にお客様の同意を得ることなしでお客様情報を第三者に提供しません。</p>
        <h4>5.お客様情報の共同利用について</h4>
        <p class="inner">当方は、以下に記載する会社との間で、お客様情報を共同利用いたします。</p>
        <div class="inner">
          <table>
            <tr>
              <th>共同して利用するお客様情報の項目</th>
              <td>お客様の氏名、住所、電話番号、メールアドレス、購入された商品情報など</td>
            </tr>
            <tr>
              <th>共同して利用する者の範囲</th>
              <td>株式会社ブラケット（STORES.jp運営会社）</td>
            </tr>
            <tr>
              <th>利用する者の利用目的</th>
              <td>
                <ul>
                  <li>当方とお客様の間の売買取引のうち、商品の配送など、当方が委託した業務を行うため</li>
                  <li>お客様に特別なサービスや新商品等をご案内するため</li>
                  <li>お客様に対するアフターサービスを実施するため</li>
                  <li>メールマガジン等のお知らせの送信のため</li>
                  <li>その他STORES.jpの運用のため</li>
                </ul>
              </td>
            </tr>
            <tr>
              <th>お客様情報の管理について<br>責任を有する者</th>
              <td>ストアオーナー</td>
            </tr>
          </table>
        </div>
        <h4>6.お客様情報のお問い合わせについて</h4>
        <p class="inner">当ウェブサイトの特定商取引法に関する表記内にある「事業者の名称および連絡先」までご連絡ください。もしくは、ストアページ内の【お問い合わせフォーム】への請求により、電子メールにて遅滞なく連絡先等を提供いたします。</p>
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
      <p><a href="https://stores.jp/?via={[ via ]}&id={[user_name]}" target="_blank" ng-mouseover="footer_mouse_over()"><img src="/images/footer/logo_footer.png" alt="ネットショップの開業ならSTORES.jp"></a></p>
    </div>
  </div>
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
    <p class="btn_high_big cart" ng-show="cart.items.length > 0" style="padding-bottom: 20px;"><button id="checkout_button" type='button'>{[I18n.store.cart.check]}</button></p>
    <!--<p style="text-align:center; padding:20px 0 10px 0;"><a href="" onclick="$('.fancybox-close').click();" style="color: #217fbe;">{[I18n.store.cart.continue]}</a></p>-->
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
