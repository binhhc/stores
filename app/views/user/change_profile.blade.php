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
                {{Form::password('username')}}
                <font style="color:red;">{{ $errors->first('username') }}</font>
          </dd>
        </dl>
        <dl class="cols">
            <dt>Hình ảnh</dt>
            <dd class="profile_image_fileup">
                <input class="fileup" type="file" name="profile_image" size="" accept="image/jpeg,image/png,image/gif" onchange="previewFile()">
                <p class="profile_image">
                    {{HTML::image('/img/login/user_icon_01.png', 'Hồ sơ',array('width' => 100, 'height' => '100'))}}
                </p>
            </dd>
        </dl>
        <div class="border_top">
            <ul class="btn_pair" ng-hide="pending">
                <li class="btn_low">
                    <a href="{{URL::asset('/account_setting')}}">Trở lại</a>
                </li>
                <li class="btn_high"><button type="submit">Lưu lại</button></li>
            </ul>
            <div class="btn_single btn_low" ng-show="pending" style="display: none;"><button type="submit" class="send"><span>送信中</span></button></div>
        </div>
    </form>
</div>

@include('elements.footer')


<script type="text/javascript">
    function previewFile(){
        var preview = document.querySelector('img'); //selects the query named img
        var file    = document.querySelector('input[type=file]').files[0]; //sames as here
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file); //reads the data as a URL
        } else {
            preview.src = "";
        }
    }

    previewFile();  //calls the function named previewFile()
</script>

