@include('elements.header')
<script src="//connect.facebook.net/vi_VN/all.js"></script>
{{HTML::script('/js/referral.js')}}
<div ng-view="">
	<div id="referral" class="wrapper ng-scope" ng-init="email()">
		<h2>
			{{HTML::image('img/main_page/main_referral.png')}}
		</h2>
		<h3>
		{{HTML::image('img/main_page/icon_mail_referral.png')}}
		Gửi lời mời tới bạn bè
		</h3>
		<ul id="btn_link">
			<li ng-show="false" style="display: none;">
				<a id="btn_gmail" href="#popup_gmail"></a>
			</li>
			<li>
				<a name="gmail_btn" href="/google_authorize">
				{{HTML::image('img/main_page/icon_google_referral.png')}}
				Mời bạn trên Gmail
				</a>
			</li>
			<li>
				<a name="fb_btn" class="share_facebook" href="" url_store = "<?php echo Config::get('constants.website_name');?>">
				{{HTML::image('img/main_page/icon_facebook_referral.png')}}
				Mời bạn Facebook
				</a>
			</li>
			<li>
				<a name="tw_btn" class="popup twitter" href="http://twitter.com/intent/tweet?ount=none&lang='vn'&url=<?php echo Config::get('constants.short_url');?>&text=Đăng ký để tạo cửa hàng trực tuyến miễn phí của mình trong vòng 2 phút!!!">
				{{HTML::image('img/main_page/icon_twitter_referral.png')}}
				Mời bạn Twitter
				</a>
			</li>
		</ul>
		<p class="separate_title">Hoặc bạn có thể gửi lời mời trực tiếp</p>
		<div class="wrapper">
			<form class="ng-pristine ng-valid">
				<dl id="address_form">
					<dt>Địa chỉ email</dt>
					<dd>
					<input class="email_send" type="email" ng-model="email">
					<p class="error" id="error_email" style="display: none;"></p>
					</dd>
					<dt>Tên của bạn</dt>
					<dd>
					<input class="name_send" type="text" ng-model="signature">
					<p class="error" id="error_name" style="display: none;"></p>
					</dd>
				</dl>
				<div id="btn_send">
					<p id="premium_badge">
					{{HTML::image('img/main_page/premium_referral.png')}}
					</p>
					<p class="btn_high_big" ng-hide="pending" style="margin-left: 10px;">
					<button class="send_email_invitation" type="button">Gửi thư mời bạn bè</button>
					</p>
					<p class="btn_low_big" style="margin-left: 10px; display: none;">
					<button class="button_pending" type="button">Đang gửi</button>
					</p>
				</div>
			</form>
			<p id="url_copy">
				<input type="text" value="<?php echo Config::get('constants.short_url');?>">
			</p>
			<div id="send_list">
				<h4>Bạn bè bạn đã mở một cửa hàng từ lời mời của bạn</h4>
				<div ng-show="referrals.length == 0" style=""></div>
			</div>
			<ul class="note">
				<li>※招待後、ご登録されているメールアドレス宛にプレミアムサービスチケットを送付いたします。</li>
			</ul>
			<p class="panel" style="display: none;">
				<span>Đã gửi lời mời thành công!</span>
			</p>
		</div>
		<div style="display: none;">
			<div id="popup_gmail">
				<h2>
				<img alt="" src="images/referral/icon_mail.png">
				Gmailの連絡先から選択
				</h2>
				<ul> </ul>
				<div class="btn_bottom">
					<p class="btn_high" style="" ng-hide="pending">
					<button ng-click="submitGmail(gmail_users)" type="submit">招待する</button>
					</p>
					<p class="btn_low" style="display: none;" ng-show="pending">
					<button type="">
					<span>送信中</span>
					</button>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@include('elements.footer')
<div id="fb-root"></div>
<input type="hidden" name="facebook_id" class="facebook_app_id" value="<?php echo Config::get('constants.facebook_app_id'); ?>"/>
<script>
var app_id = $('.facebook_app_id').val();
window.fbAsyncInit = function() {
    FB.init({
      appId      : app_id,
      xfbml      : true,
      version    : 'v2.2'
    });
  };
</script>