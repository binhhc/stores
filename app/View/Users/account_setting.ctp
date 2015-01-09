<?php
    echo $this->Html->css(array('bootstrap.min', 'account_setting'));
?>
<!DOCTYPE html>
<!-- saved from url=(0037)https://stores.jp/dashboard#!/account -->
<html id="ng-app" ng-app="StoresJp" class="ng-scope">
<head>
</head>

<body data-twttr-rendered="true" cz-shortcut-listen="true">
  <div id="header" ng-controller="DashboardsController" ng-init="index()" class="ng-scope">
    <div class="wrap">
      <h1><a href="https://stores.jp/"><img src="./account_setting_files/logo.png" alt="STORES.jp"></a></h1>
      <p class="btn_store"><a href="https://hcbinhvn.stores.jp/preview?store_private_token=feff9bc510c679889de050393a9f359ae404fe8daef8eea7ef19829ab64c9f74ce7cd74dbdb925f293f65839892e27d9323258477eeb926c599e31dbc8b117e3" target="_blank">自分のストアをみる</a></p>
      <!-- Nav/ -->
      <ul class="nav">
        <li class="nav_design"><a href="https://stores.jp/stores/54ae55bcef3377318f000075" original-title="ストアデザイン">ストアデザイン</a></li>
        <li class="nav_items"><a href="https://stores.jp/dashboard#!/items" original-title="アイテム登録">アイテム登録</a></li>
        <li class="nav_store"><a href="https://stores.jp/dashboard#!/store" original-title="ストア設定">ストア設定</a></li>
        <!-- TODO -->
        <li class="nav_account current"><a href="./account_setting_files/account_setting.html" original-title="アカウント設定">アカウント設定</a></li>
        <li class="nav_orders"><span class="notify ng-binding" style="display:none;">0</span><a href="https://stores.jp/dashboard#!/orders" original-title="オーダーリスト">オーダーリスト</a></li>
        <li class="nav_remittances"><a href="https://stores.jp/dashboard#!/remittances" original-title="入金管理">入金管理</a></li>
        <li class="nav_storages" sp-show="storages" style="display: none;"><a href="https://stores.jp/dashboard#!/storages" original-title="倉庫サービス">倉庫サービス</a></li>
        <li class="nav_news" sp-show="news" style="display: none;"><a href="https://stores.jp/dashboard#!/news" original-title="ニュース">ニュース</a></li>
        <li class="nav_analytics" sp-show="analytics" style="display: none;"><a href="https://stores.jp/dashboard#!/analytics" original-title="アクセス解析">アクセス解析</a></li>
        <li class="nav_emails" sp-show="mail_magazine" style="display: none;"><a href="https://stores.jp/dashboard#!/emails" original-title="メールマガジン">メールマガジン</a></li>
        <li class="nav_coupons" sp-show="coupon" style="display: none;"><a href="https://stores.jp/dashboard#!/coupons" original-title="クーポン">クーポン</a></li>
        <li class="nav_feed"><a href="https://stores.jp/dashboard/user/" original-title="フィード">フィード</a></li>
        <li class="nav_addon"><a href="https://stores.jp/dashboard#!/addon" original-title="アドオン">アドオン</a></li>
        <li class="nav_faq"><a href="https://stores.jp/dashboard#!/faq" original-title="よくある質問">よくある質問</a></li>
      </ul>
      <!-- /Nav -->
    </div>
    <!-- News/ -->
    <p class="newsbox"><a href="http://storesjpinfo.tumblr.com/post/107230521164/or" target="_blank">メールマガジンでストアの最新情報を発信しよう！</a></p>
    <!-- <p class="newsbox"><a href="#!/referral">ご紹介キャンペーンでプレミアム料金無料！</a></p> -->
    <!-- /News -->
    <!-- SpecialNews/ -->
    <div id="special_news" class="shadow" ng-show="viaMarketUser()" style="display: none;">
      <div id="special_news_inner">
        <p class="text" ng-show="via == &#39;yuzawaya&#39; || via == &#39;creaco&#39;" style="display: none;">プロモーション機能をONにして<a href="http://market.stores.jp/yuzawaya" target="_blank">ユザワヤマーケット</a>で商品を販売しよう！</p>
        <p class="text" ng-show="via == &#39;toranoana&#39;" style="font-size: 16px; display: none;"><a href="http://market.toranoana.jp/" target="_blank">とらのあなマーケット</a>で販売するために、プロモーション機能をONにしよう！</p>
        <p class="text" ng-show="via == &#39;passthebaton&#39;" style="display: none;"><a href="http://market.pass-the-baton.com/" target="_blank">PASS THE BATON MARKET</a>で販売するために、プロモーション機能をONにしよう！</p>
        <p class="text" ng-show="via == &#39;village-vanguard&#39;" style="display: none;"><a href="http://market.village-v.co.jp/" target="_blank">ヴィレッジヴァンガードマーケット</a>で販売するために、プロモーション機能をONにしよう！</p>
        <p class="text" ng-show="via == &#39;zozo&#39;" style="display: none;">プロモーション機能をONにして<a href="http://market.zozo.jp/" target="_blank">ZOZOMARKET</a>で商品を販売しよう！</p>
        <p class="text" ng-show="via == &#39;exblog&#39;" style="display: none;"><a href="http://exmarket.exblog.jp/" target="_blank">エキサイトブログマーケット</a>で販売するために、プロモーション機能をONにしよう！</p>
        <ul class="link">
          <li><a href="https://stores.jp/sessions/promotion" original-title="">プロモーション機能とは</a></li>
          <li ng-show="via == &#39;zozo&#39;" style="display: none;"><a href="http://market.zozo.jp/about" target="_blank" original-title="">ZOZOMARKETとは</a></li>
          <li ng-show="via == &#39;yuzawaya&#39; || via == &#39;creaco&#39;" style="display: none;"><a href="http://market.stores.jp/yuzawaya/about" target="_blank" original-title="">ユザワヤマーケットとは</a></li>
          <li ng-show="via == &#39;toranoana&#39;" style="display: none;"><a href="http://market.toranoana.jp/" target="_blank" original-title="">とらのあなマーケットとは</a></li>
          <li class="long" ng-show="via == &#39;passthebaton&#39;" style="display: none;"><a href="http://market.pass-the-baton.com/" target="_blank" original-title="">PASS THE BATON MARKETとは</a></li>
          <li class="long" ng-show="via == &#39;village-vanguard&#39;" style="display: none;"><a href="http://market.village-v.co.jp/" target="_blank" original-title="">ヴィレッジヴァンガードマーケットとは</a></li>
          <li ng-show="via == &#39;exblog&#39;" style="display: none;"><a href="http://exmarket.exblog.jp/" target="_blank" original-title="">エキサイトブログマーケットとは</a></li>
        </ul>
        <p class="delete"><a href="" ng-click="sp_news_show = false">削除</a></p>
      </div>
    </div>
    <!-- /SpecialNews -->
  </div>
  <div ng-view=""><div class="wrapper account ng-scope">
  <div class="heading_box clearfix">
    <h2 class="heading fl_l">アカウント設定</h2>
  </div>
  <div class="box_wht">
    <dl>
      <dd class="form_basic">
        <dl class="cols no_border">
          <dt>メールアドレス</dt>
          <dd class="horizon">
            <ul>
              <li><strong class="ng-binding">hcbinhvn28@gmail.com</strong></li>
              <li class="btn_low_m"><a href="https://stores.jp/dashboard#!/account/email">変更する</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="cols">
          <dt>パスワード</dt>
          <dd class="horizon">
            <p class="btn_low_m"><a href="https://stores.jp/dashboard#!/account/password">変更する</a></p>
          </dd>
        </dl>
        <dl class="cols">
          <dt>プロフィール</dt>
          <dd class="horizon">
            <p class="btn_low_m" ng-hide="account_info.has_profile"><a href="https://stores.jp/dashboard#!/account/profile">登録する</a></p>
            <p class="btn_low_m" ng-show="account_info.has_profile" style="display: none;"><a href="https://stores.jp/dashboard#!/account/profile">編集する</a></p>
          </dd>
        </dl>
        <dl id="faq_address" class="cols">
          <dt>
            配送先情報<span class="info"><a href="https://stores.jp/dashboard#!/faq/follow#faq_address" target="_blank"><img src="./account_setting_files/icon_help.png" alt="Information"></a></span>
          </dt>
          <dd class="horizon">
            <p class="btn_low_m" ng-hide="account_info.has_profile_address"><a href="https://stores.jp/dashboard#!/account/address">登録する</a></p>
            <p class="btn_low_m" ng-show="account_info.has_profile_address" style="display: none;"><a href="https://stores.jp/dashboard#!/account/address">編集する</a></p>
            <p class="btn_low_m" ng-show="account_info.has_profile_address" ng-click="delete_address()" style="display: none;"><a href="">削除する</a></p>
          </dd>
        </dl>
        <dl class="cols">
          <dt>クレジットカード情報</dt>
          <dd class="horizon">
            <p class="btn_low_m" ng-hide="account_info.has_credit_card"><a href="https://stores.jp/dashboard#!/account/credit_card/edit">登録する</a></p>
            <p class="btn_low_m" ng-show="account_info.has_credit_card" style="display: none;"><a href="https://stores.jp/dashboard#!/account/credit_card">編集する</a></p>
            <p class="btn_low_m" ng-show="account_info.has_credit_card" ng-click="delete_credit()" style="display: none;"><a href="">削除する</a></p>
          </dd>
        </dl>
        <dl class="cols" ng-show="account_info.has_store &amp;&amp; !account_info.mall">
          <dt>振り込み先口座</dt>
          <dd>
            <p class="btn_low_m" ng-hide="account_info.has_banks"><a href="https://stores.jp/dashboard#!/account/bank">登録する</a></p>
            <p class="btn_low_m" ng-show="account_info.has_banks" style="display: none;"><a href="https://stores.jp/dashboard#!/account/bank">変更する</a></p>
          </dd>
        </dl>
        <dl class="cols">
          <dt id="mail_title">メール通知設定</dt>
          <dd id="mail_contents" class="horizon">
            <p class="btn_low_m"><a href="https://stores.jp/dashboard#!/account/notifications">設定する</a></p>
          </dd>
        </dl>
        <dl class="cols" ng-show="account_info.plan == &#39;premium&#39; &amp;&amp; account_info.premium_auto_update &amp;&amp; !account_info.premium_terminated" style="display: none;">
          <dt>プレミアムプランの解約</dt>
          <dd>
            <ul>
              <li><p class="btn_low_m"><a href="https://stores.jp/dashboard#popup_premium_form_message" class="fancybox" ng-click="premium_terminate_popup()">解約する</a></p></li>
              <li ng-show="account_info.premium_remaining_date &gt;= 0"><p class="memo ng-binding">あと日利用できます</p></li>
              <li ng-show="account_info.premium_remaining_date &lt; 0" style="display: none;"><p class="memo">お支払いが確認できないため、数日中に解約されます</p></li>
            </ul>
          </dd>
        </dl>
        <dl class="cols" ng-hide="account_info.plan == &#39;premium&#39; &amp;&amp; account_info.premium_auto_update &amp;&amp; !account_info.premium_terminated">
          <dt>退会</dt>
          <dd>
            <p class="btn_low_m" ng-show="account_info.has_store"><a href="https://stores.jp/dashboard#popup_quit_form_message" class="fancybox" ng-click="pageview(&#39;/dashboard#!/quit/popup&#39;)">退会する</a></p>
            <p class="btn_low_m" ng-hide="account_info.has_store" style="display: none;"><a href="https://stores.jp/dashboard#popup_quit_form_follow" class="fancybox" ng-click="pageview(&#39;/dashboard#!/quit/popup&#39;)">退会する</a></p>
          </dd>
        </dl>
      </dd>
    </dl>
  </div>
