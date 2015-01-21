@include('elements.header')
{{HTML::style('css/account_setting.css')}}
<div class="wrapper account">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l"><font><font>Thông tin Thẻ Tín Dụng</font></font></h2>
        <p class="fl_r btn_low"><a href="{{URL::asset('/account_setting')}}"><font><font>Cài đặt tài khoản</font></font></a></p>
    </div>
    <form class="form_basic">
        <dl class="cols">
            <dt>
                <font>Kiểu thẻ</font>
            </dt>
            <dd>
                <ul>
                    <li>
                        <div class="styled_radio">
                            <input type="radio" name="company" id="c1" class="nob" value="visa">
                            <span class="checked-true"></span>
                        </div>
                    </li>
                    <li class="card_image">
                        <label for="c1">
                            {{HTML::image('img/account_setting/icon_card_visa.gif', 'icon_card_visa', array('width'=>'51', 'height'=>'32'))}}
                        </label>
                    </li>
                    <li>
                        <div class="styled_radio">
                          <input type="radio" name="company" id="c2" class="nob" value="jcb">
                          <span class="checked-false"></span>
                        </div>
                    </li>
                    <li class="card_image">
                        <label for="c2">
                            {{HTML::image('img/account_setting/icon_card_jcb.gif', 'icon_card_jcb', array('width'=>'51', 'height'=>'32'))}}
                        </label>
                    </li>
                    <li>
                        <div class="styled_radio">
                            <input type="radio" name="company" id="c3" class="nob" value="master">
                            <span class="checked-false"></span>
                        </div>
                    </li>
                    <li class="card_image">
                        <label for="c3">
                            {{HTML::image('img/account_setting/icon_card_master.gif', 'icon_card_master', array('width'=>'51', 'height'=>'32'))}}
                        </label>
                    </li>
                    <li>
                        <div class="styled_radio">
                            <input type="radio" name="company" id="c4" class="nob" value="amex">
                            <span class="checked-false"></span>
                        </div>
                    </li>
                    <li class="card_image">
                        <label for="c4">
                            {{HTML::image('img/account_setting/icon_card_amex.gif', 'icon_card_amex', array('width'=>'51', 'height'=>'32'))}}
                        </label>
                    </li>
                    <li>
                        <div class="styled_radio">
                            <input type="radio" name="company" id="c5" class="nob" value="diners">
                            <span class="checked-false"></span>
                        </div>
                    </li>
                    <li class="card_image">
                        <label for="c5">
                            {{HTML::image('img/account_setting/icon_card_diners.gif', 'icon_card_diners', array('width'=>'51', 'height'=>'32'))}}
                        </label>
                    </li>
                </ul>
                <span class="error" ng-show="form.company.$invalid &amp;&amp; (form.company.$dirty || temp.clicked)" style="display: none;"><font><font>Please select the type of card</font></font></span>
            </dd>
        </dl>
        <dl class="cols">
            <dt>
                <font><font>Mã số thẻ</font></font>
            </dt>
            <dd>
                <input class="sz_m ng-pristine ng-invalid ng-invalid-required" type="text" name="number" ng-model="data.number" required="">
                <span style="font-size:8px; margin-left:20px;"><font><font>Example) 1234567890123456</font></font></span>
                <p class="error" ng-show="form.number.$invalid &amp;&amp; (form.number.$dirty || temp.clicked)" style="display: none;"><font><font>Please enter the card number</font></font></p>
          </dd>
        </dl>
        <dl class="cols">
            <dt>
                <font><font>Tên thẻ</font></font>
            </dt>
            <dd>
                <input class="sz_m ng-pristine ng-invalid ng-invalid-required" type="text" name="name" ng-model="data.name" required="">
                <span style="font-size:8px; margin-left:20px;"><font><font>Example) TARO YAMADA</font></font></span>
                <p class="error" ng-show="form.name.$invalid &amp;&amp; (form.name.$dirty || temp.clicked)" style="display: none;"><font><font>Please fill in the card name</font></font></p>
            </dd>
        </dl>
        <dl class="cols">
            <dt>
                <font><font>Ngày hết hạn</font></font>
            </dt>
            <dd>
                <ul>
                    <li class="select_s">
                        <div class="styled_select_thick">
                            {{Form::selectRange('month', 1, 12)}}
                            <span class="ng-binding"><font><font>-</font></font></span>
                        </div>
                    </li>
                    <li><font><font>Tháng</font></font></li>
                    <li><font><font>/</font></font></li>
                    <li class="select_s">
                        <div class="styled_select_thick">
                            {{Form::selectRange('month', date('Y'), date('Y')+10)}}
                            <span class="ng-binding"><font><font>-</font></font></span>
                        </div>
                    </li>
                    <li><font><font>Năm</font></font></li>
                </ul>
                <p class="error" ng-show="(form.month.$invalid || form.year.$invalid) &amp;&amp; temp.clicked" style="display: none;"><font><font>Please select a valid date</font></font></p>
            </dd>
        </dl>
        <dl class="cols">
            <dt><font><font>Mã bảo mật</font></font></dt>
            <dd>
                <input class="sz_m ng-pristine ng-invalid ng-invalid-required" type="text" name="security_code" ng-model="data.security_code" style="width: 60px;" required="">
                <p class="error" ng-show="form.security_code.$invalid &amp;&amp; (form.security_code.$dirty || temp.clicked)" style="display: none;"><font><font>Please enter the security code</font></font></p>
            </dd>
        </dl>
        <p class="error cc" ng-show="post_error_msg" style="display: none;"><strong class="ng-binding"></strong></p>
        <div class="border_top">
            <ul class="border_top btn_pair" ng-hide="pending">
                <li class="btn_low"><button type="button" onclick="history.back()"><font><font>Hủy bỏ</font></font></button></li>
                <li class="btn_high"><button type="submit"><font><font>Lưu lại</font></font></button></li>
            </ul>
            <div class="btn_single btn_low" ng-show="pending" style="display: none;"><button type="submit" class="send"><span><font><font>During transmission</font></font></span></button></div>
        </div>
    </form>
</div>

@include('elements.footer')

<script type="text/javascript">
    $(document).ready(function(){
        $('.nob').click(function(){
            $('.nob').closest("div").find('span').removeClass('checked-true');
            $(this).closest("div").find('span').addClass('checked-true');
        });
    });
</script>