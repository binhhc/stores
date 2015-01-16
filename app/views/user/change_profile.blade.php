@include('elements.header')
{{HTML::style('css/account_setting.css')}}
<div class="wrapper account">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l">Hồ sơ</h2>
        <p class="fl_r btn_low"><a href="{{URL::asset('/account_setting')}}">Trở lại</a></p>
    </div>
    <form class="form_basic" name="form">
        <dl class="cols">
            <dt>Tên người dùng</dt>
            <dd>
                <input class="sz_m ng-pristine ng-invalid ng-invalid-required" type="text" name="name" ng-model="data.name" required="">
                <p class="error" ng-show="form.name.$invalid &amp;&amp; (form.name.$dirty || temp.clicked)" style="display: none;">ユーザー名を入力してください</p>
          </dd>
        </dl>
        <dl class="cols">
            <dt>Hình ảnh</dt>
            <dd class="profile_image_fileup">
                <input class="fileup" type="file" name="profile_image" size="" accept="image/jpeg,image/png,image/gif" ng-file-select="onFileSelect($files)">
                <p class="profile_image">
                    {{HTML::image('/img/login/user_icon_01.png', 'Hồ sơ',array('width' => 100, 'height' => '100'))}}
                </p>
            </dd>
        </dl>
        <div class="border_top">
            <ul class="btn_pair" ng-hide="pending">
                <li class="btn_low"><button type="button" onclick="history.back()">Trở lại</button></li>
                <li class="btn_high"><button type="submit">Lưu lại</button></li>
            </ul>
            <div class="btn_single btn_low" ng-show="pending" style="display: none;"><button type="submit" class="send"><span>送信中</span></button></div>
        </div>
    </form>
</div>

@include('elements.footer')