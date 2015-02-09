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
			<!--  <a href="https://accounts.google.com/o/oauth2/auth?client_id={{$clientid}}&redirect_uri= {{$redirecturi}}&scope=https://www.google.com/m8/feeds/&response_type=code">-->
				 <a name="gmail_btn" href="/auth_gmail">
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
				<div ng-show="referrals.length == 0" style="">まだお申込をいただいたお友達はいません。</div>
			</div>
			<ul class="note">
				<li>※招待後、ご登録されているメールアドレス宛にプレミアムサービスチケットを送付いたします。</li>
			</ul>
			<p class="panel" style="display: none;">
				<span>Đã gửi lời mời thành công!</span>
			</p>
		</div>
	<?php if(isset($gmail_account)) {?>
		<div id="dummy_modal" class="ng-scope">
		<div id="modal-win" style="top: 190px; display: block">
		<div id="modal-bg" style="opacity: 1;"></div>
		<div id="modal-win-inner">
				<div id="popup_gmail">
					<h2>
					{{HTML::image('img/main_page/icon_mail.png')}}
					Danh sách bạn trong Gmail
					</h2>
					<ul>
					<?php if(empty($gmail_account)) {?>
					<li class="ng-scope" ng-repeat="user in gmail_users">
						<label class="ng-binding">Không tìm thấy danh sách bạn trong Gmail!</label>
					</li>
					<?php } else { foreach ($gmail_account as $item) {?>
						<li class="ng-scope" ng-repeat="user in gmail_users">
							<span ng-show="user.status == 'nosend'">
								<p class="checkbox">
								<input class="ng-valid ng-dirty" type="checkbox"  value="{{$item[1]}}">
								</p>
								<p class="name">
								<label class="ng-binding">{{$item[0]}}</label>
								</p>
								<p class="address ng-binding">{{$item[1]}}</p>
							</span>
						</li>
						<?php }}?>
					</ul>
					<div class="btn_bottom">
						<p class="btn_high" style="" ng-hide="pending">
						<button class="send_email_list" type="submit">Mời</button>
						</p>
						<p class="btn_low" style="display: none; text-align: center" >
						<button type="">
						<span>Đang mời</span>
						</button>
						</p>
					</div>
				<p class="btn_modal_close">
					<a class="modal-close" href="#">
						{{HTML::image('img/main_page/btn_modal_close.png', 'Information') }}
					</a>
				</p>
			</div>
		</div>
	</div>
	</div>
	<?php }?>
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
<style>
	.radio, .checkbox {
    margin-top: 0px!important;
}
#modal-win-inner {
	width: 610px !important;
}
</style>