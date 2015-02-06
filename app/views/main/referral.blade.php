@include('elements.header')
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
				<a name="fb_btn" ng-click="postToFeed(referral_url)" href="">
				{{HTML::image('img/main_page/icon_facebook_referral.png')}}
				Mời bạn Facebook
				</a>
			</li>
			<li>
				<a name="tw_btn" href="http://twitter.com/intent/tweet?ount=none&lang='ja'&url=http://goo.gl/qDDe4k&text=STORES.jpは最短2分で驚くほど簡単にオンラインストアが作ることが出来ます!!もちろん登録は無料です!! @stores_jp">
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
					<p class="btn_low_big" ng-show="pending" style="margin-left: 10px; display: none;">
					<button class="button_pending" type="button">Đang gửi</button>
					</p>
				</div>
			</form>
			<p id="url_copy">
				<input type="text" value="http://goo.gl/qDDe4k">
			</p>
			<div id="send_list">
				<h4>Bạn bè bạn đã mở một cửa hàng từ lời mời của bạn</h4>
				<div ng-show="referrals.length == 0" style="">まだお申込をいただいたお友達はいません。</div>
			</div>
			<ul class="note">
				<li>※招待後、ご登録されているメールアドレス宛にプレミアムサービスチケットを送付いたします。</li>
			</ul>
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