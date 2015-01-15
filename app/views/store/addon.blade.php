{{HTML::style('css/bootstrap.min.css')}}
{{HTML::style('css/item_management.css')}}
{{HTML::script('js/jquery.min.js')}}
{{HTML::script('js/main_page.js')}}
@include('elements.header')
<div ng-view=""><div class="addon ng-scope">
  <div class="header">
    <h2><img alt="STORES.jpアドオン あなたのストアを、進化させる。" src="/images/addon/title.png"></h2>
  </div>
  <div class="wrapper">
    <ul class="addon_list">

      <!-- イオン連携：受取方法/ -->
      <!-- ngIf: user_info.mall == 'aeon' -->
      <!-- /イオン連携：受取方法 -->

      <!-- メールマガジン/ -->
      <li class="lists">
        <a class="fancybox" id="get_newsletter" href="#popup_newsletter">
          <p class="icon"><img alt="メールマガジン" src="/images/addon/icon_newsletter.png"></p>
          <div class="text">
            <h3>メールマガジン</h3>
            <p>購入者とフォロワーに対して、メールマガジンを配信することができます。</p>
          </div>
        </a>
        <div addon="mail_magazine" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /メールマガジン -->

      <!-- 倉庫サービス/ -->
      <li class="lists">
        <a class="fancybox" id="get_storages" href="#popup_storages">
          <p class="icon"><img alt="倉庫サービス" src="/images/addon/icon_storages.png"></p>
          <div class="text">
            <h3>倉庫サービス</h3>
            <p>在庫商品をSTORES.jpの倉庫に送るだけで、保管・発送業務を代行します。</p>
          </div>
        </a>
        <div addon="storages" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /倉庫サービス -->

      <!-- ダウンロード販売/ -->
      <li class="lists">
        <a class="fancybox" id="get_digital" href="#popup_digital">
          <p class="icon"><img alt="ダウンロード販売" src="/images/addon/icon_digital.png"></p>
          <div class="text">
            <h3>ダウンロード販売</h3>
            <p>音楽や動画などのデジタルコンテンツを販売することができます。</p>
          </div>
        </a>
        <div addon="digital" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /ダウンロード販売 -->

      <!-- 送料詳細設定/ -->
      <li class="lists">
        <a class="fancybox" id="get_shipping" href="#popup_shipping">
          <p class="icon"><img alt="送料詳細設定" src="/images/addon/icon_shipping.png"></p>
          <div class="text">
            <h3>送料詳細設定</h3>
            <p>発送手段を自由に作成し、より詳細な送料設定をすることができます。</p>
          </div>
        </a>
        <div addon="detail_shipping_fee" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /送料詳細設定 -->

      <!-- 英語対応/ -->
      <li class="lists">
        <a class="fancybox" id="get_english" href="#popup_english">
          <p class="icon"><img alt="英語対応" src="/images/addon/icon_english.png"></p>
          <div class="text">
            <h3>英語対応</h3>
            <p>ストアが自動的に英語に切り替わり、海外販売ができるようになります。</p>
          </div>
        </a>
        <div addon="english" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active">ON</p><p ng-hide="isEnableAddon()" class="status deactive" style="display: none;">OFF</p><p class="grip" style="left: 57px;"></p></div></div>
      </li>
      <!-- /英語対応 -->

      <!-- ブログパーツ/ -->
      <li class="lists">
        <a class="fancybox" id="get_blog" href="#popup_blog">
          <p class="icon"><img alt="ブログパーツ" src="/images/addon/icon_blog.png"></p>
          <div class="text">
            <h3>ブログパーツ</h3>
            <p>エキサイトブログにブログパーツを設置することができます。</p>
          </div>
        </a>
        <div addon="blog_parts" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /ブログパーツ -->

      <!-- WEAR連携/ -->
      <li class="lists">
        <a class="fancybox" id="get_secret" href="#popup_wear">
          <p class="icon"><img alt="WEAR連携" src="/images/addon/icon_wear.png"></p>
          <div class="text">
            <h3>WEAR連携</h3>
            <p>ファッションコーディネートアプリ「WEAR」とストアを連携できます。</p>
          </div>
        </a>
        <div addon="wear" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /WEAR連携 -->

      <!-- アクセス解析/ -->
      <li class="lists">
        <a class="fancybox" id="get_analytics" href="#popup_analytics">
          <p class="icon"><img alt="アクセス解析" src="/images/addon/icon_analytics.png"></p>
          <div class="text">
            <h3>アクセス解析</h3>
            <p>ストアの訪問者数などをシンプルな画面で確認できます。</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="analytics" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /アクセス解析 -->

      <!-- クーポン/ -->
      <!-- ngIf: user_info.mall != 'parco' --><li ng-if="user_info.mall != 'parco'" class="lists ng-scope">
        <a class="fancybox" id="get_coupon" href="#popup_coupon">
          <p class="icon"><img alt="クーポン" src="/images/addon/icon_coupon.png"></p>
          <div class="text">
            <h3>クーポン</h3>
            <p>セール用の割引クーポンなどを発行することができます。</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="coupon" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li><!-- end ngIf: user_info.mall != 'parco' -->
      <!-- /クーポン -->

      <!-- アイテム画像追加/ -->
      <li class="lists">
        <a class="fancybox" id="get_images" href="#popup_images">
          <p class="icon"><img alt="アイテム画像追加" src="/images/addon/icon_item_images.png"></p>
          <div class="text">
            <h3>アイテム画像追加</h3>
            <p>アイテム画像を12枚まで増やすことができます。</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="item_image_limit" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /アイテム画像追加 -->

      <!-- 納品書PDF出力/ -->
      <li class="lists">
        <a class="fancybox" id="get_pdf" href="#popup_pdf">
          <p class="icon"><img alt="納品書PDF出力" src="/images/addon/icon_pdf.png"></p>
          <div class="text">
            <h3>納品書PDF出力</h3>
            <p>納品書をPDFでダウンロードできます。（PC限定）</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="delivery_note" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /納品書PDF出力 -->

      <!-- シール/ -->
      <li class="lists">
        <a class="fancybox" id="get_seal" href="#popup_seal">
          <p class="icon"><img alt="シール" src="/images/addon/icon_seal.png"></p>
          <div class="text">
            <h3>シール</h3>
            <p>注目アイテムをアピールするためのシールを貼ることができます。</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="sticker" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /シール -->

      <!-- ニュース/ -->
      <li class="lists">
        <a class="fancybox" id="get_news" href="#popup_news">
          <p class="icon"><img alt="ニュース" src="/images/addon/icon_news.png"></p>
          <div class="text">
            <h3>ニュース</h3>
            <p>ストアからのお知らせページを作成することができます。</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="news" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /ニュース -->

      <!-- オーダーCSV出力/ -->
      <li class="lists">
        <a class="fancybox" id="get_csv" href="#popup_csv">
          <p class="icon"><img alt="オーダーCSV出力" src="/images/addon/icon_csv.png"></p>
          <div class="text">
            <h3>オーダーCSV出力</h3>
            <p>オーダー情報をCSV出力できるので管理が簡単になります。（PC限定）</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="order_csv" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /オーダーCSV出力 -->

      <!-- 年齢制限/ -->
      <li class="lists">
        <a class="fancybox" id="get_limit" href="#popup_limit">
          <p class="icon"><img alt="年齢制限" src="/images/addon/icon_age_limit.png"></p>
          <div class="text">
            <h3>年齢制限</h3>
            <p>お酒や成人向け商品など年齢制限の確認ページを追加することができます。</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="r18" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /年齢制限 -->

      <!-- レビュー/ -->
      <li class="lists">
        <a class="fancybox" id="get_review" href="#popup_review">
          <p class="icon"><img alt="レビュー" src="/images/addon/icon_review.png"></p>
          <div class="text">
            <h3>レビュー</h3>
            <p>購入者に商品レビューを書いてもらうことができます。</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="review" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /レビュー -->

      <!-- ギフトフォーム/ -->
      <li class="lists">
        <a class="fancybox" id="get_gift" href="#popup_gift">
          <p class="icon"><img alt="ギフトフォーム" src="/images/addon/icon_gift.png"></p>
          <div class="text">
            <h3>ギフトフォーム</h3>
            <p>ギフト発送用に、お届け先住所フォームを追加できます。</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="gift_form" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /ギフトフォーム -->

      <!-- 再入荷お知らせ/ -->
      <li class="lists">
        <a class="fancybox" id="get_restock" href="#popup_restock">
          <p class="icon"><img alt="再入荷お知らせ" src="/images/addon/icon_restock.png"></p>
          <div class="text">
            <h3>再入荷お知らせ</h3>
            <p>アイテムの再入荷お知らせメールを配信することができます。</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="restock_notification" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /再入荷お知らせ -->

      <!-- シークレット/ -->
      <li class="lists">
        <a class="fancybox" id="get_secret" href="#popup_secret">
          <p class="icon"><img alt="シークレット" src="/images/addon/icon_secret.png"></p>
          <div class="text">
            <h3>シークレット</h3>
            <p>ストアにパスワードを設定することができます。</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="secret" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /シークレット -->

      <!-- Google アナリティクス/ -->
      <li class="lists">
        <a class="fancybox" id="get_ga" href="#popup_ga">
          <p class="icon"><img alt="Google アナリティクス" src="/images/addon/icon_ga.png"></p>
          <div class="text">
            <h3>Google アナリティクス</h3>
            <p>あなたのストアに訪れたユーザーのアクセス情報をより詳しく分析。</p>
          </div>
          <p class="premium"><img alt="Premium" src="/images/addon/premium.png"></p>
        </a>
        <div premium="true" addon="google_analytics" sp-grip="" class="ng-scope"><div ng-click="toggleAddon()" class="switch"><p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p><p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p></div></div>
      </li>
      <!-- /Google アナリティクス -->

      <!-- トップページ/ -->
      <li class="lists comingsoon">
        <p class="icon"><img alt="トップページ" src="/images/addon/icon_toppage.png"></p>
        <div class="text">
          <h3>トップページ</h3>
          <p>様々な情報を掲載したトップページを付けることができます。</p>
        </div>
        <p class="icon_comingsoon">COMING SOON</p>
      </li>
      <!-- /トップページ -->


      <!-- HTML編集/ -->
      <li class="lists comingsoon">
        <p class="icon"><img alt="HTML編集" src="/images/addon/icon_html.png"></p>
        <div class="text">
          <h3>HTML編集</h3>
          <p>HTMLを編集して、ストアのデザインをカスタマイズすることができます。</p>
        </div>
        <p class="icon_comingsoon">COMING SOON</p>
      </li>
      <!-- /HTML編集 -->
    </ul>
  </div>
