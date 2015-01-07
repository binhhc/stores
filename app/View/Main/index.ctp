<div class="main social_login">
	<div class="social_login">
		<h1>
			Vô cùng đơn giản, trong vòng 2 phút
			<br />Tôi có thể tạo cửa hàng của mình
		</h1>
		<div class="form">
			<h2><strong>Miễn phí</strong> tạo cửa hàng!</h2>
			<?php // echo $this->Form->create(null, array(
					//'url' => array(
						//'controller' => 'Main',
						//'action' => 'index'
					//),
					//'class' => false
				//)); ?>
			<div class="email">
				<?php echo $this->Form->input(
					'username',
					array(
						'type' => 'text',
						'label' => false,
						'div' => false,
						'error' => false,
						'id' => 'email_input',
						'autocomplete' => 'off',
						'placeholder' => 'Email'
					)
				); ?>
			</div>
			<div class="password">
				<?php echo $this->Form->input(
					'username',
					array(
						'type' => 'text',
						'label' => false,
						'div' => false,
						'error' => false,
						'id' => 'email_input',
						'autocomplete' => 'off',
						'placeholder' => 'Mật khẩu'
					)
				); ?>
			</div>
			<button class="btn_submit" ng-hide="status == 'pending'" type="submit">Đăng nhập</button>
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
						  <a href="https://anduamet.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/anduamet.jpg" alt="anduamet"></a>
						</li>
						<li class="cols">
						  <a href="https://ironwork_mk.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/ironwork_mk.jpg" alt="ironwork_mk"></a>
						</li>
						<li class="cols">
						  <a href="http://shippostore.com/#!/" target="_blank"><img src="/img/main_page/stores/shippostore.jpg" alt="ShippoSTORE"></a>
						</li>
						<li class="cols">
						  <a href="https://fleeceleeve.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/fleeceleeve.jpg" alt="フリースリーブ"></a>
						</li>
						<li class="cols">
						  <a href="https://chill-garden.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/chill-garden.jpg" alt="Chill Garden"></a>
						</li>
						<li class="cols">
						  <a href="https://3355.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/3355.jpg" alt="3355"></a>
						</li>
						<li class="cols">
						  <a href="https://nakedhorse.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/nakedhorse.jpg" alt="nakedhorse"></a>
						</li>
						<li class="cols">
						  <a href="https://tla.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/tla.jpg" alt="tla"></a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://classico.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/classico.jpg" alt="classico"></a>
						</li>
						<li class="cols">
						  <a href="https://patanica.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/patanica.jpg" alt="patanica"></a>
						</li>
						<li class="cols">
						  <a href="https://ader.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/ader.jpg" alt="ader"></a>
						</li>
						<li class="cols">
						  <a href="https://nohmask.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/nohmask.jpg" alt="nohmask"></a>
						</li>
						<li class="cols">
						  <a href="https://butter.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/butter.jpg" alt="butter"></a>
						</li>
						<li class="cols">
						  <a href="https://conix.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/conix.jpg" alt="conix"></a>
						</li>
						<li class="cols">
						  <a href="https://milkjapon.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/milkjapon.jpg" alt="milkjapon"></a>
						</li>
						<li class="cols">
						  <a href="http://papierlabo-store.com/#!/" target="_blank"><img src="/img/main_page/stores/papierlabo-store.jpg" alt="PAPIER LABO."></a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://nstore.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/nstore.jpg" alt="N STORE"></a>
						</li>
						<li class="cols">
						  <a href="https://molansoda.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/molansoda.jpg" alt="molansoda"></a>
						</li>
						<li class="cols">
						  <a href="https://1012.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/1012.jpg" alt="1012"></a>
						</li>
						<li class="cols">
						  <a href="https://shoesofprey.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/shoesofprey.jpg" alt="shoesofprey"></a>
						</li>
						<li class="cols">
						  <a href="https://leather_labo.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/leather_labo.jpg" alt="leather_labo"></a>
						</li>
						<li class="cols">
						  <a href="https://ciito.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/ciito.jpg" alt="ciito"></a>
						</li>
						<li class="cols">
						  <a href="https://kotoriten.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/kotoriten.jpg" alt="kotoriten"></a>
						</li>
						<li class="cols">
						  <a href="https://organics.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/organics.jpg" alt="organics"></a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://drawingandmanual.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/drawingandmanual.jpg" alt="drawingandmanual"></a>
						</li>
						<li class="cols">
						  <a href="https://feacoffee.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/feacoffee.jpg" alt="feacoffee"></a>
						</li>
						<li class="cols">
						  <a href="https://no8vani.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/no8vani.jpg" alt="no8vani"></a>
						</li>
						<li class="cols">
						  <a href="https://bowtie.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/bowtie.jpg" alt="bowtie"></a>
						</li>
						<li class="cols">
						  <a href="https://handmadetights.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/handmadetights.jpg" alt="handmadetights"></a>
						</li>
						<li class="cols">
						  <a href="https://neon.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/neon.jpg" alt="neon"></a>
						</li>
						<li class="cols">
						  <a href="https://actroom.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/actroom.jpg" alt="actroom"></a>
						</li>
						<li class="cols">
						  <a href="https://btfurniture.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/btfurniture.jpg" alt="btfurniture"></a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://maru-bizen.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/maru-bizen.jpg" alt="maru-bizen style"></a>
						</li>
						<li class="cols">
					  <a href="https://kanvas.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/kanvas.jpg" alt="kanvas"></a>
						</li>
						<li class="cols">
						  <a href="https://1740avenue.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/1740avenue.jpg" alt="1740 AVENUE"></a>
						</li>
						<li class="cols">
						  <a href="https://quaela.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/quaela.jpg" alt="qua e la"></a>
						</li>
						<li class="cols">
						  <a href="https://specialfresh.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/specialfresh.jpg" alt="SpecialFRESH"></a>
						</li>
						<li class="cols">
						  <a href="https://shiroikuro.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/shiroikuro.jpg" alt="Shiroi Kuro"></a>
						</li>
						<li class="cols">
						  <a href="https://yortz.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/yortz.jpg" alt="YORTZ"></a>
						</li>
						<li class="cols">
						  <a href="https://amani.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/amani.jpg" alt="amani"></a>
						</li>
					  </ul>
					</div>
					<div class="slide_cols pc">
					  <ul class="col4">
						<li class="cols">
						  <a href="https://dolcedeco.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/dolcedeco.jpg" alt="Dolce Deco"></a>
						</li>
						<li class="cols">
						  <a href="https://quaintdesign.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/quaintdesign.jpg" alt="Quaint Design"></a>
						</li>
						<li class="cols">
						  <a href="https://dls.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/dls.jpg" alt="dls"></a>
						</li>
						<li class="cols">
						  <a href="https://stereotennis.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/stereotennis.jpg" alt="STEREO TENNIS FANCY SHOP"></a>
						</li>
						<li class="cols">
						  <a href="https://arcobaleno.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/arcobaleno.jpg" alt="arcobaleno"></a>
						</li>
						<li class="cols">
						  <a href="https://sowxp.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/sowxp.jpg" alt="sowxp"></a>
						</li>
						<li class="cols">
						  <a href="https://doramik.stores.jp/#!/" target="_blank"><img src="/img/main_page/stores/doramik.jpg" alt="DORAMIK"></a>
						</li>
						<li class="cols more">
						  <a href="/category"><img src="/img/main_page/stores/top_more.png" alt="もっと見る"><p>Tiếp tục</p></a>
						</li>
					  </ul>
					</div>
			    </div>
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
