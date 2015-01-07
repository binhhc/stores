<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <?php
    echo $this->Html->charset('utf-8');
    echo $this->Html->meta(array('http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge,chrome=1'));
    echo $this->Html->meta('icon', Router::url('/favicon.png'), array('type' => 'image/png'));
    echo $this->Html->meta('keywords', array());
    echo $this->Html->meta('description', array());
    echo $this->fetch('meta');

    echo $this->Html->css(array('bootstrap.min', 'bootstrap-theme.min')); /* for core */
    echo $this->fetch('css');
    ?>

    <title><?php echo strip_tags($title_for_layout); ?></title>

    <script type="text/javascript">BASE = '<?php echo Router::url('/', true) ?>';</script>
    <?php echo $this->Html->script('jquery.min.js'); ?>
    <?php echo $this->Html->script('bootstrap.min.js'); ?>
    <?php echo $this->Html->script('main_page.js');?>
  </head>

  <body>
    <?php echo $this->Element('main_header'); ?>

        <?php echo $this->Session->flash(); ?>

        <!--[if lt IE 7]>
            <div class="flash-message alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-frown-o"></i>
                You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.
            </div>
        <![endif]-->

        <?php echo $this->fetch('content'); ?>

        <?php //echo $this->Element('backtotop'); ?>

    <?php echo $this->Element('main_footer'); ?>
    <?php
    //echo $this->Html->script(array(

   // ));
    ?>
  </body>
</html>
