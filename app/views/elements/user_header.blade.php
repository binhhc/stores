<div id="header">
    <h1 id="store_logo">
        <a href="/">
            <span class="mark" ng-show="styles.logo"><img ng-src="{[logo_src]}" alt="{[styles.name]}"></span>
             <span class="txt" ng-hide="styles.logo">{[styles.name]}</span>
        </a>    
    </h1>
    <div id="navi_main" style="display:none;" ng-show="categories || hasAbout || showVirtualStore || news_navi">
        <dl style="font-family: Arial">
        <dd><a href="/">{{$store_main_menu['home_menu']}}</a></dd>
        <dd sp-controller="NewsController" addon="news" sp-show ng-show="news_navi"><a href="#!/news">TIN TỨC</a></dd>
        <dd ng-show="hasAbout"><a href="#!/about">{{$store_main_menu['about_menu']}}</a></dd>
        <dd class="btn_dropdown" ng-show="categories">
            <a href="">{{$store_main_menu['categories']}}</a>
            <ul class="dropdown">
                <li ng-repeat="category in categories"><a ng-click="category_click(category.id)">{[category.name]}</a></li>
            </ul>
        </dd>
        <dd ng-show="showVirtualStore"><a href="{[virtualStore.url]}" target="_blank">VIRTUAL STORE</a></dd>
        </dl>
    </div>
</div>