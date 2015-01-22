@include('elements.header')
{{HTML::style('css/account_setting.css')}}
<div class="wrapper account">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l">Thay đổi email</h2>
        <p class="fl_r btn_low"><a href="{{URL::asset('/account_setting')}}">Trở lại</a></p>
    </div>
    {{Form::open(array('url' => 'change_email', 'method' => 'post', 'class'=>'form_submit'))}}
        <div class="form_basic">
            <dl class="cols">
                <dt>Nhập email mới</dt>
                <dd>
                    {{Form::text('email')}}
                    <font style="color:red;">{{ $errors->first('email') }}</font>
                </dd>
            </dl>
            <div class="border_top">
                <ul class="btn_pair" ng-hide="pending">
                    <li class="btn_low">
                        <a href="{{URL::asset('/account_setting')}}">Trở lại</a>
                    </li>
                    <li class="btn_high">
                        <button type="submit">Lưu lại</button>
                    </li>
                </ul>
            </div>
        </div>
            <div style="display: none;">
                <p class="center" style="padding:30px; font-size:16px; font-weight:bold; line-height:2em;">
                    新しいメールアドレスに確認メールをお送りいたしました。<br>
                    メールよりお手続きを完了してください。
                </p>
            </div>
        </div>
    {{Form::close()}}
</div>

@include('elements.footer')