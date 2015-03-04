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
      <h2>{[I18n.store.terms.title]}</h2>
      <ul class="terms_link">
        <li><a href="#!/tokushoho/">{[I18n.store.terms.buttonTokushoho]}</a></li>
        <li class="current"><a href="#!/terms/">{[I18n.store.terms.buttonTerms]}</a></li>
        <li><a href="#!/privacy_policy/">{[I18n.store.terms.buttonPrivacyPolicy]}</a></li>
      </ul>
      <div class="store_terms">
        <h4>第1章　総則</h4>
        <div class="inner">
          <h5>第1条【定義】</h5>
          <ol>
            <li>
              本規約<br>
              ストア利用規約
            </li>
            <li>
              本サービス<br>
              当方がインターネットを通じて提供する通信販売サービス
            </li>
            <li>
              購入者<br>
              当方が定める手続に従い、本規約およびプライバシーポリシーの内容を全て了解・承認した上で、商品の申し込みを行う者
            </li>
            <li>
              利用者<br>
              本規約およびプライバシーポリシーの内容を全て了解・承認した上で、当方が本サービスで提供する画像、テキスト、デザイン、ロゴ、映像、プログラム、アイディア、情報等（以下、「コンテンツ」）を検索、閲覧または利用する者の総称
            </li>
          </ol>
          <h5>第2条【本規約の適用】</h5>
          <p>当方がインターネットを通じ提供する本サービスを利用者が利用するにあたり、本規約を定めます。利用者は、本サービスの利用開始の時点で本規約の内容を承諾したものとみなします。</p>
          <h5>第3条【本規約の変更】</h5>
          <p>当方は、利用者または購入者に事前に通知することなく、本規約の全部または一部を任意に変更することができ、また本規約を補充する規約を新たに定めることができるものとします。本規約の変更・追加は、本サービスを提供するサイト上に掲載した時点から効力を発するものとし、効力発生後に提供される本サービスは、変更・追加後の規約によるものとされます。</p>
          <p>当方は、本規約の変更・追加により利用者または購入者に生じた一切の損害について、直接損害か間接損害か否か、予見できたか否かを問わず、一切の責任を負わないものとします。</p>
        </div>
        <h4>第2章　商品の購入等</h4>
        <div class="inner">
          <h5>第4条【商品の購入】</h5>
          <ul>
            <li>利用者は、本サービスを利用して当方から商品を購入することができます。</li>
            <li>利用者は、商品の購入を希望する場合、当方が別途定める手続に従って、商品の購入を申し込むものとします。</li>
            <li>当該申込に伴い、利用者が入力・登録した配達先・注文内容等を確認の上で注文する旨のボタンをクリックし、その後、当方から注文内容を確認する旨のメールが当該利用者に到達した時点で、利用者と当方との間に当該商品に関する売買契約が成立するものとします。</li>
            <li>前項の規定に拘わらず、本サービス利用に関して不正行為または不適当な行為があった場合、当方は売買契約について取消し、解除その他の適切な措置を取ることができるものとします。</li>
            <li>未成年の利用者は、適格な法定代理人の事前の同意を得なければ、本サービスを利用して商品の購入をすることができません。</li>
          </ul>
          <h5>第5条【登録情報の変更】</h5>
          <p>購入者は、購入時に入力した氏名、住所その他当方に届け出た事項の全部または一部に変更があった場合には速やかに当方に連絡するものとします。変更登録がなされなかったことにより生じた損害について、当方は一切の責任を負いません。また、変更登録がなされた場合でも、変更登録前にすでに手続がなされた取引は変更登録前の情報にもとづいておこなわれるものとします。</p>
          <h5>第6条【支払方法】</h5>
          <ul>
            <li>商品の支払い金額は、サイト上に表示されている商品の販売価格と、消費税、配送料、手数料の合計額となります。</li>
            <li>本サービスによって購入された商品の支払いに関しては、購入者本人名義のクレジットカードによる支払い、銀行振込または代金引換その他当方が定める支払方法による支払いに限るものとします。</li>
            <li>クレジットカードで支払われる場合は、購入者がクレジットカード会社との間で別途契約する条件に従うものとします。なお、クレジットカードの利用に関連して、購入者とクレジットカード会社等の間で何らかの紛争が発生した場合は、購入者とクレジットカード会社との間で責任をもって解決するものとします。</li>
          </ul>
          <h5>第7条【商品の返品】</h5>
          <p>当方は、購入者からの商品の返品について、サイト上に掲載される【特定商取引法に関する表記】内にある「返品についての特約事項」に従い対応するものとします。</p>
        </div>
        <h4>第3章　個人情報の取扱い</h4>
        <div class="inner">
          <h5>第8条【個人情報の取扱い】</h5>
          <p>当方は、当方が別途定める<a href="#!/privacy_policy/">プライバシーポリシー</a>に従い、個人情報を取り扱います。</p>
        </div>
        <h4>第4章　利用上の責務</h4>
        <div class="inner">
          <h5>第9条【禁止事項】</h5>
          <p>本サービスの利用に際して、利用者または購入者に対し次の各号の行為を行うことを禁止します。</p>
          <ol>
            <li>他の利用者、第三者若しくは当方迷惑、不利益若しくは損害を与える行為、またはそれらのおそれのある行為</li>
            <li>第三者または当方の著作権等の知的財産権、肖像権、人格権、プライバシー権、パブリシティ権その他の権利を侵害する行為またはそれらのおそれのある行為</li>
            <li>公序良俗に反する行為その他法令に違反する行為またはそれらのおそれのある行為</li>
            <li>本サービスを通じて入手したコンテンツを利用者または購入者が私的使用の範囲外で使用する行為</li>
            <li>他の利用者、または他の利用者以外の第三者を介して、本サービスを通じて入手したコンテンツを複製、販売、出版、頒布、公開する行為およびこれらに類似する行為</li>
            <li>本サービスおよびその他当方が提供するサービスの運営を妨げる行為</li>
            <li>当方の信用を毀損・失墜させる等の当方が不適当であると合理的に判断する行為</li>
            <li>その他、当方が不適切と判断する行為</li>
          </ol>
        </div>
        <h4>第5章　免責事項</h4>
        <div class="inner">
          <h5>第10条【免責事項】</h5>
          <ul>
            <li>利用者または購入者が本規約等に違反したことによって第三者に生じた損害については、当方は一切責任を負いません。</li>
            <li>本サービスの内容および、利用者または購入者が本サービスを通じて得る情報等について、その完全性、正確性、確実性、有用性等いかなる保証も行いません。</li>
            <li>商品の本サービスに開示・掲載されているコンテンツに虚偽または誤解を招くような内容が存在したとしても、これにより利用者または購入者が直接的または間接的に被った一切の損害、損失、不利益等について、当方は一切責任を負いません。</li>
            <li>本サービスを通じて販売される商品につき、その品質、材質、機能、性能、他の商品との適合性その他の欠陥、及びこれらが原因となり生じた損害、損失、不利益等については、当方は一切責任を負いません。</li>
            <li>当方は、購入者が商品の受取を怠り若しくは拒んだ場合、長期不在により商品の受取りが不能の場合又は配送先不明の場合、その他購入者の都合により商品を受け取ることができない場合に関しては、購入者が登録する連絡先に連絡すること及び商品購入の際に指定された配達先に商品を持参等することにより、商品の引渡債務を履行し、当該債務から免責されるものとします。</li>
          </ul>
        </div>
        <h4>第6章　雑則</h4>
        <div class="inner">
          <h5>第11条【著作権、知的財産権】</h5>
          <p>本サービスを通じて提供されるコンテンツは、当方または正当な権利を有する第三者に専属的に帰属するものとします。本条の規定に違反して、利用者または購入者と第三者との間で問題が生じた場合、当該利用者または購入者は自己の責任と費用においてかかる問題を解決するとともに、当方に何らの損害、損失または不利益等を与えないものとします。</p>
          <h5>第12条【準拠法】</h5>
          <p>本規約に関する準拠法は、全て日本国の法令が適用されるものとします。</p>
          <h5>第13条【協議および管轄裁判所】</h5>
          <p>本規約の解釈を巡って疑義が生じた場合、当方は合理的な範囲でその解釈を決定できるものとします。本規約に関する全ての紛争については、当方の所在地を管轄する裁判所を第1審の専属的合意管轄裁判所とすることを予め合意します。</p>
        </div>
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