</div><span class="ng-scope">

</span><div id="popup_premium_button" class="ng-scope"><a class="fancybox" href="#popup_premium"></a></div><span class="ng-scope">
</span><div id="popup_alert_shipping_button" class="ng-scope"><a class="fancybox" href="#popup_alert_shipping"></a></div><span class="ng-scope">

</span><!-- プレミアム ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div style="text-align: center;" id="popup_premium">
    <h2 style="margin-top: 10px;"><span style="font-size: 16px;" class="icon_cart">プレミアムプランのご紹介</span></h2>
    <p style="margin: 15px;">プレミアムプランにお申込み頂くと<br>こちらの機能が利用可能になります。</p>
    <!-- TODO GAトラッキング -->
    <p class="btn_high_big"><a style="margin: auto;" id="premium_info" href="#!/premium">プレミアムプランについて</a></p>
  </div>
</div><span class="ng-scope">
</span><!-- /プレミアム ポップアップ --><span class="ng-scope">

</span><!-- イオン連携：受取方法 ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_receive">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_receive.png"></p>
      <h2>受取方法</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_storages">
        <li><img alt="" src="/images/addon/slide/receive_01.png"></li>
      </ul>
    </div>
    <p class="text">
      購入者に、商品の受取方法を選択してもらうことができます。<br>
      選択できる受取方法は「店頭受取」と「配送」になります。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a target="_blank" ng-href="" href="">マイストア</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /イオン連携：受取方法 ポップアップ --><span class="ng-scope">