</div><span class="ng-scope">

</span><!-- プレミアム解約 確認 ポップアップ/ --><span class="ng-scope">
</span><div class="hide ng-scope">
  <div id="popup_premium_form_message">
    <h2>プレミアムプランを本当に解約してもよろしいですか？</h2>
    <p class="image"><img src="./account_setting_files/icon_premium_gray.png" alt=""></p>
    <h3>解約後は下記のデータが消去／制限されます</h3>
    <ul class="delete_list">
      <li class="memo">独自ドメインの永久消滅</li>
      <li class="memo">アクセス解析のデータ消滅</li>
      <li class="memo">各種アドオン機能の利用制限</li>
    </ul>
    <ul class="btn_pair">
      <li class="btn_low" style="margin-top:20px;"><a class="close_fancybox" href="">キャンセル</a></li>
      <li class="btn_high"><a href="https://stores.jp/dashboard#popup_premium_form" class="fancybox" ng-click="premium_terminate_click()">次へ</a></li>
    </ul>
  </div>
</div><span class="ng-scope">
</span><!-- プレミアム解約 確認 ポップアップ/ --><span class="ng-scope">

</span><!-- プレミアム解約 ポップアップ/ --><span class="ng-scope">
</span><div class="hide ng-scope">
  <div id="popup_premium_form">
    <h2>プレミアムプランを解約されるにあたって<br>
    今のお考えに最も近いものを1つ選択してください</h2>
    <div id="bg_premium_form2">
      <ul>
        <li>
          <div class="styled_radio">
            <input type="radio" name="" id="check_premium_01" ng-model="premium_check.check_premium" ng-value="1" class="ng-pristine ng-valid" value="1">
            <span class="checked-false"></span>
          </div>
          <label for="check_premium_01">ストアへの来訪者が増えてほしかった</label>
        </li>
        <li>
          <div class="styled_radio">
            <input type="radio" name="" id="check_premium_02" ng-model="premium_check.check_premium" ng-value="2" class="ng-pristine ng-valid" value="2">
            <span class="checked-false"></span>
          </div>
          <label for="check_premium_02">必要な機能が足りなかった（その機能をお書きください）</label>
        </li>
        <li>
          <div class="styled_radio">
            <input type="radio" name="" id="check_premium_03" ng-model="premium_check.check_premium" ng-value="3" class="ng-pristine ng-valid" value="3">
            <span class="checked-false"></span>
          </div>
          <label for="check_premium_03">改善策などを教えてくれるストア診断サービスが欲しかった</label>
        </li>
        <li>
          <div class="styled_radio">
            <input type="radio" name="" id="check_premium_04" ng-model="premium_check.check_premium" ng-value="4" class="ng-pristine ng-valid" value="4">
            <span class="checked-false"></span>
          </div>
          <label for="check_premium_04">プレミアムの継続期間に応じた特典が欲しかった</label>
        </li>
        <li>
          <div class="styled_radio">
            <input type="radio" name="" id="check_premium_05" ng-model="premium_check.check_premium" ng-value="5" class="ng-pristine ng-valid" value="5">
            <span class="checked-false"></span>
          </div>
          <label for="check_premium_05">プレミアムプラン限定の運営サポートが欲しかった</label>
        </li>
        <li>
          <div class="styled_radio">
            <input type="radio" name="" id="check_premium_06" ng-model="premium_check.check_premium" ng-value="6" class="ng-pristine ng-valid" value="6">
            <span class="checked-false"></span>
          </div>
          <label for="check_premium_06">ZOZOMARKETに掲載したかった</label>
        </li>
        <li>
          <div class="styled_radio">
            <input type="radio" name="" id="check_premium_07" ng-model="premium_check.check_premium" ng-value="7" class="ng-pristine ng-valid" value="7">
            <span class="checked-false"></span>
          </div>
          <label for="check_premium_07">月額500円であればよかった</label>
        </li>
        <li>
          <div class="styled_radio">
            <input type="radio" name="" id="check_premium_08" ng-model="premium_check.check_premium" ng-value="8" class="ng-pristine ng-valid" value="8">
            <span class="checked-false"></span>
          </div>
          <label for="check_premium_08">その他</label>
        </li>
      </ul>
    </div>
    <textarea placeholder="STORES.jpに関するご意見・ご要望（必要な機能など）をお書きください" ng-model="premium_check.box" class="ng-pristine ng-valid"></textarea>
    <div class="btn_low" style="text-align: center; display: none;" ng-show="status == &#39;terminate&#39;"><button>送信中</button></div>
    <ul class="btn_pair" ng-hide="status == &#39;terminate&#39;">
      <li class="btn_low" style="margin-top:20px;"><a class="close_fancybox" href="">解約しない</a></li>
      <li class="btn_high"><a ng-click="terminate()" href="">解約する</a></li>
    </ul>
  </div>
