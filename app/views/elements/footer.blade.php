        <div id="footer">
            <div class="footer_separator"></div>
            <div class="footer_upper">
                <div class="footer_upper_wrap">
                    <div class="foot_navi_support"><a href="{{URL::asset('/support')}}">HẠN CHẾ HỖ TRỢ HOẠT ĐỘNG</a></div>
                    <div class="foot_navi_referral"><a href="{{URL::asset('/referral')}}">GIỚI THIỆU CHIẾN DỊCH KHUYẾN MÃI</a></div>
                    <div class="foot_navi_logout"><a href="{{URL::asset('/logout')}}">ĐĂNG XUẤT</a></div>
                    </div>
                </div>
            <div class="footer_under">
                <div class="footer_under_wrap">
                    <div class="foot_navi_company">COPYRIGHT &copy; 2015 <span>HAYAMISE</span></div>
                    <div class="foot_navi_company_info">
                        <ul>
                            <li><a href="/contact" target="_blank">LIÊN HỆ</a></li><span> | </span>
                            <li><a href="http://leverages.vn/" target="_blank">CÔNG TY VẬN HÀNH</a></li><span> | </span>
                            <li><a href="/terms" target="_blank">ĐIỀU KHOẢN SỬ DỤNG</a></li><span> | </span>
                            <li><a href="/privacy_policy" target="_blank">CHÍNH SÁCH BẢO MẬT</a></li><span> | </span>
                            <li><a href="/law" target="_blank">LUẬT THƯƠNG MẠI</a></li>
                        </ul>
                    </div>    
                </div>
            </div>
        </div>
        <!-- Information Panel -->
            <div id="alert_panel" class="success">
                <p></p>
            </div>
        <!-- /Information Panel -->
        {{HTML::script('/js/jquery.tipsy.js')}}
    </body>
</html>
