@include('elements.header')
{{HTML::style('css/account_setting.css')}}

<div class="wrapper account">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l">Hồ sơ</h2>
        <p class="fl_r btn_low"><a href="{{URL::asset('/account_setting')}}">Trở lại</a></p>
    </div>
    {{Form::open(array('url' => 'change_profile', 'method' => 'post', 'class'=>'form_basic', 'files' => 'true', 'id' => 'frmChangeProfile'))}}
        <dl class="cols">
            <dt>Tên người dùng</dt>
            <dd>
                {{Form::text('name', isset($user_profile) ? $user_profile->name : null, array('class'=>'txtUsername'))}}
                <span class="error"></span>
          </dd>
        </dl>
        <dl class="cols">
            <dt>Hình ảnh</dt>
            <dd class="profile_image_fileup">
                {{Form::file('image_url', array('accept'=>'image/jpeg,image/png,image/gif', 'onchange'=>'previewFile()', 'class'=>'fileup'))}}
                <p class="profile_image">
                    <?php
                        $url_img = '/img/login/user_icon_01.png';
                        if(isset($user_profile)){
                            $folder_name = $user_profile->user_id;
                            if (!empty($user_profile->image_url)) {
                                $url_img = '/files/'.$folder_name.'/'.$user_profile->image_url;
                            }
                        }
                    ?>
                    {{
                        HTML::image($url_img, 'Hồ sơ',array('width' => 100, 'height' => '100', 'id'=>'img_loadImagePreview'))
                    }}
                </p>
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
            <div class="btn_single btn_low" ng-show="pending" style="display: none;"><button type="submit" class="send"><span>送信中</span></button></div>
        </div>
    {{Form::close()}}
</div>

@include('elements.footer')


<script type="text/javascript">
    var submit_flg = true;
    $(document).ready(function(){
    	var txtUsername = $('.txtUsername').val();
        $('.error').empty();
        
        $('#frmChangeProfile').submit(function(event){
        	var txtUsername = $('.txtUsername').val();
            
            if(submit_flg){
                var email = $('.email').val();
                if (validateEmail(email)) {
                    $('.finish').show();
                    $('.form_submit').hide();
                }
                if (txtUsername.length == 0) {
                	$('.error').append('Vui lòng nhập tên của bạn');
                	submit_flg = false;
                	return false;
                }else {
                	submit_flg = true;
                }
            }else{
                event.preventDefault();
            }
        });

        $('.txtUsername').keyup(function(){
            var txtUsername = $('.txtUsername').val();
            $('.error').empty();

            if(txtUsername.length == 0){
                $('.error').append('Vui lòng nhập tên của bạn');
                submit_flg = false;
            }else{
            	submit_flg = true;
            }
        });
    });

    //load ajax image
    function previewFile(){
    	var txtUsername = $('.txtUsername').val();
        var preview = document.querySelector('img#img_loadImagePreview'); //selects the query named img
        var file    = document.querySelector('input[type=file]').files[0]; //sames as here
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if(!(/\.(gif|jpg|jpeg|tiff|png)$/i).test(file.name)){
            alert('Không đúng định dạng ảnh!');
            $('input[name=image_url]').val('');
            preview.src = "{{$url_img}}";
            //submit_flg = false;
            if(preview && txtUsername){
            	submit_flg = true;
            }else{
            	submit_flg = false;
            }
        }else{
            if(file){
                reader.readAsDataURL(file); //reads the data as a URL
            } else {
                preview.src = "{{$url_img}}";
            }
        }
    }
</script>