</div><span class="ng-scope">
</span><!-- /プレミアム解約 ポップアップ --><span class="ng-scope">

</span><!-- プレミアム解約 完了 ポップアップ/ --><span class="ng-scope">
</span><div class="hide ng-scope">
  <div id="popup_premium_form_finish">
    <h2>プレミアムプランのご利用ありがとうございました</h2>
    <p class="image"><img src="./account_setting_files/icon_premium_gray.png" alt=""></p>
    <h3>プレミアムプランをご利用いただきありがとうございました。<br>
    より良いサービスにしていけるよう、努力してまいります。<br>
    今後ともSTORES.jpをよろしくお願いいたします。</h3>
    <p class="text">なお、プレミアムプランのご契約期間は1ヶ月となり<br>
    プレミアムプランにご加入いただいた契約日から翌月前日までとなります。<br>
    契約終了日までは、引き続きプレミアムプランをご利用いただけます。<br>
    またのご利用をお待ちしております。</p>
  </div>
</div><span class="ng-scope">
</span><!-- プレミアム解約 完了 ポップアップ/ --><span class="ng-scope">

</span><!-- 退会確認 ポップアップ/ --><span class="ng-scope">
</span><div class="hide ng-scope">
  <div id="popup_quit_form_message">
    <h2>STORES.jpを本当に退会してもよろしいですか？</h2>
    <h3>退会後は下記のデータが消滅されます</h3>
    <ul class="delete_list">
      <li class="memo">登録済みのアイテムデータ消滅</li>
      <li class="memo">オーダー情報の消滅</li>
      <li class="memo">ストアに関する各種設定の消滅</li>
    </ul>
    <ul class="btn_pair">
      <li class="btn_low" style="margin-top:20px;"><a class="close_fancybox" href="">キャンセル</a></li>
      <li class="btn_high"><a href="https://stores.jp/dashboard#popup_quit_form" class="fancybox" ng-click="pageview(&#39;/dashboard#!/quit/enquete/popup&#39;)">次へ</a></li>
    </ul>
  </div>
