@include('elements.header')
<div>
	<div id="functions" class="ng-scope">
		<div class="area-heading">
			<h2 class="heading">ストアオーナー限定 ストア運営サポート</h2>
			<p class="text">
			オンラインストアを運営していくにあたり、ご利用可能なオプション運営サポートの一覧です。
			<br>
			STORES.jpのストアオーナー様であれば、どなたでもご利用頂くことが可能です。ぜひ、ご活用くださいませ。
			</p>
		</div>
		<ul id="support_list">
			<li>
				<a target="_blank" href="/support/photo">
				<p class="image">
				 {{HTML::image('img/main_page/photo.png', '', array('width' => '252', 'height' => '180'))}}
				</p>
				<p class="icon_free">
				{{HTML::image('img/main_page/free.png', '', array('width' => '56', 'height' => '56' ))}}
				</p>
				<h3>
				プロカメラマンによる
				<br>
				商品撮影サービス
				</h3>
				<p class="text">商品をお送り頂くだけで、プロカメラマンが無料で撮影を行います。アイテム登録をする際にご利用ください。</p>
				</a>
			</li>
			<li>
				<a target="_blank" href="/support/card">
				<p class="image">
				{{HTML::image('img/main_page/card.png')}}
				</p>
				<p class="icon_free">
				{{HTML::image('img/main_page/free.png', '', array('width' => '56', 'height' => '56' ))}}
				</p>
				<h3>
				ストアカード
				<br>
				提供サービス
				</h3>
				<p class="text">ストアカードを無料で作成いたします。ご自身のストアを宣伝する際に、ストアカードをご活用ください。</p>
				</a>
			</li>
			<li>
				<a target="_blank" href="/support/storage">
				<p class="image">
				{{HTML::image('img/main_page/storage.png')}}
				</p>
				<p class="icon_free">
				{{HTML::image('img/main_page/free.png', '', array('width' => '56', 'height' => '56' ))}}
				</p>
				<h3>
				商品の保管・発送
				<br>
				代行サービス
				</h3>
				<p class="text">商品の保管や発送業務など、ストアの運営で面倒な作業を、STORES.jpが代行いたします。</p>
				</a>
			</li>
			<li>
				<a target="_blank" href="/support/pickup">
				<p class="image">
				{{HTML::image('img/main_page/pickup.png')}}
				</p>
				<p class="icon_free">
				{{HTML::image('img/main_page/free.png', '', array('width' => '56', 'height' => '56' ))}}
				</p>
				<h3>
				商品の集荷
				<br>
				依頼サービス
				</h3>
				<p class="text">ご希望の時間帯・場所にヤマト運輸のドライバーが発送予定の荷物を引き取りに伺います。</p>
				</a>
			</li>
			<li>
				<a target="_blank" href="/support/box">
				<p class="image">
				{{HTML::image('img/main_page/box.png')}}
				</p>
				<p class="icon_free">
				{{HTML::image('img/main_page/free.png', '', array('width' => '56', 'height' => '56' ))}}
				</p>
				<h3>
				梱包キット
				<br>
				提供サービス
				</h3>
				<p class="text">商品の発送の際などに必要な、梱包キット（ダンボール、ガムテープ）を無料で提供いたします。</p>
				</a>
			</li>
			<li>
				<a target="_blank" href="http://topics.stores.jp/support/virtual">
				<p class="image">
				{{HTML::image('img/main_page/virtual.png')}}
				</p>
				<p class="icon_free">
				{{HTML::image('img/main_page/free.png', '', array('width' => '56', 'height' => '56' ))}}
				</p>
				<h3>
				バーチャルストア
				<br>
				構築サービス
				</h3>
				<p class="text">低価格で仮想ショッピング体験を提供できる、パノラマ・バーチャルストアを構築いたします。</p>
				</a>
			</li>
		</ul>
	</div>
	</div>
@include('elements.footer')