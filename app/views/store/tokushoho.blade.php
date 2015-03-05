
<div class="wrapper" id="store_cart" ng-init="tokushoho()">
  <div class="height_fix">
    @include('elements.user_header', array('store_main_menu'=>$store_main_menu))
    <div class="box_wht" ng-hide="accepted">
      <h2>{[I18n.store.tokushoho.title]}</h2>
      <ul class="terms_link">
        <li class="current"><a href="#!/tokushoho/">{[I18n.store.tokushoho.buttonTokushoho]}</a></li>
        <li><a href="#!/terms/">{[I18n.store.tokushoho.buttonTerms]}</a></li>
        <li><a href="#!/privacy_policy/">{[I18n.store.tokushoho.buttonPrivacyPolicy]}</a></li>
      </ul>
      <div class="store_tokushoho">
        <div>
          <h4>{[I18n.store.tokushoho.price]}</h4>
          <p>{[data.price]}</p>
        </div>
        <div>
          <h4>{[I18n.store.tokushoho.payment]}</h4>
          <p>{[data.period]}</p>
        </div>
        <div>
          <h4>{[I18n.store.tokushoho.returning]}</h4>
          <p>{[data.refund]}</p>
        </div>
        <div>
          <h4>{[I18n.store.tokushoho.merchandise]}</h4>
          <p>{[data.shipment]}</p>
        </div>
        <div>
          <h4>{[I18n.store.tokushoho.contact]}</h4>
          <p>{[data.contact]}</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer/ -->
<div id="store_item_footer">
    @include('elements.user_footer')
</div>
<!-- /Footer -->

<!-- Popup/ -->
@include('elements.user_cart')
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
