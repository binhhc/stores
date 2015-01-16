@include('elements.header')
{{HTML::style('css/account_setting.css')}}
<div class="setting">
    <div class="wrapper account">
        <div class="heading_box clearfix">
            <h2 class="heading fl_l">Account settings</h2>
        </div>
        <div class="box_wht">
            <dl>
                <dd class="form_basic">
                    <dl class="cols no_border">
                        <dt>Địa chỉ email</dt>
                        <dd class="horizon">
                            <ul>
                                <li><strong class="ng-binding">hcbinh@gmail.com</strong></li>
                                <li class="btn_low_m">
                                    <a href="{{URL::asset('/change_email')}}">Thay đổi</a>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="cols">
                        <dt>Mật khẩu</dt>
                        <dd class="horizon">
                            <p class="btn_low_m">
                                <a href="{{URL::asset('/change_password')}}">Thay đổi</a>
                            </p>
                        </dd>
                    </dl>
                    <dl class="cols">
                        <dt>Hồ sơ</dt>
                        <dd class="horizon">
                            <p class="btn_low_m">
                                <a href="{{URL::asset('/change_profile')}}">Thay đổi</a>
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
                                <a href="{{URL::asset('/change_shipping')}}">Thay đổi</a>
                            </p>
                        </dd>
                    </dl>
                    <dl class="cols">
                        <dt>Credit Card</dt>
                        <dd class="horizon">
                            <p class="btn_low_m">
                                <a href="#!/account/credit_card/edit">登録する</a>
                            </p>
                        </dd>
                    </dl>
                    <dl class="cols">
                        <dt>Destination account</dt>
                        <dd>
                            <p class="btn_low_m"><a href="#!/account/bank">登録する</a></p>
                            <p class="btn_low_m" style="display: none;">
                                <a href="#!/account/bank">変更する</a>
                            </p>
                        </dd>
                    </dl>
                    <dl class="cols">
                        <dt id="mail_title">Mail notification settings</dt>
                        <dd id="mail_contents" class="horizon">
                            <p class="btn_low_m"><a href="#!/account/notifications">設定する</a></p>
                        </dd>
                    </dl>
                    <dl class="cols" style="display: none;">
                        <dt>プレミアムプランの解約</dt>
                        <dd>
                            <ul>
                                <li>
                                    <p class="btn_low_m"><a href="#popup_premium_form_message" class="fancybox">解約する</a></p>
                                </li>
                                <li>
                                    <p class="memo ng-binding">あと日利用できます</p>
                                </li>
                                <li style="display: none;">
                                    <p class="memo">お支払いが確認できないため、数日中に解約されます</p>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="cols">
                        <dt>Withdrawal</dt>
                        <dd>
                            <p class="btn_low_m" ng-show="account_info.has_store"><a href="#popup_quit_form_message" class="fancybox" ng-click="pageview('/dashboard#!/quit/popup')">退会する</a></p>
                            <p class="btn_low_m" ng-hide="account_info.has_store" style="display: none;"><a href="#popup_quit_form_follow" class="fancybox" ng-click="pageview('/dashboard#!/quit/popup')">退会する</a></p>
                        </dd>
                    </dl>
                </dd>
            </dl>
        </div>
    </div>
</div>

@include('elements.footer')