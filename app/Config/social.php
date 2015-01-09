<?php

/**
 * Social network configurations
 *
 * @author Mai Nhut Tan
 * @since 2013/09/06
 * @package app.Config
 */
$log_file = TMP . 'logs' . DS . 'social_logs.txt';
$config = array(
    'Social' => array(
        'base_url' => Router::url('/Users/social/auth', true),
        'debug_mode' => true,
        'debug_file' => $log_file,
        'providers' => array (
            'Google' => array (
                'enabled' => true,
                'wrapper' => array('path' => 'Providers/GoogleOpenID.php', 'class' => 'Hybrid_Providers_Google')
            ),
            'Facebook' => array (
                'enabled' => true,
                'keys'    => array ('id' => '290319794422864', 'secret' => '523f360f13cb75fa2c4a30102589f177'),
                'scope'   => null,
            ),
        )
    )
);

//init log file
if(!file_exists($log_file)){
    @file_put_contents($log_file, '');
}