</span><!-- メールマガジン ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_newsletter">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_newsletter.png"></p>
      <h2>メールマガジン</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_newsletter">
        <li><img alt="" src="/images/addon/slide/newsletter_01.png"></li>
        <li><img alt="" src="/images/addon/slide/newsletter_02.png"></li>
        <li><img alt="" src="/images/addon/slide/newsletter_03.png"></li>
      </ul>
    </div>
    <p class="text">
      新商品やおすすめ商品など、購入者とフォロワーに対してメールマガジンを配信することができます。<br>
      最新情報など定期的に送ってお客様との接点を持つきっかけとしてご活用ください。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/">ダッシュボード</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /メールマガジン ポップアップ --><span class="ng-scope">

</span><!-- 倉庫サービス ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_storages">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_storages.png"></p>
      <h2>倉庫サービス</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_storages">
        <li><img alt="" src="/images/addon/slide/storages_01.png"></li>
        <li><img alt="" src="/images/addon/slide/storages_02.png"></li>
      </ul>
    </div>
    <p class="text">
      在庫商品を「STORES.jp」の倉庫に送るだけで、面倒な保管・発送業務を代行します。保管料は無料です。<br>
      <a target="_blank" href="/support/storage">倉庫サービスについて詳しくはこちら</a>をご覧ください。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/">ダッシュボード</a></dd>
      <dd><a href="#!/orders">オーダーリスト</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /倉庫サービス ポップアップ --><span class="ng-scope">

