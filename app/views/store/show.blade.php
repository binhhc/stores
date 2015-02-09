
<input type="hidden" name="delay_load" value="">
<div id="item" ng-init="show()" itemscope itemtype="http://data-vocabulary.org/Product">
  <div class="height_fix">
    <!-- Item/ -->
    <div id="header_basic">
      <h1 id="store_logo" ng-style="styles.store_logo">
        <a href="/" ng-show="styles.logo"><span class="mark"><img ng-src="{[logo_src]}" alt="{[styles.name]}"></span></a>
        <a href="/" ng-hide="styles.logo"><span class="txt" itemprop="brand">{[styles.name]}</span></a>
      </h1>
    </div>
    <div id="navi_main" style="display:none;" ng-show="categories || hasAbout || showVirtualStore || news_navi">
      <dl style="font-family: Arial">
        <dd><a href="/">TRANG CHỦ</a></dd>
        <dd sp-controller="NewsController" addon="news" sp-show ng-show="news_navi"><a href="#!/news">TIN TỨC</a></dd>
        <dd ng-show="hasAbout"><a href="#!/about">GIỚI THIỆU</a></dd>
        <dd class="btn_dropdown" ng-show="categories">
          <a href="">DANH MỤC</a>
          <ul class="dropdown">
            <li ng-repeat="category in categories"><a ng-click="category_click(category.name)">{[category.name]}</a></li>
          </ul>
        </dd>
        <dd ng-show="showVirtualStore"><a href="{[virtualStore.url]}" target="_blank">VIRTUAL STORE</a></dd>
      </dl>
    </div>
    <div class="box_wht">
      <span class="sticker" ng-if="show_sticker && item.sticker.store_image_path"><img ng-src="{[item.sticker.store_image_path]}"></span>
      <div class="fl_l" ng-hide="not_found">
        <dl class="img_big">
          <dd style="display: none" ng-hide="item.mybook_item" ><a ng-href="{[main_image.original_src]}"><img ng-src="{[main_image.preview_src]}" alt="{[item.name]}" width="460" height="460" itemprop="image"></a></dd>
          <dd style="display: none" class="item_mybook" ng-show="item.mybook_item"><a ng-href="{[main_image.original_src]}"><img ng-src="{[main_image.original_src]}" alt="{[item.name]}" width="100%" itemprop="image"></a></dd>
        </dl>
        <!-- Thumb/ -->
        <dl class="img_thumbs" ng-show="item.images.length < 6">
          <dd ng-class="{img_thumbs_mybook: item.mybook_item}" ng-repeat="image in item.images"><img ng-src="{[image.thumb_src]}" ng-click="select_image(image)" width="80"></dd>
        </dl>
        <!-- /Thumb -->
        <!-- SlideThumb/ -->
        <div id="slide_thumb" ng-show="item.images.length > 5">
          <ul class="slide_navi">
            <li class="prev none">PREV</li>
            <li class="next">NEXT</li>
          </ul>
          <div class="slide_mask">
            <ul class="slide_wrap">
              <li class="slide_cols" ng-repeat="image_group in item.image_groups">
                <ul>
                  <li class="cols" ng-repeat="image in image_group"><img ng-src="{[image.thumb_src]}" width="70" height="70" alt="{[item.name]}" ng-click="select_image(image)"></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <!-- /SlideThumb -->
      </div>
      <div class="fl_r" ng-hide="not_found">
        <h1 class="item_name">{[item.name]}</h1>
        <div style="display: none" ng-hide="item.review_count==0||item.review_count==''">
          <div class="star" sp-show="review" >
            <div ng-if="I18n.locale == 'ja'"><p id="default-review" class="icon" data-score={[item.avg_score]} ><span>（<a ng-href="#!/items/{[item.id]}/reviews">{[I18n.store.show.review.review]}{[item.review_count]}件</a>）</span></p></div>
            <div ng-if="I18n.locale == 'en'"><p id="default-review" class="icon" data-score={[item.avg_score]} ><span>（<a ng-href="#!/items/{[item.id]}/reviews">{[I18n.store.show.review.review]}{[item.review_count]}</a>）</span></p></div>
          </div>
        </div>
        <p class="price">{[item.price | number:0]} Đồng</p>
        <p class="free_shipping" style="display:none" ng-show="shipping_fee.free_shipping"><span>{[I18n.store.show.shippingFee.balloon1]}{[shipping_fee.free_shipping | number:0]}{[I18n.store.show.shippingFee.balloon2]}</span></P>
        <p style="font-size: 11px;" ng-hide="I18n.locale == 'en'">{[I18n.store.show.tax]}</p>
        <p style="font-size: 11px;" ng-show="I18n.locale == 'ja' && mall == 'parco'">※＜PARCOカード＞のOFFは「店頭お取り置き」選択時のみ対象となります。</p>
        <p class="shipping" ng-hide="item.is_digit">
          <span class="shipping" ng-show="showShippingFee(true)">{[I18n.store.show.freeShipping]}<br></span>
          <span ng-show="showShippingFee()">{[I18n.store.show.orderFee]}<br></span>
          <span style="display: none" ng-show="showShippingFee() && shipping_fee.type == 'delivery_method' && !item.mybook_item">※{[I18n.store.show.shippingFee.hear1]}<a href="#popup_shipping">{[I18n.store.show.shippingFee.hear2]}</a>{[I18n.store.show.shippingFee.hear3]}</span>
        </p>
        <p class="shipping" ng-show="item.is_digit">{[I18n.store.show.download]}</p>
        <div class="dl_sales {[item.digital_contents.file_type]} clearfix" ng-show="item.is_digit">
          <p class="file_name">{[item.digital_contents.name]}</p>
          <p class="volume">{[item.digital_contents.human_size]}</p>
        </div>
        <table class="variation" cellpadding="0" cellspacing="0">
          <tr ng-repeat="quantity in item.quantities">
            <th ng-hide="item.quantities.length == 1">{[quantity.variation]}</th>
            <td ng-show="quantity.quantity > 0 && I18n.locale == 'en'">Quantity:</td>
            <td ng-show="quantity.quantity > 0">
              <div class="styled_select_thin">
                <select ng-model="stocks[quantity.variation]">
                  <option ng-if="!item.is_digit" ng-repeat="q in quantity.q_array | limitTo: 100">{[$index + padding]}</option>
                  <option ng-if="item.is_digit">1</option>
                </select>
                <span>{[stocks[quantity.variation]]}</span>
              </div>
              <p ng-show="quantity.quantity > 0 && I18n.locale =='ja'">個</p>
            </td>
            <td ng-hide="quantity.quantity > 0">SOLD OUT</td>
            <td class="restock" sp-show="restock_notification">
              <a ng-hide="quantity.quantity > 0" href="#restock" ng-click="restock_pop(quantity)" id="get_restock">再入荷お知らせ</a>
            </td>
          </tr>
        </table>
        <p class="btn_high_big cart" ng-show="total_quantity"><button type='button' ng-click="cart.add(item, stocks)">{[I18n.store.show.addCart]}</button></p>
        <!-- Favorite/ -->
        <iframe ng-src="{[ stores_domain ]}/iframe/store/favorite_item_button/{[item_id]}" style="width: 300px; height: 50px; background-color: transparent;" scrolling="no" frameborder="0" sp-if="follow"></iframe>
        <!-- /Favorite -->
        <p class="item_txt" id="item_description" style="margin-top: 20px; overflow: auto; white-space: pre-wrap; word-wrap: break-word;" itemprop="description">{[item.description]}</p>
        <ul id="btn_sns">
          <li id="btn_sns_twitter"><a class="tweet" ng-class="I18n.locale" href="http://twitter.com/intent/tweet?ount=none&lang=ja&text={[tweet_item_name]} {[tw_url]} @stores_jp " name='tw_btn' ng-bind="I18n.store.show.tweet"></a></li>
          <li id="btn_sns_facebook" ng-hide="original_domain"><a ng-click='postToFeed(fb_url)'  ng-class="I18n.locale" name='fb_btn' ng-bind="I18n.store.show.share"></a></li>
          <li class="sumally">
            <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://platform.sumally.com/buttons.min.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'sumally-bjs'));
            </script>
            <div class="sumally-button" data-button-type="plus" data-image="{[main_image.original_src]}" data-name="{[item.name]}" data-metadata="{[styles.name]}" data-title="{[itme.title]}" data-additional-images="{[item_images.join(' ')]}"></div>
          </li>
        </ul>
      </div>
      <p style="text-align:center; font-weight:bold; font-size:14px; display:none;" ng-show="not_found">アイテムが見つかりませんでした</p>
    </div>
    <p class="btn_low btn_center" ng-hide="market_back_url"><a href="/" >{[I18n.store.show.back]}</a></p>
    <p class="btn_low btn_center" ng-show="market_back_url"><a href="{[market_back_url]}" >マーケットへ戻る</a></p>
    <!-- /Item -->
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
      <p><a href="https://stores.jp/?via={[ via ]}&id={[user_name]}" target="_blank" ng-mouseover="footer_mouse_over()"><img src="/img/logo_footer.png" alt="ネットショップの開業ならSTORES.jp"></a></p>
    </div>
  </div>
