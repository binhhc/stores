@include('main.header')
<?php if(Session::has('forgetPassword') && (Session::get('forgetPassword') == 1)) {?>
	<div id="alert_panel" class="fail" style="display: block; opacity: 1.0; top: -10px;">
		<p>Mã đổi mật khẩu tài khoản của bạn đã hết hạn. Hãy đăng ký để hệ thống gửi lại email đổi mật khẩu khác.</p>
	</div>
<?php Session::forget('forgetPassword');}?>
<div class="main social_login">
    <div id="panel_error" ng-show="invalid()" style="display:none">
        <p class="email_pass_error"  style="display:none">Vui lòng nhập địa chỉ email, password của bạn</p>
        <p class="pass_error"  style="display:none">Vui lòng nhập một mật khẩu ít nhất 6 ký tự</p>
        <p class="valid_email"  style="display:none">Xin vui lòng nhập một địa chỉ email hợp lệ</p>
        <p class="unique_email"  style="display:none">Email của bạn đã được đăng ký</p>
        <p class="close" ng-click="clicked_submit = false">
            {{HTML::image('img/main_page/icon_close.png', 'Đóng')}}
        </p>
    </div>
    <div id="panel_label_introduce">
        <div><h2><strong>DỄ DÀNG MỞ MỘT CỬA HÀNG TRỰC TUYẾN VỚI</strong></h2></div>
        <div><p>Hayamise</p></div>
    </div>
    <div class="social_login">
        <h1>
            CHỈ 1 BƯỚC ĐƠN GIẢN
            <br /><strong>Bạn có thể tạo cửa hàng của riêng mình</strong>
        </h1>
        <hr>
        <h2><strong>MIỄN PHÍ</strong> tạo cửa hàng!</h2>
        <div id="home_sign">
        {{Form::open(array('url' => 'register', 'method' => 'post', 'name' => 'myForm'))}}
            <div class="home_email">
                {{Form::text('email', '', array('placeholder' => 'Email', 'name' => 'email'))}}
            </div>
            <div class="home_password">
                <input type="password" name="password" placeholder="Mật khẩu" />
            </div>
            <div class="home_submit">
                <button class="btn_submit" type="button">TẠO CỬA HÀNG</button>
                <p class="btn_wait" style="display: none">Đang tạo...</p>
            </div>    
            <div class="home_or">
                <span>hoặc</span>
            </div>
            <div class="home_btn_facebook">
                <a href="{{url('register/fb')}}"><div class="home_btn_facebook_inner">ĐĂNG NHẬP FACEBOOK</div></a>
            </div>
        {{ Form::close() }}
        </div>
        <?php /*?>
        <p class="store_num">
            {{HTML::image('img/main_page/badge_num_l.png', 'Huy chương')}}
        </p>
        <?php */?>
    </div>
    <?php /*?>
    <p class="pv pc">
        <a class="fancybox-media" href="https://vimeo.com/47070682">Xem</a>
    </p>
    <?php */?>
</div>
<div id="stores" class="contents">
    <div class="wrapper">
        <div class="wapper_heading">
            <p class="wapper_heading_label">
                MIỄN PHÍ
            </p>
            <p class="wapper_heading_label_under">
                <span>// </span>
                Lưu trữ hàng hóa trực tuyến
                <span> //</span>
            </p>
        </div>
        <div class="slide">
            <ul class="slide_navi">
                <li class="prev">Trước</li>
                <li class="next">Sau<li>
            </ul>
            <div class="slide_mask">
                <div class="slide_wrap">
                <?php $i = 0;?>
                <?php foreach($item_slides as $item) {?>
                <?php $i ++ ;?>
                    <div class="slide_cols">
                      <ul class="col4">
                      <?php foreach ($item as $key => $value) {?>
                        <li class="cols">
                          <a href="{{$value['href']}}" target="_blank">{{HTML::image($value['url'], $value['name'])}}</a>
                        </li>
                        <?php }?>
                        <?php if($i== count($item_slides)) {?>
                            <li class="cols more">
                              <a href="/category">{{HTML::image('img/main_page/top_more.png', 'もっと見る')}}<p>Tiếp tục</p></a>
                            </li>
                        <?php }?>
                      </ul>
                    </div>
                    <?php }?>
                </div>
                <p class="sp_category_more">
                    <a href="">Phân loại</a>
                </p>
            </div>
        </div>
    </div>
    
    <div class="contact">
        <div class="heading_contact">
            <div class="text_support">
                VUI LÒNG HỖ TRỢ 24/24    
            </div>
            <div class="img_close">
                <a href="#">{{HTML::image('img/main_page/ic_close.png')}}</a></div>    
            </div>

            <ul>
                <li class="mail">
                    <a href="/contact">
                        <p>LIÊN HỆ QUA EMAIL</p>
                    </a>
                </li>
            </ul>
        </div>
        
</div>
<?php /*?>
<p class="medias pc">
    {{HTML::image('img/main_page/media_marks.png', 'Media marks')}}
</p>
<?php */?>
<?php /*?>
<p id="footer_copy">
    <strong>Dễ dàng mở một cửa hàng trực tuyến với stores</strong>
</p>
<?php */?>
@include('main.footer')
<script>
$(document).ready(function(){
	setTimeout(function() {
	       $('#alert_panel').fadeOut();
	   }, 5000);
});
</script>
