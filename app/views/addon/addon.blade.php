@include('elements.header')
{{HTML::style('css/addon.css')}}
{{HTML::script('js/jquery.bxslider.js')}}
{{HTML::script('js/main_page.js')}}
<div ng-view=""><div class="addon ng-scope">
  <div class="header">
    <h2><img alt="Hayamise.comアドオン あなたのストアを、進化させる。" src="/img/addon/title.png"></h2>
  </div>
  <div class="wrapper">
    <ul class="addon_list">

        @foreach ($addons as $ad)
            <li class="lists">
                <a class="fancybox" id="get_newsletter" href="#{{$ad['popup']}}">
                    <p class="icon"><img alt="{{$ad['name']}}" src="{{SysAddon::getImageURL($ad)}}"></p>
                    <div class="text">
                        <h3 style="margin-top:0px">{{$ad['name']}}</h3>
                        <p>{{$ad['intro']}}。</p>
                    </div>
                </a>
                <div addon="mail_magazine" sp-grip="" class="ng-scope">
                    <div ng-click="toggleAddon()" class="switch">
                        <p ng-show="isEnableAddon()" id-pro="{{$ad['id']}}" class="status active" style="display: none;">ON</p>
                        <p ng-hide="isEnableAddon()" id-pro="{{$ad['id']}}" class="status deactive">OFF</p><p class="grip" style="left: 2px;"></p>
                    </div>
                </div>
            </li>
        @endforeach

    </ul>
  </div>
</div></div>



<div id="dummy_modal_addon" class="ng-scope">
	<div id="modal-win-addon" style="top: 622px; display: none">
	<div id="modal-bg" style="opacity: 1;"></div>
		<div class="fancybox-wrap fancybox-desktop fancybox-type-inline fancybox-opened" tabindex="-1" style="width: 750px; height: auto; position: absolute; top: 20px; left: 299px; opacity: 1; overflow: visible;">
			<div class="fancybox-skin" style="padding: 15px; width: auto; height: auto;">
			<div class="fancybox-outer">
				<div class="fancybox-inner" style="overflow: auto; width: 720px; height: auto;">
					<div id="popup_english" class="popup_addon" style="display: block;">
						<div class="header">
							<p class="icon">
								{{HTML::image('img/main_page/icon_english.png', 'Information') }}
							</p>
							<h2>Tiếng Anh Tương Ứng</h2>
						</div>
						<div class="slider">
                            <ul id="slider_english" class="slider_contents" >
                                <li >
                                    {{HTML::image('img/main_page/english_01.png', 'Information') }}
                                </li>
                                <li >
                                    {{HTML::image('img/main_page/english_02.png', 'Information') }}
                                </li>
                            </ul>
						</div>
						<p class="text">
							Những đoạn văn cố định sẽ được dịch sang tiếng anh Tương ứng。
							<br>
							「Vận chuyển nâng cao」sẽ được thêm tùy vào các nước khác nhau。
							<span style="font-size:12px; display:block; margin-top:3px;">※Sử dụng nếu muốn chạy một của hàng ở nước ngoài</span>
							<span style="font-size:12px; display:block; margin-top:-4px;">※Trường hợp chuyển sang tiếng anh. Thanh toán bằng thẻ tín dụng</span>
						</p>
						<dl class="page">
							<dt>Trang thêm thông tin</dt>
							<dd>
								<a target="_blank" ng-href="" href="">Store</a>
							</dd>
						</dl>
					</div>
				</div>
			</div>
			<a class="fancybox-item fancybox-close" href="javascript:;" title="Close"></a>
			</div>
		</div>
	</div>
</div>

@include('elements.footer')
<script>
	$(document).ready(function(){
		$('#open_shipping_select').on('click', function(event){
			 event.preventDefault();
			if ($('#shipping_select').css('display') == 'none') {
				$('#shipping_select').show();
			} else {
				$('#shipping_select').hide();
			}
		});
		$('button.cancel_button').on('click', function(){
			$('#shipping_select').hide();
		})
		$('#form_promotion').on('click', function(){
			$('#modal-win').show();
		});
		$('a.modal-move').on('click', function() {
			var modal = $(this).attr('href');
			$('#modal-win-inner').hide();
			$('.modal_slide').hide();
			$(modal).show();
		});
		$('a.modal-close').on('click', function(){
			$('#modal-win').hide();
		});

        $('.switch p.status' ).click(function(){
            var _class = $(this).attr('class');
            if(_class.match(/deactive/)) {
                $(this).parent().find('.active').show();
                $(this).parent().find('.deactive').hide();
                $(this).parent().find('.grip').css({'left':'57px'});
                saveAddon($(this).attr('id-pro'),1);
            } else {
                $(this).parent().find('.deactive').show();
                $(this).parent().find('.active').hide();
                $(this).parent().find('.grip').css({'left':'2px'});
                saveAddon($(this).attr('id-pro'),0);
            }
        });

        @foreach ($user_addon as $ad)
            $(".switch").find("[id-pro={{$ad}}]").each(function(){
                $(this).parent().find('.active').show();
                $(this).parent().find('.deactive').hide();
                $(this).parent().find('.grip').css({'left':'57px'});
            });
        @endforeach
	});

/**
 * Comment
 */
function saveAddon(id,flg) {
    $.ajax({type: "GET",url: "/saveaddon/"+id+"/"+flg,});
}
</script>
<script>
$(document).ready(function(){
    $('.slider_contents').bxSlider({
        mode: 'fade',
        captions: true
      });

    $('.fancybox').on('click', function(e){
        $('#modal-win-addon').show();
    });

	$('#modal-bg,.fancybox-close').on('click', function(e){
		e.preventDefault();
		$('#modal-win-addon').hide();
	});
});
</script>
