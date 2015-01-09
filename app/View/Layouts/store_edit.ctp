<!DOCTYPE html>
<html ng-app="StoresJp::EditStore">
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <title>Chỉnh sửa giao diện cửa hàng</title>
  <?php
    echo $this->Html->css('application');
    echo $this->Html->script('edit_store');
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>
  <script type="text/javascript">
    //<![CDATA[
        AUTH_TOKEN = "123456"; 
        STORE_ID = '123'; 
        USER_NAME = 'hoangnn001';
    //]]>
</script>
  <script type="text/javascript">
    //<![CDATA[
    STORES_JP = {
        "FILE_SERVER_URL":"<?php echo Router::url('/', true);?>",
        //"enable_addons":["follow"]
    };
    //]]>
</script>
<?php 
$fonts = Configure::read('sys.fonts');
foreach($fonts as $font){
?>
    <link href='http://fonts.googleapis.com/css?family=<?php echo $font?>' rel='stylesheet' type='text/css'>
<?php }?>
<style rel="stylesheet" id="dynamic_font_css"></style>
<style rel="stylesheet" id="select_font_css"></style>
</head>
<body id="edit" ng-controller="StylesController" ng-style="styles.body" ng-init="init()">
<?php echo $this->fetch('content'); ?>
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