</span><!-- ダウンロード販売 ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_digital">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_digital.png"></p>
      <h2>ダウンロード販売</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_digital">
        <li><img alt="" src="/images/addon/slide/digital_01.png"></li>
        <li><img alt="" src="/images/addon/slide/digital_02.png"></li>
        <li><img alt="" src="/images/addon/slide/digital_03.png"></li>
      </ul>
    </div>
    <p class="text">
      音楽や動画、写真やPDFファイルなどのデジタルコンテンツを販売することができます。<br>
      通常の物販アイテムの登録と同じように、簡単に販売を開始して頂くことが可能です。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a target="_blank" ng-href="" href="">マイストア</a></dd>
      <dd><a href="#!/items">アイテム登録</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /ダウンロード販売 ポップアップ --><span class="ng-scope">

</span><!-- 送料詳細設定 ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_shipping">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_shipping.png"></p>
      <h2>送料詳細設定</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_shipping">
        <li><img alt="" src="/images/addon/slide/shipping_01.png"></li>
        <li><img alt="" src="/images/addon/slide/shipping_02.png"></li>
        <li><img alt="" src="/images/addon/slide/shipping_03.png"></li>
      </ul>
    </div>
    <p class="text">
      発送手段を自由に作成し、アイテム毎に設定することができます。<br>
      地域別に送料を変更できるほか、複数購入された際の計算方法など様々な設定をすることが可能です。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/store">ストア設定</a></dd>
      <dd><a href="#!/items">アイテム編集</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /送料詳細設定 ポップアップ --><span class="ng-scope">

</span><!-- 英語対応 ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_english">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_english.png"></p>
      <h2>英語対応</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_english">
        <li><img alt="" src="/images/addon/slide/english_01.png"></li>
        <li><img alt="" src="/images/addon/slide/english_02.png"></li>
      </ul>
    </div>
    <p class="text">
      ストア内の固定テキストを、一瞬で英語に切り替えることができます。<br>
      「送料詳細設定」と併用して頂くことで、国別の送料を設定することも可能になります。
      <span style="font-size:12px; display:block; margin-top:3px;">※海外向けのストアを運営されたい場合にご利用ください</span>
      <span style="font-size:12px; display:block; margin-top:-4px;">※英語表記に切り替えた場合の決済方法はクレジットカードのみとなります</span>
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a target="_blank" ng-href="" href="">マイストア</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /英語対応 ポップアップ --><span class="ng-scope">

