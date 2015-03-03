<html ng-app="StoresJp" class="ng-scope firefox">

<head>
    
    <script type="text/javascript">
        var NREUMQ = NREUMQ || [];
        NREUMQ.push(["mark", "firstbyte", new Date().getTime()]);
    </script>
    <meta content="xeKORRKFnmFYJhnXpCNeSHjGNkW802Qo9YBxhX0IN1I" name="google-site-verification">
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="Keywords" content="<?php echo $sub;?> : Cửa hàng trực tuyến, mua sắm trực tuyến, bán hàng trực tuyến.">
    <meta content="<?php echo $sub?> : Cửa hàng trực tuyến" name="description">
    <meta content="!" name="fragment">
    <title><?php echo $sub?></title>
    <script src="//connect.facebook.net/ja_JP/all.js"></script>
    <script src="https://typesquare.com/accessor/apiscript/typesquare.js?JR8Di~WDf1g%3D" charset="utf-8"></script>

    
    {{HTML::style('css/application_store.css')}}
    <style rel="stylesheet" id="font_css"></style>
    <style id="font_css" rel="stylesheet"></style>
    <?php if (!empty($fontFamily)):?>
        <?php foreach ($fontFamily as $font => $family): ?>
        <link href='http://fonts.googleapis.com/css?family=<?php echo $family;?>' rel='stylesheet' type='text/css'>
        <?php endforeach;?>
    <?php endif;?>

    <meta content="summary_large_image" name="twitter:card">
    <meta content="@stores_jp" name="twitter:site">
    <meta content="<?php echo $sub?>" name="twitter:title">
    <meta content="<?php echo $sub?> : Cửa hàng trực tuyến." name="twitter:description">
    
    <meta name="csrf-param" content="authenticity_token">
    <meta name="csrf-token" content="lKeISpGV/4GvwokIe958zuV4Cev1pMEBW+s35/TJji8=">
    <script type="text/javascript">
        //&lt;![CDATA[
        AUTH_TOKEN = "lKeISpGV/4GvwokIe958zuV4Cev1pMEBW+s35/TJji8=";
        USER_NAME = '<?php echo $sub?>';
        USER_ID = '54c5c1a5391bb34148001feb';
        STORE_NAME = '<?php echo $sub?>';
        STORES_JP = {
            "promotion_enabled": null,
            "mall": null,
            "plan": "free",
            "enable_addons": ["follow"],
            "stores_domain": "<?php echo $domain;?>",
            "FILE_SERVER_URL": "<?php echo $domain;?>",
            "ORIGIN": "<?php echo $domain;?>"
            //"stores_domain": "http://haulenhan.stores.local",
            //"FILE_SERVER_URL": "http://haulenhan.stores.local",
            //"ORIGIN": "http://haulenhan.stores.local"
        };
        CART_NAME = 'cart';
        ORDER_AMOUNT_LIMIT = {
            "credit": 10000000,
            "bank_transfer": 300000,
            "cash_on_delivery": 3000000,
            "convenience_store_payment": 300000,
            "recieve_counter": 10000000
        };

        //]]&gt;
        var prefecture = <?php echo $prefecture?>;
        
    </script>
    {{HTML::script('js/application.js')}}
    {{HTML::script('js/routes.js')}}
    

    <style type="text/css">
        @charset "UTF-8";
        [ng\:cloak],
        [ng-cloak],
        [data-ng-cloak],
        [x-ng-cloak],
        .ng-cloak,
        .x-ng-cloak {
            display: none;
        }
        ng\:form {
            display: block;
        }
    </style>
    
    
    <style type="text/css">
        .fancybox-margin {
            margin-right: 0px;
        }
    </style>
</head>

<body id="store_form" data-twttr-rendered="true">
    @yield('content')
</body>

</html>