@include('elements.header')
{{HTML::style('css/account_setting.css')}}
<div class="wrapper account">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l">Thay đổi mật khẩu</h2>
        <p class="fl_r btn_low"><a href="{{URL::asset('/account_setting')}}">Trở lại</a></p>
    </div>
    <form>
        <div class="form_basic">
            <dl class="cols">
                <dt>Mật khẩu mới</dt>
                <dd>
                    {{Form::password('password')}}
                    <font style="color:red;">{{ $errors->first('password') }}</font>
                </dd>
            </dl>
            <dl class="cols">
                <dt>Xác nhận mật khẩu</dt>
                <dd>
                    {{Form::password('password_confirm')}}
                    <font style="color:red;">{{ $errors->first('password_confirm') }}</font>
                </dd>
            </dl>
            <div class="border_top">
                <ul class="border_top btn_pair" ng-hide="pending">
                    <li class="btn_low"><button type="button" onclick="history.back()">Trở lại</button></li>
                    <li class="btn_high"><button type="submit">Lưu lại</button></li>
                </ul>
                <div class="btn_single btn_low" ng-show="pending" style="display: none;"><button type="submit" class="send"><span>送信中</span></button></div>
            </div>
        </div>
    </form>
</div>

@include('elements.footer')