
<div class="wrapper" id="store_cart">
  <div class="height_fix">
    @include('elements.user_header_others', array('store_main_menu'=>$store_main_menu))
    <div class="box_wht" ng-hide="accepted">
      <h2>{[I18n.store.privacyPolicy.title]}</h2>
      <ul class="terms_link">
        <li><a href="#!/tokushoho/">{[I18n.store.privacyPolicy.buttonTokushoho]}</a></li>
        <li><a href="#!/terms/">{[I18n.store.privacyPolicy.buttonTerms]}</a></li>
        <li class="current"><a href="#!/privacy_policy/">{[I18n.store.privacyPolicy.buttonPrivacyPolicy]}</a></li>
      </ul>
      <div class="store_terms">
        <p class="lead">Khách hàng, nếu bạn muốn mua một trường hợp hay sản phẩm để sử dụng trang web của chúng tôi, sau "của thông tin khách hàng xử lý quy định (Chính sách bảo mật)" đầu nhìn chăm chú, bạn sẽ cần phải đồng ý với các nội dung. Cần lưu ý rằng, nếu bạn không đồng ý, bạn không thể mua sản phẩm.</p>
        <h4>1.Để biết thông tin của bạn</h4>
        <p class="inner">Các thông tin khách hàng là thông tin về một cá nhân để tồn tại, bao gồm tên trong thông tin, nói ngày tháng năm sinh, địa chỉ, số điện thoại, các báo cáo khác như những người có thể được sử dụng để xác định một cá nhân cụ thể. Nó Điều này có thể được đối chiếu với các thông tin khác, do đó bao gồm cả những người mà sẽ có thể xác định một cá nhân cụ thể.</p>
        <h4>2.Đối với mục đích của thông tin khách hàng</h4>
        <p class="inner">Us, (1) để thực hiện các nghĩa vụ của chúng tôi trong các giao dịch bán hàng, (2) để thực hiện các dịch vụ sau bán hàng trong các giao dịch, (3) khách hàng để hướng dẫn các dịch vụ đặc biệt và các sản phẩm mới, vv, hoặc, (4), và dự định gửi thông báo như tạp chí e-mail, chúng tôi sẽ sử dụng thông tin của bạn. Việc bổ sung cho những mục đích này, và trừ khi bạn đã nhận được sự đồng ý cho khách hàng trong các trường hợp hoặc pre mô tả dưới 3, sẽ không được sử dụng.</p>
        <h4>3.Đối với lô hàng cho bên thứ ba thông tin của bạn</h4>
        <p class="inner">Chúng tôi, đến mức cần thiết để đạt được các mục đích sử dụng, bạn có thể muốn thuê ngoài toàn bộ hoặc một phần thông tin của khách hàng.</p>
        <h4>4.Đối với việc cung cấp cho khách hàng bên thứ ba thông tin</h4>
        <p class="inner">Chúng ta, không cung cấp trước None các thông tin khách hàng mà có được sự đồng ý của bạn cho bên thứ ba.</p>
        <h4>5.Sử dụng chung các thông tin khách hàng</h4>
        <p class="inner">Chúng ta, giữa các công ty như được mô tả dưới đây, sẽ được đồng sử dụng các thông tin khách hàng.</p>
        <div class="inner">
          <table>
            <tr>
              <th>Mục thông tin của khách hàng được sử dụng kết hợp</th>
              <td>Tên, địa chỉ, số điện thoại, địa chỉ e-mail, chẳng hạn như thông tin sản phẩm bạn đã mua</td>
            </tr>
            <tr>
              <th>Phạm vi của người được sử dụng kết hợp</th>
              <td>Bracket, Inc (công ty điều hành STORES.vn)</td>
            </tr>
            <tr>
              <th>Mục đích của việc sử dụng cho những người</th>
              <td>
                <ul>
                  <li>Trong giao dịch mua bán giữa chúng tôi và khách hàng của chúng tôi, chẳng hạn như việc giao hàng, để thực hiện các nhiệm vụ của chúng tôi đã được giao phó</li>
                  <li>Để hướng dẫn bạn thông qua các dịch vụ đặc biệt và các sản phẩm mới, vv để khách hàng của chúng tôi</li>
                  <li>Đối với việc thực hiện các dịch vụ sau bán hàng cho khách hàng</li>
                  <li>Đối với việc truyền tải các thông báo của tạp chí e-mail như vậy</li>
                  <li>Đối với các hoạt động của STORES.vn khác</li>
                </ul>
              </td>
            </tr>
            <tr>
              <th>Đối với việc quản lý thông tin khách hàng<br>Người có trách nhiệm</th>
              <td>chủ cửa hàng</td>
            </tr>
          </table>
        </div>
        <h4>6.Giới thiệu Liên hệ khách hàng Thông tin</h4>
        <p class="inner">Hãy liên hệ với "tên và thông tin liên lạc kinh doanh của" trong ký hiệu về luật thương mại cụ thể của trang web này. Hoặc, theo yêu cầu của các [mẫu yêu cầu] trong các trang lưu trữ, sẽ cung cấp thông tin chậm trễ mà không liên lạc bằng e-mail.</p>
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
