@include('text.header')
	<div id="features" ng-controller="TopController" ng-init="features()">
  <div id="features_contents">
    <!-- FeaturesDesign/ -->
    <div id="features_design">
      <div class="wrapper">
        <h2>Tuỳ chỉnh thiết kế cửa hàng</h2>
        <p class="text">Mọi người đều  có thể tuỳ chỉnh thiết kế của cửa hàng mình bằng cách chọn kiểu bố trí yêu thích,<br>
      thay đổi hình ảnh đại diện, màu nền và chữ.</p>
        <div id="viewer">
        {{HTML::image('img/main_page/image_design_01.png')}}
        </div>
      </div>
    </div>
    <!-- /FeaturesDesign -->
    <!-- FeaturesItem/ -->
    <div id="features_item">
      <div class="wrapper">
        <div class="text_container">
          <h2>Bán các mặt hàng</h2>
          <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br/> enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <p class="image">
        	{{HTML::image('img/main_page/image_item.png')}}
        </p>
      </div>
    </div>
    <!-- /FeaturesItem -->
    <!-- FeaturesMobile/ -->
    <div id="features_mobile">
      <div class="wrapper">
        <div class="text_container">
          <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
          <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </div>
        <p class="image">
        {{HTML::image('img/main_page/image_mobile.png')}}
        </p>
      </div>
    </div>
    <!-- /FeaturesMobile -->
    <!-- FeaturesOrder/ -->
    <div id="features_order">
      <div class="wrapper">
        <div class="text_container">
          <h2>Lorem ipsum dolor sit amet</h2>
          <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit。</p>
        </div>
        <p class="image">
        {{HTML::image('img/main_page/image_order.png')}}
        </p>
      </div>
    </div>
    <!-- /FeaturesOrder -->
    <!-- FeaturesCard/ -->
    <div id="features_card">
      <div class="wrapper">
        <div class="text_container">
          <h2>Lorem ipsum dolor sit amet</h2>
          <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit。</p>
          <p class="note">※Lorem ipsum dolor sit amet, consectetur adipiscing elit。</p>
        </div>
        <p class="image">
        {{HTML::image('img/main_page/image_card.png')}}
        </p>
      </div>
    </div>
    <!-- /FeaturesCard -->
    <!-- FeaturesConvenienceStore/ -->
    <div id="features_convenience_store">
      <div class="wrapper">
        <div class="text_container">
          <h2>Lorem ipsum dolor sit amet</h2>
          <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit</p>
          <p class="note">※Lorem ipsum dolor sit amet, consectetur adipiscing elit。</p>
        </div>
        <p class="image">
        {{HTML::image('img/main_page/image_convenience_store.png')}}
        </p>
      </div>
    </div>
    <!-- /FeaturesConvenienceStore -->
    <!-- FeaturesMoney/ -->
    <div id="features_money">
      <div class="wrapper">
        <div class="text_container">
          <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
          <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit。</p>
          <p class="note">※Lorem ipsum dolor sit amet, consectetur adipiscing elit。</p>
        </div>
        <p class="image">
        {{HTML::image('img/main_page/image_money.png')}}
        </p>
      </div>
    </div>
    <!-- /FeaturesMoney -->
    <!-- FeaturesPromotion/ -->
    <div id="features_promotion">
      <div class="wrapper">
        <div class="text_container">
          <h2>Lorem ipsum dolor sit amet</h2>
          <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit</p>
          <p class="text"><a class="allow" href="/faq/promotion#alliance_list" target="_blank">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></p>
        </div>
        <p class="image">
        {{HTML::image('img/main_page/image_promotion.png')}}
        </p>
      </div>
    </div>
    <!-- /FeaturesPromotion -->
    <!-- FeaturesPickup/ -->
    <div id="features_pickup">
      <div class="wrapper">
        <div class="text_container">
          <h2>Lorem ipsum dolor sit amet</h2>
          <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit</p>
          <p class="note">※Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </div>
        <p class="image">
        {{HTML::image('img/main_page/image_pickup.png')}}
        </p>
      </div>
    </div>
    <!-- /FeaturesPickup -->
    <!-- FeaturesDomain/ -->
    <div id="features_domain">
      <div class="wrapper">
        <div class="text_container">
          <h2>Lorem ipsum t<span class="ribbon">
          {{HTML::image('img/main_page/premium_feature.png')}}
          </span></h2>
          <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit。</p>
        </div>
        <p class="image">
        	{{HTML::image('img/main_page/image_domain.png')}}
        </p>
      </div>
    </div>
    <!-- /FeaturesDomain -->
    <!-- FeaturesAddon/ -->
    <div id="features_addon">
      <div class="wrapper">
        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit<span class="ribbon">{{HTML::image('img/main_page/premium_feature.png')}}</span></h2>
        <div class="image_wrapper">
          <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
          <p class="image pc">
          {{HTML::image('img/main_page/image_addon.png')}}
          </p>

          <p class="image sp">
          {{HTML::image('img/main_page/image_addon_sp.png')}}
          </p>
        </div>
        <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        <p class="btn_create_store"><a href="/">Lorem ipsum dolor sit amet, consectetur adipiscing elit!</a></p>
      </div>
    </div>
    <!-- /FeaturesAddon -->
  </div>
  <div class="breadcrumb_box">
    <ul class="breadcrumb_list">
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>&nbsp;&gt;</li>
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/features" itemprop="url"><strong itemprop="title">Chức năng</strong></a></li>
    </ul>
  </div>
</div>
@include('text.footer')