</span><!-- ブログパーツ ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_blog">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_blog.png"></p>
      <h2>ブログパーツ</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_blog">
        <li><img alt="" src="/images/addon/slide/blog_01.png"></li>
        <li><img alt="" src="/images/addon/slide/blog_02.png"></li>
        <li><img alt="" src="/images/addon/slide/blog_03.png"></li>
      </ul>
    </div>
    <p class="text">
      ストアやアイテムを宣伝できるブログパーツを、エキサイトブログに設置することができます。<br>
      ストア設定ページより、設置用のコードを発行してご利用ください。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/store">ストア設定</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /ブログパーツ ポップアップ --><span class="ng-scope">

</span><!-- アクセス解析 ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_analytics">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_analytics.png"></p>
      <h2>アクセス解析</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_analytics">
        <li><img alt="" src="/images/addon/slide/analytics_01.png"></li>
        <li><img alt="" src="/images/addon/slide/analytics_02.png"></li>
      </ul>
    </div>
    <p class="text">
      ストアの訪問者数のほか、サイトの滞在時間、参照元などの情報をシンプルな画面で確認できます。<br>
      毎日のストアの運営にお役立てください。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/">ダッシュボード</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /アクセス解析 ポップアップ --><span class="ng-scope">

</span><!-- クーポン ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_coupon">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_coupon.png"></p>
      <h2>クーポン</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_coupon">
        <li><img alt="" src="/images/addon/slide/coupon_01.png"></li>
        <li><img alt="" src="/images/addon/slide/coupon_02.png"></li>
        <li><img alt="" src="/images/addon/slide/coupon_03.png"></li>
      </ul>
    </div>
    <p class="text">
      アイテムの値引きや送料無料のクーポンコードを、簡単に発行することができます。<br>
      ストアのセールやキャンペーンにご活用ください。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a target="_blank" ng-href="" href="">マイストア</a></dd>
      <dd><a href="#!/">ダッシュボード</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /クーポン ポップアップ --><span class="ng-scope">

</span><!-- アイテム画像追加 ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_images">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_item_images.png"></p>
      <h2>アイテム画像追加</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_images">
        <li><img alt="" src="/images/addon/slide/images_01.png"></li>
        <li><img alt="" src="/images/addon/slide/images_02.png"></li>
      </ul>
    </div>
    <p class="text">
      アイテム画像の登録枚数が4枚から12枚まで増やすことができますので、<br>
      登録数を増やしてお客様にもっと商品の魅力を伝えましょう。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/">ダッシュボード</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /アイテム画像追加 ポップアップ --><span class="ng-scope">

</span><!-- 納品書PDF出力 ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_pdf">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_pdf.png"></p>
      <h2>納品書PDF出力</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_pdf">
        <li><img alt="" src="/images/addon/slide/pdf_01.png"></li>
        <li><img alt="" src="/images/addon/slide/pdf_02.png"></li>
        <li><img alt="" src="/images/addon/slide/pdf_03.png"></li>
      </ul>
    </div>
    <p class="text">
      多数のご要望を頂いておりました納品書印刷機能です。<br>
      販売した商品や購入者の情報が確認できる納品書を簡単にダウンロードできます。<br>
      是非オンラインストアの運営にお役立てください。<br>
      ※こちらのアドオンはPCでのみご利用いただける機能になります。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/orders">オーダーリスト</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /納品書PDF出力 ポップアップ --><span class="ng-scope">

</span><!-- シール ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_seal">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_seal.png"></p>
      <h2>シール</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_seal">
        <li><img alt="" src="/images/addon/slide/sticker_01.png"></li>
        <li><img alt="" src="/images/addon/slide/sticker_02.png"></li>
      </ul>
    </div>
    <p class="text">
      アイテム画像の左上に「NEW」「SALE」「HOT」のシールを貼ることができます。<br>
      注目アイテムのアピールにご活用ください。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/items">アイテム編集</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /シール ポップアップ --><span class="ng-scope">

