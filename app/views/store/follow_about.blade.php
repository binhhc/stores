
<!DOCTYPE html>
<html ng-app="StoresJpStoreIframe">
  <head><script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script>
    <title>ABOUT フォローボタン</title>
    <meta name="robots" content="noindex,nofollow">
    <script src="/js/application.js"></script>
    <meta content="authenticity_token" name="csrf-param" />
<meta content="bYfHc2t9VpX2eE8Z6gWk6hYIeP4632X5FXeTwUdRbqg=" name="csrf-token" />
    <link media="all" type="text/css" rel="stylesheet" href="/css/application_store.css">
    <style>
      [ng:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
        display: none !important;
      }
    </style>
  </head>
  <body ng-controller="UserCtrl" style="background-color:transparent;">
    <div ng-cloak class="ng-cloak" style="height: auto;">
      <div ng-init="isFollowing = false; storeName = 'haulenhan'; position = 'about'">
      <?php if($follow_status == 0) { ?>
        <p class="follow_btn">
        	<a href=""   user_store_id="{{md5($user_store_id)}}" follow_status="{{$follow_status}}" >{{$follow}}</a>
        </p>
       <?php }else {?>
        <p class="follow_btn already" ng-show="isFollowing" style="display: none;">
			<a href="" class="box" user_store_id="{{md5($user_store_id)}}" follow_status="{{$follow_status}}">{{$following}}</a>
		</p>
		<?php }?>
      </div>

    </div>
  <script type="text/javascript">if (!NREUMQ.f) { NREUMQ.f=function() {
NREUMQ.push(["load",new Date().getTime()]);
var e=document.createElement("script");
e.type="text/javascript";
e.src=(("http:"===document.location.protocol)?"http:":"https:") + "//" +
  "js-agent.newrelic.com/nr-100.js";
document.body.appendChild(e);
if(NREUMQ.a)NREUMQ.a();
};
NREUMQ.a=window.onload;window.onload=NREUMQ.f;
};
NREUMQ.push(["nrfj","beacon-2.newrelic.com","34671cb182","1739642","cglXTEtbWAhWSx5eAEMHVF0WR0ALQVweUQldClZPFlVWC0ZN",0,18,new Date().getTime(),"","","","",""]);</script></body>
</html>
