@extends('layouts.owner_store')
@section('content')
<div id="fb-root"></div>

<div class="contents_view">
    <iframe src="https://haulenhan.stores.jp/iframe/store/follow_header?position=header" style="top: 20px; right: 90px; position: fixed;position:absolute; top: 80px !important; width: 120px; height: 40px; z-index:100; background-color:transparent;" scrolling="no" frameborder="0" sp-if="follow"></iframe>

    <!-- Cart/ -->
    <div id="cart_button" class="private" style="z-index:1">
        <a href="#popup_cart">
            
            <span>0</span>
        </a>
    </div>
    <!-- /Cart -->

    <!-- Private/ -->
    <div class="private">
        <p class="text">Cửa hàng chưa được công khai, vui lòng vào<a href="https://stores.jp/dashboard#!/store">「cài đặt cửa hàng」</a></p>
    </div>
    <!-- /Private -->

    <div ng-view></div>

    <!-- FollowBox/ -->
    <div class="follow_box" sp-if="follow">
        <p class="close"><a href="">close</a>
        </p>
        <p class="message">ストアの情報をチェックしよう！</p>
        <p class="store_image"><img src="https://stores.jp/images/follow/user_icon/user_icon_01.png">
        </p>
        <div class="store_info">
            
            <h3>hau le nhan</h3>
            <p></p>
        </div>
        <iframe id="follow_iframe" src="https://haulenhan.stores.jp/iframe/store/follow_header?position=box" style="float:right; width:100px; height:26px; margin:8px 12px 0 0; background-color:transparent; vertical-align:middle;" scrolling="no" frameborder="0"></iframe>
    </div>
    <!-- /FollowBox -->

</div>






<!-- PopupAlertFollow/ -->
<div id="popup_alert_follow" class="fancybox popup_alert">
    <p class="image"><img src="/img/icon_attention_big_gray.png" alt="アラート">
    </p>
    <p class="text">自分のストアをフォローすることはできません。</p>
</div>
<!-- /PopupAlertFollow -->

<script>
    var I18n = I18n.translations.ja.js;
    I18n.locale = 'ja';
    I18n.fb_locale = 'ja_JP';
    document.getElementById('cart_button').style.position = 'fixed';

    $('#cart_button a').fancybox({
        afterLoad: function() {
            _gaq.push(['_trackPageview', '/#!/cart']);
        }
    });

    //FollowBox
    $(function() {
        var followBox = $('.follow_box');
        followBox.hide();
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                followBox.fadeIn();
            } else {
                followBox.fadeOut();
            }
        });
    });
    $(function() {
        $(".follow_box .close").click(function() {
            $(".follow_box").addClass("delete");
        });
    });
</script>

<script src='//platform.twitter.com/widgets.js'></script>
<script type="text/javascript">
    if (!NREUMQ.f) {
        NREUMQ.f = function() {
            NREUMQ.push(["load", new Date().getTime()]);
            var e = document.createElement("script");
            e.type = "text/javascript";
            e.src = (("http:" === document.location.protocol) ? "http:" : "https:") + "//" +
                "js-agent.newrelic.com/nr-100.js";
            document.body.appendChild(e);
            if (NREUMQ.a) NREUMQ.a();
        };
        NREUMQ.a = window.onload;
        window.onload = NREUMQ.f;
    };
    NREUMQ.push(["nrfj", "beacon-2.newrelic.com", "34671cb182", "1739642", "cglXTEtbWAhWSx5EEl4UXEsWR1wLRA==", 0, 19, new Date().getTime(), "", "", "", "", ""]);
</script>
@stop