</div><span class="ng-scope">
</span><!-- 退会確認 ポップアップ/ --><span class="ng-scope">

</span><!-- 退会アンケート ポップアップ/ --><span class="ng-scope">
</span><div class="hide ng-scope">
  <div id="popup_quit_form">
    <h2>STORES.jpを退会する理由をお聞かせください</h2>
    <div id="bg_premium_form">
      <ul>
        <li>
          <div class="styled_checkbox">
            <input type="checkbox" name="" id="check_quit_01" ng-model="quit_check.check_quit_01" class="ng-pristine ng-valid">
            <span class="checked-false"></span>
          </div>
          <label for="check_quit_02">売る物がない</label>
        </li>
        <li>
          <div class="styled_checkbox">
            <input type="checkbox" name="" id="check_quit_02" ng-model="quit_check.check_quit_02" class="ng-pristine ng-valid">
            <span class="checked-false"></span>
          </div>
          <label for="check_quit_02">サポートが不足していると感じた</label>
        </li>
        <li>
          <div class="styled_checkbox">
            <input type="checkbox" name="" id="check_quit_03" ng-model="quit_check.check_quit_03" class="ng-pristine ng-valid">
            <span class="checked-false"></span>
          </div>
          <label for="check_quit_03">希望するほど売上が上がらない</label>
        </li>
        <li>
          <div class="styled_checkbox">
            <input type="checkbox" name="" id="check_quit_04" ng-model="quit_check.check_quit_04" class="ng-pristine ng-valid">
            <span class="checked-false"></span>
          </div>
          <label for="check_quit_04">他のオンラインストア構築サービスに移行する</label>
        </li>
        <li>
          <div class="styled_checkbox">
            <input type="checkbox" name="" id="check_quit_05" ng-model="quit_check.check_quit_05" class="ng-pristine ng-valid">
            <span class="checked-false"></span>
          </div>
          <label for="check_quit_05">URLを変更する為</label>
        </li>
        <li>
          <div class="styled_checkbox">
            <input type="checkbox" name="" id="check_quit_06" ng-model="quit_check.check_quit_06" class="ng-pristine ng-valid">
            <span class="checked-false"></span>
          </div>
          <label for="check_quit_06">必要な機能がなかった</label>
        </li>
        <li>
          <div class="styled_checkbox">
            <input type="checkbox" name="" id="check_quit_07" ng-model="quit_check.check_quit_07" class="ng-pristine ng-valid">
            <span class="checked-false"></span>
          </div>
          <label for="check_quit_07">キャンペーンなど、一時的な利用だった</label>
        </li>
        <li>
          <div class="styled_checkbox">
            <input type="checkbox" name="" id="check_quit_02" ng-model="quit_check.check_quit_08" class="ng-pristine ng-valid">
            <span class="checked-false"></span>
          </div>
          <label for="check_quit_08">その他</label>
        </li>
      </ul>
    </div>
    <textarea placeholder="その他、希望する機能や、STORES.jpに関するご意見・ご要望をお書きください。" ng-model="quit_check.box" class="ng-pristine ng-valid"></textarea>
    <ul class="btn_pair">
      <li class="btn_low" style="margin-top:20px;"><a class="close_fancybox" href="">退会しない</a></li>
      <li class="btn_high"><a href="" ng-hide="pending" ng-click="quit()">退会する</a></li>
    </ul>
  </div>
