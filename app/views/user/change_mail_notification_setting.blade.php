@include('elements.header')
{{HTML::style('css/account_setting.css')}}

<div class="wrapper account ng-scope">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l"><font><font>Thiết lập thông báo email</font></font></h2>
        <p class="fl_r btn_low"><a href="{{URL::asset('/account_setting')}}"><font><font>Cài đặt tài khoản</font></font></a></p>
    </div>
    <div class="form_basic border_bottom">
        <dl class="cols">
            <dt><font><font>Tin tức mới từ STORES.vn</font></font></dt>
            <dd id="mail_notice">
                <div class="switch">
                    <p class="status active hide" style="display: none;"><font><font>Reception</font></font></p>
                    <p class="status deactive hide"><font><font>Release</font></font></p>
                    <p  class="grip" style="left: 2px;"></p>
                </div>
            </dd>
        </dl>
        <dl class="cols">
            <dt><font><font>Thông báo chức năng theo dõi</font></font></dt>
            <dd id="mail_follow">
                <div class="switch">
                    <p class="status active hide" style="display: none;"><font><font>Reception</font></font></p>
                    <p class="status deactive hide"><font><font>Release</font></font></p>
                    <p class="grip" style="left: 2px;"></p>
                </div>
            </dd>
        </dl>
    </div>
</div>

@include('elements.footer')