</div>
<!-- /Footer -->

<!-- PopupCart/ -->
<div style="display: none;">
  <div id="popup_cart" class="box_wht">
    <h2><span class="icon_cart">{[I18n.store.cart.title]}</span></h2>
    <dl id="cart_items">
      <dd class="title">
        <dl>
          <dd class="sz_l">{[I18n.store.cart.item]}</dd>
          <dd class="sz_s tl">{[I18n.store.cart.category]}</dd>
          <dd class="sz_s tr">{[I18n.store.cart.price]}</dd>
          <dd class="sz_s tc">{[I18n.store.cart.quantity]}</dd>
          <dd class="sz_s tr">{[I18n.store.cart.total]}</dd>
        </dl>
      </dd>
      <dd class="lists" ng-repeat="cart_item in cart.items">
        <dl>
          <dd class="sz_xs btn_delete_mini"><a href="" ng-click="cart.remove(cart_item)">Delete</a></dd>
          <dd class="sz_i"><img ng-src="{[cart_item.image.src]}"></dd>
          <dd class="sz_l">{[cart_item.name]}</dd>
          <dd class="sz_s tl">{[cart.null_to_hyphen(cart_item.variation)]}</dd>
          <dd class="sz_s tr">¥{[cart_item.price | number:0]}</dd>
          <dd class="sz_s tc">{[cart_item.quantity]}</dd>
          <dd class="sz_s tr">¥{[(cart_item.price * cart_item.quantity) | number:0]}</dd>
        </dl>
      </dd>
      <dd class="lists shipping">
        <dl>
          <dd class="sz_m tr">{[I18n.store.cart.shippingFee]}</dd>
          <dd class="sz_s tr">¥{[cart.shipping_fee | number:0]}</dd>
        </dl>
      </dd>
      <dd class="lists total">
        <dl>
          <dd class="sz_m tr">{[I18n.store.cart.subtotal]}</dd>
          <dd class="sz_s tr">¥{[cart.total | number:0]}</dd>
        </dl>
      </dd>
    </dl>
    <div ng-show="cart.items.length > 0" style="width: 300px; margin: 0 auto;">
      <iframe ng-src="{[ stores_domain ]}/iframe/store/cart_popup" style="background-color: transparent; overflow: visible;" name="cart_popup" id="cart_popup" scrolling="no" frameborder="0" sp-if="follow"></iframe>
      <p class="btn_high_big cart" style="padding-bottom: 20px;"><button id="checkout_button" type="button" class="ng-binding" sp-hide="follow">{[I18n.store.cart.check]}</button></p>
    </div>
    <p style="text-align:center; padding:0 0 20px 0;" ng-show="market_back_url"><a href="{[market_back_url]}" style="color: #217fbe;">マーケットへ戻る</a></p>
  </div>
