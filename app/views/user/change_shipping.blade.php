@include('elements.header')
{{HTML::style('css/account_setting.css')}}
<div class="wrapper account">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l">Thay đổi thông tin</h2>
        <p class="fl_r btn_low"><a href="{{URL::asset('/account_setting')}}">Trở lại</a></p>
    </div>
    <form class="form_basic">
        <dl class="cols">
            <dt>Tên</dt>
            <dd>
                <ul>
                    <li>Họ</li>
                    <li>
                        <input class="sz_sm" type="text" name="last_name" >
                    </li>
                    <li>Tên</li>
                    <li>
                        <input class="sz_sm " type="text" name="first_name" >
                    </li>
                </ul>
                <p class="error" ng-show="(form.last_name.$invalid || form.first_name.$invalid) &amp;&amp; ( (form.last_name.$dirty &amp;&amp; form.first_name.$dirty) || temp.clicked)" style="display: none;">名前を入力してください</p>
            </dd>
        </dl>
        <dl class="cols">
            <dt>Mã bưu chính</dt>
            <dd>
                <input class="sz_s" type="text" name="zip" ng-model="data.zip" stores-zip-code="" required="">
                <span style="font-size:12px; margin-left:20px;">※Địa chỉ sẽ tự động nhập</span>
            </dd>
        </dl>
        <dl class="cols">
            <dt>Quận</dt>
            <dd class="select_m" style="width: auto;">
                <div class="styled_select_thick">
                    <select size="1" class="styled">
                        <option value="">選択してください</option>
                        <option value="0">北海道</option>
                        <option value="1">青森県</option>
                        <option value="2">岩手県</option>
                        <option value="3">宮城県</option>
                        <option value="4">秋田県</option>
                        <option value="5">山形県</option>
                        <option value="6">福島県</option>
                        <option value="7">茨城県</option>
                        <option value="8">栃木県</option>
                        <option value="9">群馬県</option>
                        <option value="10">埼玉県</option>
                        <option value="11">千葉県</option>
                        <option value="12">東京都</option>
                        <option value="13">神奈川県</option>
                        <option value="14">新潟県</option>
                        <option value="15">富山県</option>
                        <option value="16">石川県</option>
                        <option value="17">福井県</option>
                        <option value="18">山梨県</option>
                        <option value="19">長野県</option>
                        <option value="20">岐阜県</option>
                        <option value="21">静岡県</option>
                        <option value="22">愛知県</option>
                        <option value="23">三重県</option>
                        <option value="24">滋賀県</option>
                        <option value="25">京都府</option>
                        <option value="26">大阪府</option>
                        <option value="27">兵庫県</option>
                        <option value="28">奈良県</option>
                        <option value="29">和歌山県</option>
                        <option value="30">鳥取県</option>
                        <option value="31">島根県</option>
                        <option value="32">岡山県</option>
                        <option value="33">広島県</option>
                        <option value="34">山口県</option>
                        <option value="35">徳島県</option>
                        <option value="36">香川県</option>
                        <option value="37">愛媛県</option>
                        <option value="38">高知県</option>
                        <option value="39">福岡県</option>
                        <option value="40">佐賀県</option>
                        <option value="41">長崎県</option>
                        <option value="42">熊本県</option>
                        <option value="43">大分県</option>
                        <option value="44">宮崎県</option>
                        <option value="45">鹿児島県</option>
                        <option value="46">沖縄県</option>
                    </select>
                    <!-- <span class="ng-binding">選択してください</span> -->
                </div>
                <p class="error" ng-show="form.prefecture.$invalid &amp;&amp; (form.prefecture.$dirty || temp.clicked)" style="display: none;">都道府県を選択してください</p>
            </dd>
        </dl>
        <dl class="cols">
            <dt>Địa chỉ</dt>
            <dd>
                <input class="sz_l ng-pristine ng-invalid ng-invalid-required" type="text" name="address" ng-model="data.address" required="">
                <p class="error" ng-show="form.address.$invalid &amp;&amp; (form.address.$dirty || temp.clicked)" style="display: none;">住所を入力してください</p>
            </dd>
        </dl>
        <dl class="cols">
            <dt>Số điện thoại</dt>
            <dd>
                <input class="sz_sm ng-pristine ng-invalid ng-invalid-required" type="text" name="tel" ng-model="data.tel" required="">
                <p class="error" ng-show="form.tel.$invalid &amp;&amp; (form.tel.$dirty || temp.clicked)" style="display: none;">電話番号を入力してください</p>
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