@include('main.header')
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
	<div class="social_login">
		<h1>
			Vô cùng đơn giản, trong vòng 2 phút
			<br />Tôi có thể tạo cửa hàng của mình
		</h1>
		<div class="form">
		{{Form::open(array('url' => 'register', 'method' => 'post', 'name' => 'myForm'))}}
			<h2><strong>Miễn phí</strong> tạo cửa hàng!</h2>
			<div class="email">
				{{Form::text('email', '', array('placeholder' => 'Email', 'name' => 'email'))}}
			</div>
			<div class="password">
				<input type="password" name="password" placeholder="Mật khẩu" />
			</div>
				<button class="btn_submit" type="button">Tạo cửa hàng</button>
				<p class="btn_wait" style="display: none">Đang tạo...</p>
			<p class="text">
				<span>Hoặc</span>
			</p>
			<p class="btn_facebook">
				<a href="{{url('login/fb')}}">Đăng nhập Facebook</a>
			</p>
			<div class="facebook_help">
				<div class="box">
					<p class="left">Để xác nhận, đăng nhập qua Facebook</p>
					<p class="right">
						<a data-toggle="tooltip" data-placement="top" data-html="true" data-template='<div class="abc">Hồ sơ của bạn, tôi sẽ sử dụng danh sách bạn bè, địa chỉ e-mail. Hãy yên tâm rằng nó không được đăng trên Timeline.</div>' title="Hồ sơ của bạn, tôi sẽ sử dụng danh sách bạn bè, địa chỉ e-mail. Hãy yên tâm rằng nó không được đăng trên Timeline." href="#">
							{{HTML::image('img/main_page/icon_help.png', 'Help')}}
						</a>
					</p>
				</div>
			</div>
			{{ Form::close() }}
		</div>
		<p class="store_num">
			{{HTML::image('img/main_page/badge_num_l.png', 'Huy chương')}}
		</p>
	</div>
	<p class="pv pc">
		<a class="fancybox-media" href="https://vimeo.com/47070682">Xem</a>
	</p>
