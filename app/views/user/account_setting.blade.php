@include('elements.header')
{{HTML::script('js/bootstrap.min.js')}}
{{HTML::style('css/account_setting.css')}}

<div class="setting">
    <div class="wrapper account">
        <div class="heading_box clearfix">
            <h2 class="heading fl_l">Cài đặt tài khoản</h2>
        </div>
        <div class="box_wht">
            <dl>
                <dd class="form_basic">
                    <dl class="cols no_border">
                        <dt>Địa chỉ email</dt>
                        <dd class="horizon">
                            <ul>
                                <li><strong>{{$user['email']}}</strong></li>
                                <li class="btn_low_m">
                                    <a href="{{URL::asset('/update_email')}}">Thay đổi</a>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="cols">
                        <dt>Mật khẩu</dt>
                        <dd class="horizon">
                            <p class="btn_low_m">
                                <a href="{{URL::asset('/update_password')}}">Thay đổi</a>
                            </p>
                        </dd>
                    </dl>
                    <dl class="cols">
                        <dt>Hồ sơ</dt>
                        <dd class="horizon">
                            <p class="btn_low_m">
                                <a href="{{URL::asset('/change_profile')}}">Đăng kí</a>
                            </p>
                        </dd>
                    </dl>
                    <dl id="faq_address" class="cols">
                        <dt>
                            Giao hàng<span class="info">
                                <a href="#" target="_blank">
                                    {{HTML::image('img/login/icon_help.png', 'Information')}}
                                </a></span>
                        </dt>
                        <dd class="horizon">
                            <p class="btn_low_m" >
                                <a href="{{URL::asset('/change_shipping')}}">Đăng kí</a>
                            </p>
                        </dd>
                    </dl>
                    <dl class="cols">
                        <dt>Thẻ Tín Dụng</dt>
                        <dd class="horizon">
                            <p class="btn_low_m">
                                <a href="{{URL::asset('/change_credit_card')}}">Đăng kí</a>
                            </p>
                        </dd>
                    </dl>
                    <dl class="cols">
                        <dt>Tài khoản chuyển đến</dt>
                        <dd>
                            <p class="btn_low_m"><a href="{{URL::asset('/change_destination_account')}}">Đăng kí</a></p>
                            <p class="btn_low_m" style="display: none;">
                                <a href="{{URL::asset('/change_destination_account')}}">Thay đổi</a>
                            </p>
                        </dd>
                    </dl>
                    <dl class="cols">
                        <dt id="mail_title">Thiết lập thông báo email</dt>
                        <dd id="mail_contents" class="horizon">
                            <p class="btn_low_m"><a href="{{URL::asset('/change_mail_notification_setting')}}">Thiết lập</a></p>
                        </dd>
                    </dl>
                    <dl class="cols" style="display: none;">
                        <dt>Hủy bỏ kế hoạch bảo hiểm</dt>
                        <dd>
                            <ul>
                                <li>
                                    <p class="btn_low_m"><a href="#popup_premium_form_message" class="fancybox">解約する</a></p>
                                </li>
                                <li>
                                    <p class="memo ng-binding">Bạn có thể sử dụng sau này</p>
                                </li>
                                <li style="display: none;">
                                    <p class="memo">Kể từ khi thanh toán nếu không được xác nhận, nó sẽ được hủy bỏ trong một vài ngày</p>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="cols">
                        <dt>Rút ra</dt>
                        <dd>
                            <p class="btn_low_m">
                                <button type="button" class="fancybox" data-toggle="modal" data-target="#myModal">
                                    Rút ra
                                </button>
                            </p>
                        </dd>
                    </dl>
                </dd>
            </dl>
        </div>
    </div>
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="fancybox-wrap fancybox-desktop fancybox-type-inline fancybox-opened" tabindex="-1">
                <div class="fancybox-skin">
                    <div class="fancybox-outer">
                        <div class="fancybox-inner" style="overflow: auto; width: 437px; height: auto;">
                            <div id="popup_quit_form_message" style="display: block;">
                                <h2>Bạn có chắc là bạn muốn hủy đăng ký tại STORES.vn?</h2>
                                <h3>Xóa toàn bộ dữ liệu sao khi tài khoản bị hủy</h3>
                                <ul class="delete_list">
                                    <li class="memo">Xóa đăng kí lưu trữ</li>
                                    <li class="memo">Xóa các thông tin đặt hàng</li>
                                    <li class="memo">Xóa tất cả các cài đặt</li>
                                </ul>
                                <ul class="btn_pair">
                                    <li class="btn_low" style="margin-top:20px;">
                                        <a class="close_fancybox" href="">Hủy bỏ</a>
                                    </li>
                                    <li class="btn_high">
                                        <a href="#" class="fancybox" data-toggle="modal" data-target="#myModal2">Kế tiếp</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal 2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="fancybox-wrap fancybox-desktop fancybox-type-inline fancybox-opened" aria-hidden="true" tabindex="-1" >
                <div class="fancybox-skin">
                    <div class="fancybox-outer">
                        <div class="fancybox-inner" style="overflow: auto; height: 391px;">
                            <div id="popup_quit_form">
                                <h2>Hãy cho chúng tôi biết lý do tại sao bạn muốn hủy đăng ký các STORES.vn?</h2>
                                <div id="bg_premium_form">
                                    <ul>
                                        <li>
                                            <div class="styled_checkbox">
                                                <input type="checkbox" >
                                                <span class="checked-false"></span>
                                            </div>
                                            <label>Không có gì để bán</label>
                                        </li>
                                        <li>
                                            <div class="styled_checkbox">
                                                <input type="checkbox">
                                                <span class="checked-false"></span>
                                            </div>
                                            <label>Tôi cảm thấy thiếu</label>
                                        </li>
                                        <li>
                                            <div class="styled_checkbox">
                                                <input type="checkbox">
                                                <span class="checked-false"></span>
                                            </div>
                                            <label>Bán hàng không tăng</label>
                                        </li>
                                        <li>
                                            <div class="styled_checkbox">
                                                <input type="checkbox">
                                                <span class="checked-false"></span>
                                            </div>
                                            <label>Tôi chuyển đến cửa hàng trực tuyến khác</label>
                                        </li>
                                        <li>
                                            <div class="styled_checkbox">
                                                <input type="checkbox">
                                                <span class="checked-false"></span>
                                            </div>
                                            <label>Thay đổi URL</label>
                                        </li>
                                        <li>
                                            <div class="styled_checkbox">
                                                <input type="checkbox">
                                                <span class="checked-false"></span>
                                            </div>
                                            <label>Không có các chức năng cần thiết</label>
                                        </li>
                                        <li>
                                            <div class="styled_checkbox">
                                                <input type="checkbox">
                                                <span class="checked-false"></span>
                                            </div>
                                            <label>Chỉ sử dụng tạm thời</label>
                                        </li>
                                        <li>
                                            <div class="styled_checkbox">
                                                <input type="checkbox">
                                                <span class="checked-false"></span>
                                            </div>
                                            <label >Khác</label>
                                        </li>
                                    </ul>
                                </div>
                                <textarea placeholder="Các chức năng mà bạn muốn, vui lòng viết ý kiến và yêu cầu liên quan đến STORE.vn" ng-model="quit_check.box" class="ng-pristine ng-valid"></textarea>
                                <ul class="btn_pair">
                                    <li class="btn_low" style="margin-top:20px;"><a class="close_fancybox" href="">Trở lại</a></li>
                                    <li class="btn_high"><a href="" ng-hide="pending">Hủy đăng kí</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('elements.footer')