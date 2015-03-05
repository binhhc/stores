<?php  $user = Session::get('user');?>
<?php if(!empty($user)) {?>
@include('text.header_simple')
<?php } else {?>
@include('text.header')
<?php }?>
<div id="content" ng-app>
  <div class="wrapper" ng-controller="ContactController">
    <h2 class="heading">{{$title_for_layout}}</h2>
    <div id="contact_page">
      <div class="contact_box faq">
        <div class="text faq">
          <h3>Hỏi đáp</h3>
          <p>
          Nếu bạn có bất kỳ câu hỏi về stores, bạn có thể <br> nhờ người giải quyết trong <br> trang "Các câu hỏi thường gặp".  <br> Bạn sẽ được trả lời <br/>nếu có người đọc và tư vấn.
          </p>
          <p class="contact_btn faq"><a href="/faq">Thắc mắc tại đây</a></p>
        </div>
        <p class="icon faq">
        	{{HTML::image('img/main_page/icon_faq.png')}}
        </p>
      </div>
      <div class="contact_box store" style="text-align:center;">
        <div class="text">
          <h3>Câu hỏi cho cửa hàng</h3>
          <p>
            Trả lời sớm nhất!
          </p>
          <p class="icon store">
          	{{HTML::image('img/main_page/icon_storekun.png')}}
          <p class="contact_btn store">
            <a id="viii">Câu hỏi</a>
          </p>
        </div>
      </div>
      <!--
      <div class="contact_box">
        <div class="text">
          <h3>お電話でのお問い合わせ</h3>
          <p>専任のスタッフが、お電話でサポートさせて頂きます。</p>
          <p class="tel">03-6455-1391</p>
          <p>受付時間 平日10:00〜18:00</p>
        </div>
        <p class="icon"><img src="/images/icon/icon_call.png" alt="お電話での問い合わせ"></p>
      </div>
      !-->
      <div id="mailform">
        <div class="contact_box">
          <div class="text space mail">
            <h3>Liên hệ với chúng tôi bằng email</h3>
            <p>
Liên quan tới liên lạc bằng email<br>
             Có những trường hợp phải xem xét lại nên sẽ trả lời trong 2-3 ngày sau đó.<br>
           Mong bạn thông cảm
            </p>
          </div>
          <p class="icon">
          {{HTML::image('img/main_page/icon_mail_contact.png')}}
          </p>
          <form name="form" ng-submit="submit()" novalidate>
            <div class="form_basic" ng-hide="accepted">
              <dl class="sec no_border">
                <dt>Tên bạn</dt>
                <dd>
                  <ul>
                    <li><label>Họ</label><input class="it sz_m" type="text" name="last_name" ng-model="customer.last_name" required></li>
                    <li><label>Tên</label><input class="it sz_m" type="text" name="first_name" ng-model="customer.first_name" required></li>
                  </ul>
                  <p class="error" ng-show="(form.last_name.$invalid &amp;&amp; (form.last_name.$dirty || clicked_submit)) || (form.first_name.$invalid &amp;&amp; (form.first_name.$dirty || clicked_submit))">Vui lòng nhập tên của bạn</p>
                </dd>
              </dl>
              <dl class="sec">
                <dt>Địa chỉ email</dt>
                <dd>
                  <input class="it sz_l" type="email" name="email" ng-model="customer.email" required>
                  <p class="error" ng-show="(form.email.$invalid &amp;&amp; (form.email.$dirty || clicked_submit))">Vui lòng điền một địa chỉ email hợp lệ.</p>
                </dd>
              </dl>
              <dl class="sec">
                <dt>Số điện thoại</dt>
                <dd>
                  <div class="styled_select_thick">
                    <input class="it sz_m" type="tel" name="tel" ng-model="customer.tel">
                  </div>
                </dd>
              </dl>
              <dl class="sec">
                <dt>Loại tin nhắn</dt>
                <dd>
                  <div class="styled_select_thick">
                    <select class="styled" ng-model="customer.kind" name="kind"
                    ng-options="kind.key for kind in kinds" required></select>
                    <span ng-hide="form.kind.$dirty">Vui lòng chọn</span>
                  </div>
                  <p class="error" ng-show="(form.kind.$invalid &amp;&amp; (form.kind.$dirty || clicked_submit))">Vui lòng chọn loại yêu cầu</p>
                </dd>
              </dl>
              <dl class="sec">
                <dt>Nội dung yêu cầu</dt>
                <dd>
                  <textarea name="body" cols="30" rows="10" ng-model="customer.message" required></textarea>
                  <p class="error" ng-show="(form.body.$invalid &amp;&amp; (form.body.$dirty || clicked_submit))">Vui lòng điền yêu cầu của bạn</p>
                </dd>
              </dl>
              <p class="btn_high_big" ng-hide="pending"><button type='submit'>Gửi</button></p>
            </div>
          </form>
          <div class="finish form_basic" ng-show="accepted">
            <h3>Cảm ơn bạn đã gửi mail!</h3>
            <p>
           Có những trường hợp phải xem xét nên bạn sẽ nhận được email sau 2-3 ngày.<br>
            Mong bạn thông cảm.
            </p>
            <p>
              Hỗ trợ khách hàng<br>
           Thứ Hai đến thứ Sáu (trừ ngày lễ) 10:00-18:00<br>
              <?php echo  Config::get('constants.contact_email');?>
            </p>
          </div>
        </div>
      </div>
      <ul class="breadcrumb_list">
			<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
				<a itemprop="url" href="/">
				<span itemprop="title">Trang chủ</span>
				</a>
				 >
			</li>
			<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
				<a itemprop="url" href="/contact">
				<strong itemprop="title">Liên hệ</strong>
				</a>
			</li>
		</ul>
    </div>
  </div>
</div>
@include('text.footer')
