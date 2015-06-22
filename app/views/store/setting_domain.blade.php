@include('elements.header')
<div class="wrapper domain">
	<div class="heading_box clearfix">
		<h2 class="heading">Hayamise.comの独自ドメインについて</h2>
		<p class="txt">
		Hayamise.comの独自ドメインにお申し込み頂くと
		<br>
		ご自身のストアを独自ドメインに変更することができます。
		<br>
		<br>
		独自ドメインとは、オリジナルの「インターネット上の住所」を指し
		<br>
		独自ドメインを利用することにより、短く・覚えやすいアドレスにすることが出来ます。
		<br>
		プレミアムサービス利用のストアオーナー様であれば、どなたでもご利用可能です。
		</p>
	</div>
	<p class="main_image">
		{{HTML::image('img/main_page/main.png', 'fea_1',array( 'width' => 746, 'height' => 420 )) }}
	</p>
	<ul class="feature clearfix">
		<li>
			{{HTML::image('img/main_page/fea_1.png', 'fea_1',array( 'width' => 350, 'height' => 160) ) }}
			<h3>初期費用・維持費用0円</h3>
			通常、取得・利用費用として950円／年が発生しますが、Hayamise.comのプレミアムサービス利用のストアオーナー様は無料でご利用可能です。ご設定頂いた独自ドメインは変更することが出来ません。予めご了承ください。
		</li>
		<li>
			{{HTML::image('img/main_page/fea_2.png', 'fea_1', array( 'width' => 350, 'height' => 160) ) }}

			<h3>「.com」と「.net」から選択</h3>
			独自ドメインは「.com」と「.net」のどちらかよりお選び頂けます。既に存在するドメインをご登録することはできません。まずは検索して、利用が可能かどうかをお確かめください。
		</li>
	</ul>
	<div class="agree" ng-show="step == 1" style="">
		<p id="popup_premium_button" class="btn_high_big" ng-show="plan == 'free'" style="">
		<a href="#!/premium">Sử dụng tên miền  của tôi</a>
		</p>
	</div>
</div>
@include('elements.footer')