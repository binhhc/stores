{{HTML::style('css/bootstrap.min.css')}}
{{HTML::style('css/item_management.css')}}
{{HTML::style('css/addon.css')}}
{{HTML::script('js/jquery.min.js')}}
{{HTML::script('js/main_page.js')}}
@include('elements.header')
<div ng-view=""><div class="addon ng-scope">
  <div class="header">
    <h2><img alt="STORES.jpアドオン あなたのストアを、進化させる。" src="/img/addon/title.png"></h2>
  </div>
  <div class="wrapper">
    <ul class="addon_list">

        @foreach ($addons as $ad)              
            <li class="lists">
                <a class="fancybox" id="get_newsletter" href="#{{$ad['popup']}}">
                    <p class="icon"><img alt="{{$ad['name']}}" src="{{SysAddon::getImageURL($ad)}}"></p>
                    <div class="text">
                        <h3>{{$ad['name']}}</h3>
                        <p>{{$ad['intro']}}。</p>
                    </div>
                </a>
                <div addon="mail_magazine" sp-grip="" class="ng-scope">
                    <div ng-click="toggleAddon()" class="switch">
                        <p ng-show="isEnableAddon()" class="status active" style="display: none;">ON</p>
                        <p ng-hide="isEnableAddon()" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p>
                    </div>
                </div>
            </li>         
        @endforeach
        
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
      <p class="icon"><img alt="" src="/img/addon/icon_receive.png"></p>
      <h2>受取方法</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_storages">
        <li><img alt="" src="/img/addon/slide/receive_01.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_newsletter.png"></p>
      <h2>メールマガジン</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_newsletter">
        <li><img alt="" src="/img/addon/slide/newsletter_01.png"></li>
        <li><img alt="" src="/img/addon/slide/newsletter_02.png"></li>
        <li><img alt="" src="/img/addon/slide/newsletter_03.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_storages.png"></p>
      <h2>倉庫サービス</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_storages">
        <li><img alt="" src="/img/addon/slide/storages_01.png"></li>
        <li><img alt="" src="/img/addon/slide/storages_02.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_digital.png"></p>
      <h2>ダウンロード販売</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_digital">
        <li><img alt="" src="/img/addon/slide/digital_01.png"></li>
        <li><img alt="" src="/img/addon/slide/digital_02.png"></li>
        <li><img alt="" src="/img/addon/slide/digital_03.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_shipping.png"></p>
      <h2>送料詳細設定</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_shipping">
        <li><img alt="" src="/img/addon/slide/shipping_01.png"></li>
        <li><img alt="" src="/img/addon/slide/shipping_02.png"></li>
        <li><img alt="" src="/img/addon/slide/shipping_03.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_english.png"></p>
      <h2>英語対応</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_english">
        <li><img alt="" src="/img/addon/slide/english_01.png"></li>
        <li><img alt="" src="/img/addon/slide/english_02.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_blog.png"></p>
      <h2>ブログパーツ</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_blog">
        <li><img alt="" src="/img/addon/slide/blog_01.png"></li>
        <li><img alt="" src="/img/addon/slide/blog_02.png"></li>
        <li><img alt="" src="/img/addon/slide/blog_03.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_analytics.png"></p>
      <h2>アクセス解析</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_analytics">
        <li><img alt="" src="/img/addon/slide/analytics_01.png"></li>
        <li><img alt="" src="/img/addon/slide/analytics_02.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_coupon.png"></p>
      <h2>クーポン</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_coupon">
        <li><img alt="" src="/img/addon/slide/coupon_01.png"></li>
        <li><img alt="" src="/img/addon/slide/coupon_02.png"></li>
        <li><img alt="" src="/img/addon/slide/coupon_03.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_item_images.png"></p>
      <h2>アイテム画像追加</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_images">
        <li><img alt="" src="/img/addon/slide/images_01.png"></li>
        <li><img alt="" src="/img/addon/slide/images_02.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_pdf.png"></p>
      <h2>納品書PDF出力</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_pdf">
        <li><img alt="" src="/img/addon/slide/pdf_01.png"></li>
        <li><img alt="" src="/img/addon/slide/pdf_02.png"></li>
        <li><img alt="" src="/img/addon/slide/pdf_03.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_seal.png"></p>
      <h2>シール</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_seal">
        <li><img alt="" src="/img/addon/slide/sticker_01.png"></li>
        <li><img alt="" src="/img/addon/slide/sticker_02.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_news.png"></p>
      <h2>ニュース</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_news">
        <li><img alt="" src="/img/addon/slide/news_01.png"></li>
        <li><img alt="" src="/img/addon/slide/news_02.png"></li>
        <li><img alt="" src="/img/addon/slide/news_03.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_csv.png"></p>
      <h2>オーダーCSV出力</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_csv">
        <li><img alt="" src="/img/addon/slide/csv_01.png"></li>
        <li><img alt="" src="/img/addon/slide/csv_02.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_age_limit.png"></p>
      <h2>年齢制限</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_limit">
        <li><img alt="" src="/img/addon/slide/r18_01.png"></li>
        <li><img alt="" src="/img/addon/slide/r18_02.png"></li>
        <li><img alt="" src="/img/addon/slide/r18_03.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_review.png"></p>
      <h2>レビュー</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_review">
        <li><img alt="" src="/img/addon/slide/review_01.png"></li>
        <li><img alt="" src="/img/addon/slide/review_02.png"></li>
        <li><img alt="" src="/img/addon/slide/review_03.png"></li>
        <li><img alt="" src="/img/addon/slide/review_04.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_gift.png"></p>
      <h2>ギフトフォーム</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_gift">
        <li><img alt="" src="/img/addon/slide/gift_01.png"></li>
        <li><img alt="" src="/img/addon/slide/gift_02.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_restock.png"></p>
      <h2>再入荷お知らせ</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_restock">
        <li><img alt="" src="/img/addon/slide/restock_01.png"></li>
        <li><img alt="" src="/img/addon/slide/restock_02.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_secret.png"></p>
      <h2>シークレット</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_secret">
        <li><img alt="" src="/img/addon/slide/secret_01.png"></li>
        <li><img alt="" src="/img/addon/slide/secret_02.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_ga.png"></p>
      <h2>Google アナリティクス</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_ga">
        <li><img alt="" src="/img/addon/slide/ga_01.png"></li>
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
      <p class="icon"><img alt="" src="/img/addon/icon_wear.png"></p>
      <h2>WEAR連携</h2>
    </div>
    <div class="slider">
      <ul class="slider_contents" id="slider_wear">
        <li><img alt="" src="/img/addon/slide/wear_01.png"></li>
        <li><img alt="" src="/img/addon/slide/wear_02.png"></li>
        <li><img alt="" src="/img/addon/slide/wear_03.png"></li>
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
        
        $('.switch p.status' ).click(function(){
            var _class = $(this).attr('class');
            if(_class.match(/deactive/)) {
                $(this).parent().find('.active').show();
                $(this).parent().find('.deactive').hide();
                $(this).parent().find('.grip').css({'left':'57px'});
            } else {
                $(this).parent().find('.deactive').show();
                $(this).parent().find('.active').hide();
                $(this).parent().find('.grip').css({'left':'2px'});
            }
        });
	});
</script>
