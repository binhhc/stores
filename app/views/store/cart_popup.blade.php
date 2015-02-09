
<!DOCTYPE html>
<html ng-app="StoresJpStoreIframe">
  <head><script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script>
    <title>ストア カートポップアップ 購入ボタン</title>
    <meta name="robots" content="noindex,nofollow">
    <script src="/js/application.js"></script>
    <link media="all" type="text/css" rel="stylesheet" href="/css/application_store.css">
    <style>
      [ng:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
        display: none !important;
      }
    </style>
    <script>
      // iframeの高さを自動調整
      /*
      var iframeHeight = function(){
        if(!window.parent.document) return false;

        try { // !IE
          document.styleSheets[0].insertRule( 'html' + '{overflow:hidden;}', document.styleSheets[0].cssRules.length );
        } catch (e) { // IE
          document.styleSheets[0].addRule( 'html', '{overflow:hidden;}');
        }

        height = document.getElementsByTagName('div')[0].offsetHeight;
        window.parent.document.getElementById('cart_popup').style.height = height + 'px';

        setTimeout('iframeHeight()',0)
      }
      try {
        window.addEventListener('load', iframeHeight, false);
      } catch (e) {
        window.attachEvent('onload', iframeHeight);
      }
      */
    </script>
  </head>

  <body ng-controller="UserCtrl" style="background-color:transparent;">
    <div ng-cloak class="ng-cloak" id="cart_popup">
      <p class="btn_high_big" style="height:70px;"><a href="" parent-href="{url: '/#!/checkout'}">注文画面へ進む</a></p>
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
NREUMQ.push(["nrfj","beacon-2.newrelic.com","34671cb182","1739642","cglXTEtbWAhWSx5eAEMHVF0WR0ALQVweUQldClZPFldVFkdmQVgWRBY=",0,11,new Date().getTime(),"","","","",""]);</script></body>
</html>
