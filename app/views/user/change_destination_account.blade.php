@include('elements.header')
{{HTML::style('css/account_setting.css')}}

<div class="wrapper account">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l"><font><font>Tài khoản chuyển đến</font></font></h2>
        <p class="fl_r btn_low"><a href="{{URL::asset('/account_setting')}}"><font><font>Cài đặt tài khoản</font></font></a></p>
    </div>
    <form class="form_basic" name="form">
        <dl class="cols">
            <dt><font><font>Tên ngân hàng</font></font></dt>
            <dd>
                <ul>
                    <li class="pr_none" style="padding-right: 10px;"><span class="ng-binding"></span></li>
                    <li class="pr_none"><p class="btn_low_m" ng-click="window_open()"><a href=""><font><font>Bank selection</font></font></a></p></li>
                </ul>
                <input type="hidden" name="bank_code" ng-model="bank.bank_code" required="" class="ng-pristine ng-invalid ng-invalid-required">
                <span class="error" ng-show="(form.bank_code.$invalid &amp;&amp; (form.bank_code.$dirty || clicked_submit))" style="display: none;"><font><font>Please select the bank</font></font></span>
            </dd>
        </dl>
        <dl class="cols">
            <dt><font><font>Tên chi nhánh</font></font></dt>
            <dd><span class="ng-binding"></span></dd>
        </dl>
        <dl class="cols">
            <dt><font><font>Loại tài khoản</font></font></dt>
            <dd class="select_m">
                <div class="styled_select_thick">
                    <select id="acount_type" ng-model="bank.account_type" ng-options="a.type for a in account_types" class="ng-pristine ng-valid"><option value="0" selected="selected"><font><font>Usually</font></font></option><option value="1"><font><font>Current</font></font></option><option value="2"><font><font>Savings</font></font></option></select>
                    <span class="ng-binding"><font><font>Usually</font></font></span>
                </div>
            </dd>
        </dl>
        <dl class="cols">
            <dt><font><font>Số tài khoản</font></font></dt>
            <dd>
                <input class="sz_m ng-pristine ng-invalid ng-invalid-required" type="text" name="number" ng-model="bank.number" required="">
                <span class="error" ng-show="(form.number.$invalid &amp;&amp; (form.number.$dirty || clicked_submit))" style="display: none;"><font><font>Please enter the account number</font></font></span>
                <span class="error ng-binding" ng-show="errors.number" style="display: none;"></span>
            </dd>
        </dl>
        <dl class="cols">
            <dt><font><font>Chủ tài khoản</font></font></dt>
            <dd>
                <input class="sz_m ng-pristine ng-invalid ng-invalid-required" type="text" name="name" ng-model="bank.name" required=""><span style="font-size:8px; margin-left:20px;"><font><font>Example) Yamada Taro</font></font></span>
                <span class="error" ng-show="(form.name.$invalid &amp;&amp; (form.name.$dirty || clicked_submit))" style="display: none;"><font><font>Please enter the account name</font></font></span>
                <span class="error ng-binding" ng-show="errors.name" style="display: none;"></span>
            </dd>
        </dl>
        <div class="border_top">
            <ul class="border_top btn_pair" ng-hide="pending">
                <li class="btn_low"><button type="button" onclick="history.back()"><font><font>Hủy bỏ</font></font></button></li>
                <li class="btn_high"><button type="submit"><font><font>Đăng kí</font></font></button></li>
            </ul>
            <div class="btn_single btn_low" ng-show="pending" style="display: none;"><button type="submit" class="send"><span><font><font>During transmission</font></font></span></button></div>
        </div>
    </form>
</div>

@include('elements.footer')