</span><!-- ニュース ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_news">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_news.png"></p>
      <h2>ニュース</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_news">
        <li><img alt="" src="/images/addon/slide/news_01.png"></li>
        <li><img alt="" src="/images/addon/slide/news_02.png"></li>
        <li><img alt="" src="/images/addon/slide/news_03.png"></li>
      </ul>
    </div>
    <p class="text">
      ストアにNEWSという項目が追加され、お知らせなどを掲載することができます。<br>
      ブログのような感覚で、画像付きの記事を作成することが可能です。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/">ダッシュボード</a></dd>
      <dd><a target="_blank" ng-href="" href="">マイストア</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /ニュース ポップアップ --><span class="ng-scope">

</span><!-- オーダーCSV出力 ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_csv">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_csv.png"></p>
      <h2>オーダーCSV出力</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_csv">
        <li><img alt="" src="/images/addon/slide/csv_01.png"></li>
        <li><img alt="" src="/images/addon/slide/csv_02.png"></li>
      </ul>
    </div>
    <p class="text">
      オーダー情報をCSV出力できるので管理が簡単になります。<br>
      ※こちらのアドオンはPCでのみご利用いただける機能になります。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/orders">オーダーリスト</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /オーダーCSV出力 ポップアップ --><span class="ng-scope">

</span><!-- 年齢制限 ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_limit">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_age_limit.png"></p>
      <h2>年齢制限</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_limit">
        <li><img alt="" src="/images/addon/slide/r18_01.png"></li>
        <li><img alt="" src="/images/addon/slide/r18_02.png"></li>
        <li><img alt="" src="/images/addon/slide/r18_03.png"></li>
      </ul>
    </div>
    <p class="text">
      お酒や成人向け商品など、取り扱い商品に応じてコンテンツの信頼性を高めるため、
      年齢制限をかけることができます。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/store">ストア設定</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /年齢制限 ポップアップ --><span class="ng-scope">

</span><!-- レビュー ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_review">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_review.png"></p>
      <h2>レビュー</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_review">
        <li><img alt="" src="/images/addon/slide/review_01.png"></li>
        <li><img alt="" src="/images/addon/slide/review_02.png"></li>
        <li><img alt="" src="/images/addon/slide/review_03.png"></li>
        <li><img alt="" src="/images/addon/slide/review_04.png"></li>
      </ul>
    </div>
    <p class="text">
      商品購入後にレビュー依頼メールを送信され、感想や意見を書いてもらえます。<br>
      レビューページでは、他の人の感想や評価を見れるようになるため、<br>
      商品を検討されている方により魅力を伝えることができます。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a target="_blank" ng-href="" href="">マイストア</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /レビュー ポップアップ --><span class="ng-scope">

</span><!-- ギフトフォーム ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_gift">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_gift.png"></p>
      <h2>ギフトフォーム</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_gift">
        <li><img alt="" src="/images/addon/slide/gift_01.png"></li>
        <li><img alt="" src="/images/addon/slide/gift_02.png"></li>
      </ul>
    </div>
    <p class="text">
      注文者情報とは別に、お届け先住所フォームを追加することができます。<br>
      ギフト用アイテムの発送にお役立てください。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a target="_blank" ng-href="" href="">マイストア</a></dd>
      <dd><a href="#!/orders">オーダー情報</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /ギフトフォーム ポップアップ --><span class="ng-scope">

</span><!-- 再入荷お知らせ ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_restock">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_restock.png"></p>
      <h2>再入荷お知らせ</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_restock">
        <li><img alt="" src="/images/addon/slide/restock_01.png"></li>
        <li><img alt="" src="/images/addon/slide/restock_02.png"></li>
      </ul>
    </div>
    <p class="text">
      アイテムがSOLD OUTの場合に、再入荷お知らせボタンを設置できます。<br>
      アイテムの在庫が補充されると、購入者に自動配信メールでお知らせします。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a target="_blank" ng-href="" href="">マイストア</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /再入荷お知らせ ポップアップ --><span class="ng-scope">

