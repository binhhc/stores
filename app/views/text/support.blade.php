{{HTML::style('css/item_management.css')}}
@include('text.header')

<div>
	<div id="functions" class="ng-scope">
		<div class="area-heading">
        <h2 class="heading">Quản lý cấu hình cửa hàng</h2>
			<p class="text">
			Cấu hình một cửa hàng trực tuyến, nó là một danh sách các tùy chọn có sẵn hỗ trợ hoạt động。
			<br>
			Là chủ cửa hàng ở {{Config::get('constants.website_name')}} bất kỳ ai cũng có thể cấu hình sử dụng。
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
				Ảnh chuyên nghiệp
				<br>
				Dịch vụ chụp ảnh
				</h3>
				<p class="text">Gửi cho chúng tôi các mặt hàng, các nhiếp ảnh gia chuyên nghiệp chụp ảnh miễn phí.</p>
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
				Thẻ lưu trữ
				<br>
				Cung cấp dịch vụ
				</h3>
				<p class="text">Là một thẻ lưu trữ miễn phí. Khi quảng cáo cửa hàng của riêng bạn, hãy tận dụng lợi thế của các thẻ lưu trữ.</p>
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
				Lưu trữ hàng hóa
				<br>
				Dịch vụ vận chuyển
				</h3>
				<p class="text">Lưu trữ và vận chuyển kinh doanh hàng hoá, chúng tôi sẽ thay mặt {{Config::get('constants.website_name')}}.</p>
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
				Thu thập hàng hóa
				<br>
				Dịch vụ yêu cầu
				</h3>
				<p class="text">Chỉ cần cung cấp thời gian và địa điểm chúng tôi sẽ mang hàng đến cho bạn</p>
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
				Kit bao bì
				<br>
				Dịch vụ công cộng
				</h3>
				<p class="text">Sản phẩm sẽ được cung cấp trong bộ đóng gói (bìa cứng, băng đóng gói) miễn phí.</p>
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
				Cửa hàng ảo
				<br>
				Dịch vụ xây dựng
				</h3>
				<p class="text">Xây dựng một cửa hàng ảo toàn cảnh,cung cấp một kinh nghiệm mua sắm ảo ở một mức giá thấp. </p>
				</a>
			</li>
		</ul>
	</div>
	</div>
@include('text.footer')
<style>
*, *:before, *:after {
    box-sizing: unset!important;
}
body {
    background-color: #f0f0f0;
    font-family: Arial;
}
</style>