</div>
<!-- /PopupCart -->

<!-- PopupShipping/ -->
<div style="display: none;">
  <div id="popup_shipping" class="box_wht">
    <h2><span class="icon_cart">{[I18n.store.show.shippingFee.cost]}</span></h2>
    <dl>
      <div ng-repeat="area in item.delivery_method.areas">
        <dt>{[area.name]}</dt>
        <dd>{[area.fee | number:0]}{[I18n.store.show.shippingFee.yen]}</dd>
      </div>
      <dt>{[I18n.store.show.shippingFee.other]}</dt>
      <dd>{[item.delivery_method.default_fee | number:0]}{[I18n.store.show.shippingFee.yen]}</dd>
    </dl>
  </div>
</div>
<!-- /PopupShipping -->

<!-- PopupRestock/ -->
<div style="display: none;">
  <div class="popup" id="restock" class="box_wht">
    <div>
      <div ng-hide="restock_finished">
      <h2>再入荷お知らせ</h2>
      <p class="text">商品が再入荷した際に、メールでお知らせいたします。</p>
      <h3>{[item.name]}</h3>
      <p class="variation">{[selectedVariation.variation]}</p>
      <div class="container">
        <input type="email" name="email" ng-model="restock_email_address" placeholder="{[I18n.store.show.restockPopup.invalid_email]}" required class="ng-pristine ng-invalid ng-invalid-required ng-valid-email">
        <p class="btn_high_s" ng-hide="restock_submit_clicked"><a href="" ng-click="restock_submit(restock_email_address)">{[I18n.store.show.restockPopup.submit]}</a></p>
        <p class="btn_low_s" ng-show="restock_submit_clicked">{[I18n.store.show.restockPopup.sending]}</p>
        <p class="error" ng-show="invalid_email" style="display: none;">{[I18n.store.show.restockPopup.invalid_email]}</p>
        <p class="error" ng-show="restock_exists" style="display: none;">{[I18n.store.show.restockPopup.restock_exists]}</p>
        <p class="error" ng-show="restock_error" style="display: none;">{[I18n.store.show.restockPopup.restock_error]}</p>
      </div>
      </div>
    </div>
    <div class="after" style="display:none;" ng-show="restock_finished">
      <h2>再入荷お知らせを受け付けました</h2>
      <p class="image"><img src="/img/icon_mail.png" width="85px" alt="確認のメールをお送りいたしました"></p>
      <p class="text">ご入力頂いた宛先に、確認のメールをお送りいたしました。メールが届かない場合は、お手数ですが再度お試しください。</p>
      <p class="notice">※商品が入荷しない場合、メールは配信されませんので予めご了承ください。</p>
    </div>
  </div>
</div>
<!-- /PopupRestock -->

<div id="fb-root"></div>

<script>
  $(document).ready(function() {
    $('.img_big a').fancybox();
    $('.shipping a').fancybox();
    $('.variation a').fancybox();

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
    $.fn.raty.defaults.path = '/img/';

  });

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=106518812838112";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  //$(document).ready(function(){
  //  $("a.tweet").click(function(){
  //    var w = 550; var h = 420;
  //    var sw = screen.width; var sh = screen.height;
  //    var l = 0; var t = 0;
  //    if (sw > w) l = Math.round(sw/2 - w/2);
  //    if (sh > h) t = Math.round(sh/2 - h/2);
  //    window.open(this.href, "Tweet","width="+w+",height="+h+",left="+l+",top="+t+",scrollbars=yes,resizable=yes,toolbar=no,location=yes");
  //    return false;
  //  });
  //});
</script>