</span><!-- シークレット ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_secret">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_secret.png"></p>
      <h2>シークレット</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_secret">
        <li><img alt="" src="/images/addon/slide/secret_01.png"></li>
        <li><img alt="" src="/images/addon/slide/secret_02.png"></li>
      </ul>
    </div>
    <p class="text">
      ストアのトップページに任意のパスワードを設定することができます。<br>
      会員限定のストアなどにご利用ください。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a target="_blank" ng-href="" href="">マイストア</a></dd>
      <dd><a href="#!/store">ストア設定</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /シークレット ポップアップ --><span class="ng-scope">

</span><!-- Google アナリティクス ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div class="popup_addon" id="popup_ga">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_ga.png"></p>
      <h2>Google アナリティクス</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_ga">
        <li><img alt="" src="/images/addon/slide/ga_01.png"></li>
      </ul>
    </div>
    <p class="text">
      Google アナリティクスを利用して、あなたのストアに訪れたユーザーのアクセス情報をより詳しく分析できます。<br>
      ユーザーの傾向を調べて、売上げアップを目指しましょう！
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/store">ストア設定</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /Google アナリティクス ポップアップ --><span class="ng-scope">

</span><!-- 送料詳細設定アラート ポップアップ/ --><span class="ng-scope">
</span><div style="display:none;" class="ng-scope">
  <div id="popup_alert_shipping">
    <p class="image"><img alt="アラート" src="/images/icon/icon_attention_big_gray.png"></p>
    <p class="text">送料詳細設定をONにすると、<br>現在設定中の送料はリセットされますのでご注意ください。</p>
    <p class="button"><a ng-click="enableDetailShippingFee()" href="">送料詳細設定をONにする</a></p>
    <p class="cancel"><a onclick="$.fancybox.close();" href="">キャンセル</a></p>
  </div>
</div><span class="ng-scope">
</span><!-- /送料詳細設定アラート ポップアップ --><span class="ng-scope">

</span><!-- WEAR連携 ポップアップ/ --><span class="ng-scope">
</span><div style="display: none;" class="ng-scope">
  <div class="popup_addon" id="popup_wear">
    <div class="header">
      <p class="icon"><img alt="" src="/images/addon/icon_wear.png"></p>
      <h2>WEAR連携</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_wear">
        <li><img alt="" src="/images/addon/slide/wear_01.png"></li>
        <li><img alt="" src="/images/addon/slide/wear_02.png"></li>
        <li><img alt="" src="/images/addon/slide/wear_03.png"></li>
      </ul>
    </div>
    <p class="text">
      ファッションコーディネートアプリWEARとストアを連携することができます。<br>
      WEARに登録したアイテムを、ストアで販売することが可能になります。<br>
      ※WEARへの掲載には審査がございます。
    </p>
    <dl class="page">
      <dt>追加されるページ</dt>
      <dd><a href="#!/store">ストア設定</a></dd>
    </dl>
  </div>
</div><span class="ng-scope">
</span><!-- /WEAR連携 ポップアップ --><span class="ng-scope">

</span><span class="ng-scope">
</span></div>
@include('elements.footer')
<script>
	$(document).ready(function(){
		$('#open_shipping_select').on('click', function(event){
			 event.preventDefault();
			if ($('#shipping_select').css('display') == 'none') {
				$('#shipping_select').show();
			} else {
				$('#shipping_select').hide();
			}
		});
		$('button.cancel_button').on('click', function(){
			$('#shipping_select').hide();
		})
		$('#form_promotion').on('click', function(){
			$('#modal-win').show();
		});
		$('a.modal-move').on('click', function() {
			var modal = $(this).attr('href');
			$('#modal-win-inner').hide();
			$('.modal_slide').hide();
			$(modal).show();
		});
		$('a.modal-close').on('click', function(){
			$('#modal-win').hide();
		});
	});
</script>
