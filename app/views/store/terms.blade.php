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
        <h4>Chương 1 Quy định chung</h4>
        <div class="inner">
          <h5>Điều 1 [định nghĩa]</h5>
          <ol>
            <li>
              Điều khoản<br>
              Cửa hàng Điều khoản sử dụng
            </li>
            <li>
              dịch vụ này<br>
              Dịch vụ đặt hàng qua thư mà chúng tôi là cung cấp thông qua Internet
            </li>
            <li>
              người mua<br>
              Phù hợp với các thủ tục theo quy định của chúng tôi, về tất cả các nội dung của Hiệp định này và các chính sách bảo mật đã được chấp nhận và được chấp thuận, người thực hiện các ứng dụng của sản phẩm
            </li>
            <li>
              người sử dụng<br>
              Điều khoản và đã làm tất cả những hiểu và phê duyệt các nội dung của chính sách bảo mật, hình ảnh của chúng tôi được cung cấp bởi các mặt dịch vụ, văn bản, thiết kế, logo, hình ảnh, chương trình, ý tưởng, thông tin, vv (sau đây gọi là "Nội dung") Tìm kiếm, duyệt hoặc sử dụng chung của người
            </li>
          </ol>
          <h5>[Áp dụng Điều khoản] Điều 2</h5>
          <p>Sau khi chúng tôi được sử dụng bởi người sử dụng của các dịch vụ được cung cấp thông qua mạng Internet, bạn có thể xác định các điều khoản. Người sử dụng, bạn sẽ được coi là đã chấp nhận các nội dung của Hiệp định này tại thời điểm sử dụng bắt đầu của dịch vụ.</p>
          <h5>[Thay đổi các Điều khoản] Điều 3</h5>
          <p>Chúng ta, mà không cần thông báo trước cho người sử dụng hoặc người mua, tất cả hoặc một phần của thỏa thuận này để có thể thay đổi tùy ý, và bạn sẽ có thể xác định một quy ước để bổ sung điều khoản mới. Thay đổi hoặc bổ sung Hiệp định này, người ta cho rằng nó có hiệu lực kể từ thời điểm bạn được đăng trên các trang web để cung cấp dịch vụ này, các dịch vụ được cung cấp sau khi có hiệu lực là để thể do Điều khoản thay đổi và bổ sung sau.</p>
          <p>Chúng ta, đối với bất kỳ thiệt hại gây ra cho người sử dụng hoặc mua bởi sự thay đổi, bổ sung của Hiệp định này, cho dù thiệt hại trực tiếp hoặc thiệt hại gián tiếp, bất kể là có hay không có thể dự đoán, và không chịu bất cứ trách nhiệm .</p>
        </div>
        <h4>Chương 2 mua sản phẩm, vv</h4>
        <div class="inner">
          <h5>Điều 4 [mua hàng]</h5>
          <ul>
            <li>Người dùng sẽ có thể mua sản phẩm từ chúng tôi bằng cách sử dụng dịch vụ này.</li>
            <li>Người sử dụng, nếu bạn muốn mua hàng hoá, phù hợp với các thủ tục theo quy định của chúng tôi một cách riêng biệt, được áp dụng cho việc mua hàng.</li>
            <li>Cùng với các ứng dụng, nhấn nút để hiệu quả mà thứ tự trên xác nhận việc phân phối sử dụng nội dung destination-trật tự, vv mà bạn đã nhập và đăng ký, sau đó, e-mail cho các hiệu ứng đó để xác nhận đơn đặt hàng từ chúng tôi là đạt đến cho người sử dụng trong thời điểm nào, người ta cho rằng các hợp đồng mua bán liên quan đến hàng hóa được thiết lập giữa người sử dụng và chúng tôi.</li>
            <li>Bất kể các quy định của các khoản trên, nếu có sự gian lận hoặc hành vi sai trái liên quan đến sử dụng các dịch vụ, chúng tôi hủy bỏ hợp đồng mua bán, người ta cho rằng nó có thể phát hành khác có hành động thích hợp.</li>
            <li>Người tuổi vị thành niên, trừ khi có sự đồng ý của người đại diện pháp lý có thẩm quyền, không có thể được mua hàng bằng cách sử dụng dịch vụ này.</li>
          </ul>
          <h5>Điều 5 [thay đổi thông tin đăng ký]</h5>
          <p>Người mua, giả sử rằng bạn liên hệ với chúng tôi ngay lập tức nếu có một thay đổi tên mà bạn đã nhập, địa chỉ cho tất cả hoặc một phần của vấn đề báo cáo khác cho chúng tôi tại thời điểm mua. Đối với thiệt hại gây ra bởi việc đăng ký thay đổi đã không được thực hiện, chúng tôi không chịu bất kỳ trách nhiệm. Ngoài ra, ngay cả khi việc đăng ký thay đổi đã được thực hiện, các giao dịch được tiến hành ở đăng ký trước khi thay đổi đã được thực hiện được giả định được thực hiện dựa trên các thông tin đăng ký trước khi thay đổi.</p>
          <h5>Điều 6 [phương thức thanh toán]</h5>
          <ul>
            <li>Số tiền thanh toán của hàng hóa, và giá bán của hàng hoá đó được hiển thị trên các trang web, thuế tiêu thụ, chi phí vận chuyển, sẽ là tổng số tiền lệ phí.</li>
            <li>Đối với thanh toán của hàng hóa đã được mua bởi các dịch vụ, và sẽ được giới hạn để thanh toán theo phương thức thanh toán thanh toán bằng thẻ tín dụng tên riêng, chuyển khoản ngân hàng của người mua hoặc tiền mặt khi giao hàng khác với chúng ta thiết lập.</li>
            <li>Nếu bạn thanh toán bằng thẻ tín dụng, bạn phải tuân thủ bất kỳ điều kiện người mua phải ký hợp đồng riêng rẽ với các công ty thẻ tín dụng. Liên quan đến việc sử dụng thẻ tín dụng, nếu xung đột xảy ra giữa các công ty bất kỳ mua hàng và thẻ tín dụng như vậy, và sẽ được giải quyết có trách nhiệm giữa người mua và công ty thẻ tín dụng.</li>
          </ul>
          <h5>Điều 7 [sự trở lại của hàng]</h5>
          <p>Chúng ta, vì sự trở lại của hàng hóa từ người mua, và phải tương ứng phù hợp với "các vấn đề hợp đồng đặc biệt cho hàng hoá trả lại" trong vòng [ký hiệu về luật thương mại cụ thể], được đăng trên trang web.</p>
        </div>
        <h4>Chương 3 việc xử lý thông tin cá nhân</h4>
        <div class="inner">
          <h5>Điều 8 [xử lý các thông tin cá nhân]</h5>
          <p>Chúng tôi, chúng tôi xác định riêng<a href="#!/privacy_policy/">Chính sách bảo mật</a>Phù hợp với, tôi sẽ xử lý thông tin cá nhân.</p>
        </div>
        <h4>Chương 4 trách nhiệm về việc sử dụng</h4>
        <div class="inner">
          <h5>Điều 9 [Cấm]</h5>
          <p>Trong việc sử dụng dịch vụ này, cấm không được làm những hành động của các mục sau đây cho người sử dụng hoặc người mua.</p>
          <ol>
            <li>Người sử dụng khác, bên thứ ba hoặc chúng ta xử lý, hành vi cung cấp cho những bất lợi hoặc thiệt hại, hoặc hành động mà họ sợ</li>
            <li>Quyền sở hữu trí tuệ về quyền tác giả, vv của một bên thứ ba hoặc chúng tôi, phải công khai, quyền nhân thân, quyền riêng tư, hoạt động hoặc hoạt động mà họ sợ để xâm phạm quyền và các quyền khác</li>
            <li>Hành động hoặc hành vi với nỗi sợ hãi của họ vi phạm luật hành pháp luật và các quy định khác trái với trật tự công cộng và đạo đức</li>
            <li>Luật sử dụng hoặc mua về các nội dung đã được thông qua việc sử dụng dịch vụ bên ngoài của tư nhân sử dụng</li>
            <li>Thông qua một bên thứ ba nào khác hơn so với những người dùng khác hoặc những người dùng khác, và nhân rộng các nội dung có sẵn thông qua các dịch vụ, bán hàng, xuất bản, phân phối, hành động và hành động tương tự như các xuất bản</li>
            <li>Đạo luật nhằm ngăn ngừa các hoạt động của dịch vụ này và các dịch vụ khác mà chúng tôi cung cấp</li>
            <li>Các hành động của chúng tôi như để thiệt hại mùa thu chúng ta về tín dụng là để được hợp lý xác định là không phù hợp</li>
            <li>Khác, các hành động của chúng tôi cho là không phù hợp</li>
          </ol>
        </div>
        <h4>Chương 5 Disclaimer</h4>
        <div class="inner">
          <h5>Điều 10 [Disclaimer]</h5>
          <ul>
            <li>Đối với thiệt hại gây ra cho bên thứ ba do người dùng hoặc người mua là vi phạm thỏa thuận này, vv, chúng tôi không chịu trách nhiệm cho bất kỳ.</li>
            <li>Các nội dung của dịch vụ này và thông báo, chẳng hạn như người sử dụng hoặc người mua sẽ nhận được thông qua các dịch vụ, tính toàn vẹn của nó, độ chính xác, độ tin cậy, nó không làm cho bất kỳ hữu dụng bảo lãnh, vv ..</li>
            <li>Thậm chí nếu một cái gì đó giống như sai lạc đã có mặt tại các nội dung đã được công bố hoặc đăng trên dịch vụ này của hàng hóa, bất kỳ thiệt hại mà người dùng hay mua chịu trực tiếp hoặc gián tiếp bằng cách này, mất mát, và không đối với lợi nhuận, vv, chúng tôi không chịu trách nhiệm cho bất kỳ.</li>
            <li>Mỗi hàng hóa được bán thông qua các dịch vụ, chất lượng của nó, vật liệu, chức năng, hiệu suất, khả năng tương thích với các sản phẩm khác các khuyết tật khác, và làm hỏng những nguyên nhân xảy ra, mất mát, cho những khó khăn, vv, chúng tôi hoàn toàn chịu trách nhiệm nó không mất.</li>
            <li>Chúng ta, nếu người mua từ chối bỏ bê hoặc nhận hàng, nếu trong trường hợp vắng mặt dài hạn của một biên nhận hàng hóa bị vô hiệu hóa hoặc địa điểm không rõ, đối với các trường hợp nó không phải là có thể nhận được sản phẩm bởi sự tiện lợi của người mua khác, mua hàng người bằng để mang lại như một sản phẩm đến nơi giao hàng được chỉ định khi điều và mua hàng liên hệ các số liên lạc bạn muốn đăng ký và thực hiện nghĩa vụ giao hàng, và được miễn các nghĩa vụ.</li>
          </ul>
        </div>
        <h4>Chương 6 Các điều khoản khác</h4>
        <div class="inner">
          <h5>Điều 11 [bản quyền, quyền sở hữu trí tuệ]</h5>
          <p>Nội dung được cung cấp thông qua dịch vụ, bạn sẽ được độc quyền do một bên thứ ba có chúng tôi hoặc quyền hợp pháp. Vi phạm các quy định của phần này, nếu một vấn đề xảy ra giữa người sử dụng hoặc mua và bên thứ ba, và cùng với những người sử dụng hoặc người mua để giải quyết một vấn đề như vậy có nguy cơ và chi phí của bạn, bất kỳ đối với chúng tôi thiệt hại, nó được giả định rằng bạn không đưa ra một sự mất mát hay bất lợi, vv ..</p>
          <h5>Điều 12 [Luật quản]</h5>
          <p>Luật điều chỉnh liên quan đến Hiệp định này, bạn phải tất cả các luật và quy định của Nhật Bản được áp dụng.</p>
          <h5>Điều 13 [tư vấn và tòa án có thẩm quyền]</h5>
          <p>Nếu bạn nghi ngờ nó xung quanh việc giải thích của Hiệp định này đã xảy ra, chúng tôi giả định rằng bạn có thể xác định cách giải thích của nó trong một phạm vi hợp lý. Đối với tất cả các tranh chấp liên quan đến Hiệp định này, và trước nhất trí một tòa án có thẩm quyền đối với các vị trí của chúng tôi là trường hợp đầu tiên của tòa án thẩm quyền độc quyền.</p>
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