</div>
<div id="stores" class="contents">
	<div class="wrapper">
		<h3 class="heading">Miễn phí lưu trữ hàng hoá trực tuyến</h3>
		<div class="slide">
			<ul class="slide_navi">
				<li class="prev">Trước</li>
				<li class="next">Sau<li>
			</ul>
			<div class="slide_mask">
				<div class="slide_wrap">
					<div class="slide_cols">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://anduamet.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/anduamet.jpg', 'anduamet')}}</a>
						</li>
						<li class="cols">
						  <a href="https://ironwork_mk.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/ironwork_mk.jpg', 'ironwork_mk')}}</a>
						</li>
						<li class="cols">
						  <a href="http://shippostore.com/#!/" target="_blank">{{HTML::image('img/main_page/shippostore.jpg', 'ShippoSTORE')}}</a>
						</li>
						<li class="cols">
						  <a href="https://fleeceleeve.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/fleeceleeve.jpg', 'フリースリーブ')}}</a>
						</li>
						<li class="cols">
						  <a href="https://chill-garden.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/chill-garden.jpg', 'Chill Garden')}}</a>
						</li>
						<li class="cols">
						  <a href="https://3355.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/3355.jpg', '3355')}}</a>
						</li>
						<li class="cols">
						  <a href="https://nakedhorse.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/nakedhorse.jpg', 'nakedhorse')}}</a>
						</li>
						<li class="cols">
						  <a href="https://tla.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/tla.jpg', 'tla')}}</a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://classico.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/classico.jpg', 'classico')}}</a>
						</li>
						<li class="cols">
						  <a href="https://patanica.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/patanica.jpg', 'patanica')}}</a>
						</li>
						<li class="cols">
						  <a href="https://ader.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/ader.jpg', 'ader')}}</a>
						</li>
						<li class="cols">
						  <a href="https://nohmask.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/nohmask.jpg', 'nohmask')}}</a>
						</li>
						<li class="cols">
						  <a href="https://butter.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/butter.jpg', 'butter')}}</a>
						</li>
						<li class="cols">
						  <a href="https://conix.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/conix.jpg', 'conix')}}</a>
						</li>
						<li class="cols">
						  <a href="https://milkjapon.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/milkjapon.jpg', 'milkjapon')}}</a>
						</li>
						<li class="cols">
						  <a href="http://papierlabo-store.com/#!/" target="_blank">{{HTML::image('img/main_page/papierlabo-store.jpg', 'PAPIER LABO.')}}</a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://nstore.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/nstore.jpg', 'N STORE')}}</a>
						</li>
						<li class="cols">
						  <a href="https://molansoda.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/molansoda.jpg', 'molansoda')}}</a>
						</li>
						<li class="cols">
						  <a href="https://1012.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/1012.jpg', '1012')}}</a>
						</li>
						<li class="cols">
						  <a href="https://shoesofprey.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/shoesofprey.jpg', 'shoesofprey')}}</a>
						</li>
						<li class="cols">
						  <a href="https://leather_labo.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/leather_labo.jpg', 'leather_labo')}}</a>
						</li>
						<li class="cols">
						  <a href="https://ciito.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/ciito.jpg', 'ciito')}}</a>
						</li>
						<li class="cols">
						  <a href="https://kotoriten.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/kotoriten.jpg', 'kotoriten')}}</a>
						</li>
						<li class="cols">
						  <a href="https://organics.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/organics.jpg', 'organics')}}</a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://drawingandmanual.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/drawingandmanual.jpg', 'drawingandmanual')}}</a>
						</li>
						<li class="cols">
						  <a href="https://feacoffee.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/feacoffee.jpg', 'feacoffee')}}</a>
						</li>
						<li class="cols">
						  <a href="https://no8vani.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/no8vani.jpg', 'no8vani')}}</a>
						</li>
						<li class="cols">
						  <a href="https://bowtie.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/bowtie.jpg', 'bowtie')}}</a>
						</li>
						<li class="cols">
						  <a href="https://handmadetights.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/handmadetights.jpg', 'handmadetights')}}</a>
						</li>
						<li class="cols">
						  <a href="https://neon.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/neon.jpg', 'neon')}}</a>
						</li>
						<li class="cols">
						  <a href="https://actroom.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/actroom.jpg', 'actroom')}}</a>
						</li>
						<li class="cols">
						  <a href="https://btfurniture.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/btfurniture.jpg', 'btfurniture')}}</a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://maru-bizen.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/maru-bizen.jpg', 'maru-bizen style')}}</a>
						</li>
						<li class="cols">
					  <a href="https://kanvas.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/kanvas.jpg', 'kanvas')}}</a>
						</li>
						<li class="cols">
						  <a href="https://1740avenue.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/1740avenue.jpg', '1740 AVENUE')}}</a>
						</li>
						<li class="cols">
						  <a href="https://quaela.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/quaela.jpg', 'qua e la')}}</a>
						</li>
						<li class="cols">
						  <a href="https://specialfresh.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/specialfresh.jpg', 'SpecialFRESH')}}</a>
						</li>
						<li class="cols">
						  <a href="https://shiroikuro.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/shiroikuro.jpg', 'Shiroi Kuro')}}</a>
						</li>
						<li class="cols">
						  <a href="https://yortz.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/yortz.jpg', 'YORTZ')}}</a>
						</li>
						<li class="cols">
						  <a href="https://amani.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/amani.jpg', 'amani')}}</a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://dolcedeco.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/dolcedeco.jpg', 'Dolce Deco')}}</a>
						</li>
						<li class="cols">
						  <a href="https://quaintdesign.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/quaintdesign.jpg', 'Quaint Design')}}</a>
						</li>
						<li class="cols">
						  <a href="https://dls.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/dls.jpg', 'dls')}}</a>
						</li>
						<li class="cols">
						  <a href="https://stereotennis.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/stereotennis.jpg', 'STEREO TENNIS FANCY SHOP')}}</a>
						</li>
						<li class="cols">
						  <a href="https://arcobaleno.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/arcobaleno.jpg', 'arcobaleno')}}</a>
						</li>
						<li class="cols">
						  <a href="https://sowxp.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/sowxp.jpg', 'sowxp')}}</a>
						</li>
						<li class="cols">
						  <a href="https://doramik.stores.jp/#!/" target="_blank">{{HTML::image('img/main_page/doramik.jpg', 'DORAMIK')}}</a>
						</li>
						<li class="cols more">
						  <a href="/category">{{HTML::image('img/main_page/top_more.png', 'もっと見る')}}<p>Tiếp tục</p></a>
						</li>
					  </ul>
					</div>
			    </div>
			    <p class="sp_category_more">
					<a href="">Phân loại</a>
				</p>
			</div>
		</div>
	</div>
	<div class="contact">
		<div class="heading_contact">Nhân viên toàn thời gian vui lòng hỗ trợ</div>
			<ul>
				<li class="mail">
					<a href="/contact">
						<p>Liên hệ qua email</p>
					</a>
				</li>
			</ul>
		</div>
</div>
<p class="medias pc">
	{{HTML::image('img/main_page/media_marks.png', 'Media marks')}}
</p>
<p id="footer_copy">
	<strong>Dễ dàng mở một cửa hàng trực tuyến với stores</strong>
</p>
@include('main.footer')