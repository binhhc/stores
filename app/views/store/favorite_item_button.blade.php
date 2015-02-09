
<!DOCTYPE html>
<html ng-app="StoresJpStoreIframe">
  <head><script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script>
    <title>お気に入りボタン</title>
    <meta name="robots" content="noindex,nofollow">
    <link media="all" type="text/css" rel="stylesheet" href="/css/application_store.css">
    <meta content="authenticity_token" name="csrf-param" />
<meta content="bYfHc2t9VpX2eE8Z6gWk6hYIeP4632X5FXeTwUdRbqg=" name="csrf-token" />
    <script src="/js/application.js"></script>
  </head>
  <body ng-controller="FavoriteItemCtrl" style="background-color:transparent;">
    <div ng-cloak class="ng-cloak">
      <div id="favorite_item" ng-init="isFavoriteItem = false; itemId = '54c743a4391bb3c77b000323'; favoriteCount = 0">
        <p class="btn_favorite" ng-hide="isFavoriteItem"><button type="button" ng-click="add()">お気に入りに追加する</button><span class="count" ng-hide="favoriteCount == 0">{[favoriteCount]}</span></p>
        <p class="btn_favorite already" ng-show="isFavoriteItem"><button type="button" ng-click="remove()">お気に入りに追加済み</button><span class="count" ng-hide="favoriteCount == 0">{[favoriteCount]}</span></p>
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
NREUMQ.push(["nrfj","beacon-2.newrelic.com","34671cb182","1739642","cglXTEtbWAhWSx5eAEMHVF0WR0ALQVweUQdHCUtRTVFrDUdcXBgERBJNV1c=",0,29,new Date().getTime(),"","","","",""]);</script></body>
</html>
