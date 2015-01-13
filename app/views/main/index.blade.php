{{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/main_page.css')}}
        {{HTML::script('js/jquery.min.js')}}
        {{HTML::script('js/main_page.js')}}
        @include('main.header')
<div class="main social_login">
	<div class="social_login">
		<h1>
			Vô cùng đơn giản, trong vòng 2 phút
			<br />Tôi có thể tạo cửa hàng của mình
		</h1>
		<div class="form">
			<h2><strong>Miễn phí</strong> tạo cửa hàng!</h2>
			<div class="email">
				<input type="text" placeholder="Email" />
			</div>
			<div class="password">
				<input type="text" placeholder="Password" />
			</div>
				<a href="/dashboard"><button class="btn_submit" ng-hide="status == 'pending'" type="submit">Tạo cửa hàng</button></a>
			<p class="text">
				<span>Hoặc</span>
			</p>
			<p class="btn_facebook">
				<a ng-click="click_facebook()" href="">Đăng nhập Facebook</a>
			</p>
			<div class="facebook_help">
				<div class="box">
					<p class="left">Để xác nhận, đăng nhập qua Facebook</p>
					<p class="right">
						<a data-toggle="tooltip" data-placement="top" data-html="true" data-template='<div class="abc">Hồ sơ của bạn, tôi sẽ sử dụng danh sách bạn bè, địa chỉ e-mail. Hãy yên tâm rằng nó không được đăng trên Timeline.</div>' title="Hồ sơ của bạn, tôi sẽ sử dụng danh sách bạn bè, địa chỉ e-mail. Hãy yên tâm rằng nó không được đăng trên Timeline." href="#">
							<img alt="help" src="/img/main_page/icon_help.png">
						</a>
					</p>
				</div>
			</div>
		</div>
		<p class="store_num">
			<img alt="Huy chương" src="/img/main_page/badge_num_l.png">
		</p>
	</div>
	<p class="pv pc">
		<a class="fancybox-media" href="https://vimeo.com/47070682">Xem</a>
	</p>
</div>
<div id="stores" class="contents">
	<div class="wrapper">
		<h3 class="heading">Miễn phí lưu trữ hàng online</h3>
		<div class="slide">
			<ul class="slide_navi">
				<li class="prev">PREV</li>
				<li class="next">NEXT</li>
			</ul>
			<div class="slide_mask">
				<div class="slide_wrap">
					<div class="slide_cols">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://anduamet.stores.jp/#!/" target="_blank"><img src="/img/main_page/anduamet.jpg" alt="anduamet"></a>
						</li>
						<li class="cols">
						  <a href="https://ironwork_mk.stores.jp/#!/" target="_blank"><img src="/img/main_page/ironwork_mk.jpg" alt="ironwork_mk"></a>
						</li>
						<li class="cols">
						  <a href="http://shippostore.com/#!/" target="_blank"><img src="/img/main_page/shippostore.jpg" alt="ShippoSTORE"></a>
						</li>
						<li class="cols">
						  <a href="https://fleeceleeve.stores.jp/#!/" target="_blank"><img src="/img/main_page/fleeceleeve.jpg" alt="フリースリーブ"></a>
						</li>
						<li class="cols">
						  <a href="https://chill-garden.stores.jp/#!/" target="_blank"><img src="/img/main_page/chill-garden.jpg" alt="Chill Garden"></a>
						</li>
						<li class="cols">
						  <a href="https://3355.stores.jp/#!/" target="_blank"><img src="/img/main_page/3355.jpg" alt="3355"></a>
						</li>
						<li class="cols">
						  <a href="https://nakedhorse.stores.jp/#!/" target="_blank"><img src="/img/main_page/nakedhorse.jpg" alt="nakedhorse"></a>
						</li>
						<li class="cols">
						  <a href="https://tla.stores.jp/#!/" target="_blank"><img src="/img/main_page/tla.jpg" alt="tla"></a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://classico.stores.jp/#!/" target="_blank"><img src="/img/main_page/classico.jpg" alt="classico"></a>
						</li>
						<li class="cols">
						  <a href="https://patanica.stores.jp/#!/" target="_blank"><img src="/img/main_page/patanica.jpg" alt="patanica"></a>
						</li>
						<li class="cols">
						  <a href="https://ader.stores.jp/#!/" target="_blank"><img src="/img/main_page/ader.jpg" alt="ader"></a>
						</li>
						<li class="cols">
						  <a href="https://nohmask.stores.jp/#!/" target="_blank"><img src="/img/main_page/nohmask.jpg" alt="nohmask"></a>
						</li>
						<li class="cols">
						  <a href="https://butter.stores.jp/#!/" target="_blank"><img src="/img/main_page/butter.jpg" alt="butter"></a>
						</li>
						<li class="cols">
						  <a href="https://conix.stores.jp/#!/" target="_blank"><img src="/img/main_page/conix.jpg" alt="conix"></a>
						</li>
						<li class="cols">
						  <a href="https://milkjapon.stores.jp/#!/" target="_blank"><img src="/img/main_page/milkjapon.jpg" alt="milkjapon"></a>
						</li>
						<li class="cols">
						  <a href="http://papierlabo-store.com/#!/" target="_blank"><img src="/img/main_page/papierlabo-store.jpg" alt="PAPIER LABO."></a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://nstore.stores.jp/#!/" target="_blank"><img src="/img/main_page/nstore.jpg" alt="N STORE"></a>
						</li>
						<li class="cols">
						  <a href="https://molansoda.stores.jp/#!/" target="_blank"><img src="/img/main_page/molansoda.jpg" alt="molansoda"></a>
						</li>
						<li class="cols">
						  <a href="https://1012.stores.jp/#!/" target="_blank"><img src="/img/main_page/1012.jpg" alt="1012"></a>
						</li>
						<li class="cols">
						  <a href="https://shoesofprey.stores.jp/#!/" target="_blank"><img src="/img/main_page/shoesofprey.jpg" alt="shoesofprey"></a>
						</li>
						<li class="cols">
						  <a href="https://leather_labo.stores.jp/#!/" target="_blank"><img src="/img/main_page/leather_labo.jpg" alt="leather_labo"></a>
						</li>
						<li class="cols">
						  <a href="https://ciito.stores.jp/#!/" target="_blank"><img src="/img/main_page/ciito.jpg" alt="ciito"></a>
						</li>
						<li class="cols">
						  <a href="https://kotoriten.stores.jp/#!/" target="_blank"><img src="/img/main_page/kotoriten.jpg" alt="kotoriten"></a>
						</li>
						<li class="cols">
						  <a href="https://organics.stores.jp/#!/" target="_blank"><img src="/img/main_page/organics.jpg" alt="organics"></a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://drawingandmanual.stores.jp/#!/" target="_blank"><img src="/img/main_page/drawingandmanual.jpg" alt="drawingandmanual"></a>
						</li>
						<li class="cols">
						  <a href="https://feacoffee.stores.jp/#!/" target="_blank"><img src="/img/main_page/feacoffee.jpg" alt="feacoffee"></a>
						</li>
						<li class="cols">
						  <a href="https://no8vani.stores.jp/#!/" target="_blank"><img src="/img/main_page/no8vani.jpg" alt="no8vani"></a>
						</li>
						<li class="cols">
						  <a href="https://bowtie.stores.jp/#!/" target="_blank"><img src="/img/main_page/bowtie.jpg" alt="bowtie"></a>
						</li>
						<li class="cols">
						  <a href="https://handmadetights.stores.jp/#!/" target="_blank"><img src="/img/main_page/handmadetights.jpg" alt="handmadetights"></a>
						</li>
						<li class="cols">
						  <a href="https://neon.stores.jp/#!/" target="_blank"><img src="/img/main_page/neon.jpg" alt="neon"></a>
						</li>
						<li class="cols">
						  <a href="https://actroom.stores.jp/#!/" target="_blank"><img src="/img/main_page/actroom.jpg" alt="actroom"></a>
						</li>
						<li class="cols">
						  <a href="https://btfurniture.stores.jp/#!/" target="_blank"><img src="/img/main_page/btfurniture.jpg" alt="btfurniture"></a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://maru-bizen.stores.jp/#!/" target="_blank"><img src="/img/main_page/maru-bizen.jpg" alt="maru-bizen style"></a>
						</li>
						<li class="cols">
					  <a href="https://kanvas.stores.jp/#!/" target="_blank"><img src="/img/main_page/kanvas.jpg" alt="kanvas"></a>
						</li>
						<li class="cols">
						  <a href="https://1740avenue.stores.jp/#!/" target="_blank"><img src="/img/main_page/1740avenue.jpg" alt="1740 AVENUE"></a>
						</li>
						<li class="cols">
						  <a href="https://quaela.stores.jp/#!/" target="_blank"><img src="/img/main_page/quaela.jpg" alt="qua e la"></a>
						</li>
						<li class="cols">
						  <a href="https://specialfresh.stores.jp/#!/" target="_blank"><img src="/img/main_page/specialfresh.jpg" alt="SpecialFRESH"></a>
						</li>
						<li class="cols">
						  <a href="https://shiroikuro.stores.jp/#!/" target="_blank"><img src="/img/main_page/shiroikuro.jpg" alt="Shiroi Kuro"></a>
						</li>
						<li class="cols">
						  <a href="https://yortz.stores.jp/#!/" target="_blank"><img src="/img/main_page/yortz.jpg" alt="YORTZ"></a>
						</li>
						<li class="cols">
						  <a href="https://amani.stores.jp/#!/" target="_blank"><img src="/img/main_page/amani.jpg" alt="amani"></a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://dolcedeco.stores.jp/#!/" target="_blank"><img src="/img/main_page/dolcedeco.jpg" alt="Dolce Deco"></a>
						</li>
						<li class="cols">
						  <a href="https://quaintdesign.stores.jp/#!/" target="_blank"><img src="/img/main_page/quaintdesign.jpg" alt="Quaint Design"></a>
						</li>
						<li class="cols">
						  <a href="https://dls.stores.jp/#!/" target="_blank"><img src="/img/main_page/dls.jpg" alt="dls"></a>
						</li>
						<li class="cols">
						  <a href="https://stereotennis.stores.jp/#!/" target="_blank"><img src="/img/main_page/stereotennis.jpg" alt="STEREO TENNIS FANCY SHOP"></a>
						</li>
						<li class="cols">
						  <a href="https://arcobaleno.stores.jp/#!/" target="_blank"><img src="/img/main_page/arcobaleno.jpg" alt="arcobaleno"></a>
						</li>
						<li class="cols">
						  <a href="https://sowxp.stores.jp/#!/" target="_blank"><img src="/img/main_page/sowxp.jpg" alt="sowxp"></a>
						</li>
						<li class="cols">
						  <a href="https://doramik.stores.jp/#!/" target="_blank"><img src="/img/main_page/doramik.jpg" alt="DORAMIK"></a>
						</li>
						<li class="cols more">
						  <a href="/category"><img src="/img/main_page/top_more.png" alt="もっと見る"><p>Tiếp tục</p></a>
						</li>
					  </ul>
					</div>
			    </div>
			    <p class="sp_category_more">
					<a href="/category">Phân loại</a>
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
	<img alt="掲載メディア" src="/img/main_page/media_marks.png">
</p>
<p id="footer_copy">
	<strong>Dễ dàng mở một cửa hàng trực tuyến với stores</strong>
</p>
@include('main.footer')