</div><span class="ng-scope">
</span><!-- /退会アンケート ポップアップ --><span class="ng-scope">

</span><!-- フォロー会員退会 ポップアップ/ --><span class="ng-scope">
</span><div class="hide ng-scope">
  <div id="popup_quit_form_follow">
    <h2>STORES.jpを本当に退会してもよろしいですか？</h2>
    <h3>退会後は下記のデータが消滅されます</h3>
    <ul class="delete_list">
      <li class="memo">フォロー済みストアの情報</li>
      <li class="memo">配送先情報</li>
      <li class="memo">クレジットカード情報</li>
    </ul>
    <ul class="btn_pair">
      <li class="btn_low" style="margin-top: 20px;"><a class="close_fancybox" href="">退会しない</a></li>
      <li class="btn_high"><a href="https://stores.jp/dashboard#popup_quit_form" class="fancybox" ng-click="quit()">退会する</a></li>
    </ul>
  </div>
</div><span class="ng-scope">
</span><!-- フォロー会員退会 ポップアップ/ --><span class="ng-scope">

</span></div>


  <!-- Footer/ -->
  <div id="footer">
    <p class="support_banner"><a href="https://stores.jp/dashboard#!/support">ストアオーナー限定 ストア運営サポート</a></p>
    <p class="referral_banner"><a href="https://stores.jp/dashboard#!/referral">ご紹介キャンペーンでプレミアム料金無料</a></p>
    <ul id="foot_navi">
      <li><a href="http://storesjpinfo.tumblr.com/" target="_blank">お知らせ</a></li>
      <li><a href="https://stores.jp/contact" target="_blank">お問い合わせ</a></li>
      <li><a href="https://stores.jp/terms" target="_blank">利用規約</a></li>
      <li><a href="https://stores.jp/tokushoho" target="_blank">特定商取引及び古物営業法に基づく表記</a></li>
      <li><a href="https://stores.jp/privacy_policy" target="_blank">プライバシーポリシー</a></li>
      <li><a href="http://bracket.co.jp/" target="_blank">運営会社</a></li>
      <li class="logout"><a href="https://stores.jp/logout">ログアウト</a></li>
    </ul>
    <p>Copyright© 2015 Bracket, Inc All Rights Reserved</p>
  </div>
  <!-- /Footer -->

  <!-- Information Panel -->
  <div id="alert_panel" class="success">
    <p></p>
  </div>
  <!-- /Information Panel -->


</body></html>