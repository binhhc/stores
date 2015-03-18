<!doctype html>
<html ng-app="StoresJp::EditStore">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Chỉnh sửa giao diện cửa hàng</title>
        {{HTML::style('css/application.css')}}
        <script type="text/javascript">
        var editStore_Fonts = <?php echo json_encode($fontDefaults);?>;
        var editStore_FontsVn = <?php echo json_encode($fontDefaultsVn);?>;
        var editStoreItemSample = <?php echo json_encode($itemSample);?>;
        var editStore_Layouts = <?php echo json_encode($sysLayouts);?>;
        var editStore_TextColor = <?php echo json_encode($sysTextColor);?>;
        var editStore_BackgroundColor = <?php echo json_encode($sysBackgroundColor);?>;
        var editStore_BackgroundPatterns = <?php echo json_encode($sysBackgroundImage);?>;
        </script>
        {{HTML::script('js/edit_store.js')}}
        <script type="text/javascript">
        //<![CDATA[
            AUTH_TOKEN = "123456";
            STORE_ID = '123';
            USER_NAME = "<?php echo $userInfos['USER_NAME'];?>";
            PATH_USER_NAME = '';
        //]]>
        </script>
        <script type="text/javascript">
        //<![CDATA[
            STORES_JP = {
            	    "FILE_SERVER_URL":"",
            	    //"enable_addons":["follow"]
            	    };
        //]]>
        </script>
        <?php if (!empty($fontFamily)):?>
            <?php foreach ($fontFamily as $font => $family): ?>
            <link href='http://fonts.googleapis.com/css?family=<?php echo $family;?>' rel='stylesheet' type='text/css'>
            <?php endforeach;?>
        <?php endif;?>
        <style rel="stylesheet" id="dynamic_font_css"></style>
        <style rel="stylesheet" id="select_font_css"></style>
    </head>

    <body id="edit" ng-controller="StylesController" ng-style="styles.body" ng-init="init()">
        @yield('content')
        <script>
            $(function(){
              $('.btn_dropdown').on({
                'mouseenter':function(){
                  $(this).find('.dropdown').fadeIn(100);
                },
                'mouseleave':function(){
                  $(this).find('.dropdown').fadeOut(100);
                }
              });
              $('#temp_select').change(function(){
                var temp = $(this).val();
                $('#layout_pattern').removeClass().addClass('layout_'+temp);
              })

              //トグルスイッチ
              setTimeout(function() {
                var scope = angular.element('#edit').scope();
                scope.$watch('styles.logo', function(v) {
                  $('.store_mark .grip').animate({left: (v ? '46px' : '2px')}, 'fast', 'swing');
                }, true);

                scope.$watch('styles.original_background_image', function(v) {
                  $('#bg_original .grip').animate({left: (v ? '46px' : '2px')}, 'fast', 'swing');
                }, true);

                scope.$watch('store.display.item', function(v) {
                  $('#item_info .grip :eq(0)').animate({left: (v ? '46px' : '2px')}, 'fast', 'swing');
                }, true);

                scope.$watch('store.display.frame', function(v) {
                  $('#item_info .grip :eq(1)').animate({left: (v ? '46px' : '2px')}, 'fast', 'swing');
                }, true);
              }, 0);
            });
        </script>
    </body>
</html>