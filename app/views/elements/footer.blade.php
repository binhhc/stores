         <!-- Footer/ -->
        <div id="footer" class="row">
            <p class="support_banner"><a  href="{{URL::asset('/support')}}">Hạn chế hỗ trợ hoạt động</a></p>
            <p class="referral_banner"><a  href="{{URL::asset('/referral')}}">Giới thiệu chiến dịch khuyến mãi</a></p>
            <ul id="foot_navi">
                <li><a href="/notification" target="_blank">Thông báo</a></li>
                <li><a href="/contact" target="_blank">Liên hệ</a></li>
                <li><a href="/terms" target="_blank">Điều khoản sử dụng</a></li>
                <li><a href="/law" target="_blank">Luật thương mại</a></li>
                <li><a href="/privacy_policy" target="_blank">Chính sách bảo mật</a></li>
                <li><a href="http://leverages.vn/" target="_blank">Công ty vận hành</a></li>
                <li class="logout">
                    <a href="{{URL::asset('/logout')}}">Đăng xuất</a>
                </li>
            </ul>
        </div>
        <!-- /Footer -->
        <!-- Information Panel -->
            <div id="alert_panel" class="success">
                <p></p>
            </div>
        <!-- /Information Panel -->
        {{HTML::script('/js/jquery.tipsy.js')}}
    </body>
</html>
