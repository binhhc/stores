@include('text.header_simple')
	  <div id="content">
  <div id="faq_list" class="wrapper">
    <h2 class="heading"><a href="#">Lorem ipsum dolor sit amet,</a></h2>
    <div id="faq_search">
      <form method="GET" action="/faq/search" ng-submit="search(event)">
        <input type="text" placeholder="Lorem ipsum dolor sit amet," name="q" ng-model="search_word">
        <input type="submit" value="">
      </form>
    </div>
    <ul>
      <li>
        <a href="#about">
          <p class="icon"> {{HTML::image('img/main_page/icon_about.png', ' Lorem ipsum dolor sit amet, ')}}
          <p class="icon_sp"> {{HTML::image('img/main_page/icon_about_sp.png', ' Lorem ipsum dolor sit amet,')}}
          <div class="title">
            <h3>Lorem ipsum dolor sit amet</h3>
            <p class="text">Lorem ipsum dolor sit amet,</p>
          </div>
        </a>
      </li>
      <li>
        <a href="#premium">
          <p class="icon"> {{HTML::image('img/main_page/icon_premium_faq.png', ' Lorem ipsum dolor sit amet, ')}}
          <p class="icon_sp"> {{HTML::image('img/main_page/icon_premium_sp.png', ' Lorem ipsum dolor sit amet, ')}}
          <div class="title">
            <h3>Lorem ipsum dolor sit amet,</h3>
            <p class="text">Lorem ipsum dolor sit amet,</p>
          </div>
        </a>
      </li>
      <li>
        <a href="#store">
          <p class="icon"> {{HTML::image('img/main_page/icon_store_faq.png', ' Lorem ipsum dolor sit amet, ')}}
          <p class="icon_sp"> {{HTML::image('img/main_page/icon_store_sp.png', ' Lorem ipsum dolor sit amet,')}}
          <div class="title">
            <h3>Lorem ipsum dolor sit amet,</h3>
            <p class="text">Lorem ipsum dolor sit amet,</p>
          </div>
        </a>
      </li>
      <li>
        <a href="#order">
          <p class="icon"> {{HTML::image('img/main_page/icon_order2.png', ' Lorem ipsum dolor sit amet, ')}}
          <p class="icon_sp"> {{HTML::image('img/main_page/icon_order2_sp.png', 'Lorem ipsum dolor sit amet, ')}}
          <div class="title">
            <h3>Lorem ipsum dolor sit amet,</h3>
            <p class="text">Lorem ipsum dolor sit amet,</p>
          </div>
        </a>
      </li>
      <li class="end">
        <a href="#dashboard">
          <p class="icon"> {{HTML::image('img/main_page/icon_dashboard.png', ' Lorem ipsum dolor sit amet,')}}
          <p class="icon_sp"> {{HTML::image('img/main_page/icon_dashboard_sp.png', ' Lorem ipsum dolor sit amet, ')}}
          <div class="title">
            <h3>Lorem ipsum dolor sit amet,</h3>
            <p class="text">Lorem ipsum dolor sit amet,</p>
          </div>
        </a>
      </li>
      <li>
        <a href="#support/photo">
          <p class="icon"> {{HTML::image('img/main_page/icon_support.png', ' Lorem ipsum dolor sit amet, ')}}
          <p class="icon_sp"> {{HTML::image('img/main_page/icon_support_sp.png', ' Lorem ipsum dolor sit amet, ')}}
          <div class="title">
            <h3>Lorem ipsum dolor sit amet,</h3>
            <p class="text">Lorem ipsum dolor sit amet,</p>
          </div>
        </a>
      </li>
      <li>
        <a href="#payment/cc">
          <p class="icon"> {{HTML::image('img/main_page/icon_payment2.png', ' Lorem ipsum dolor sit amet, ')}}
          <p class="icon_sp"> {{HTML::image('img/main_page/icon_payment2_sp.png', ' Lorem ipsum dolor sit amet, ')}}
          <div class="title">
            <h3>Lorem ipsum dolor sit amet,</h3>
            <p class="text">Lorem ipsum dolor sit amet,</p>
          </div>
        </a>
      </li>
      <li>
        <a href="#promotion">
          <p class="icon"> {{HTML::image('img/main_page/icon_promotion.png', ' Lorem ipsum dolor sit amet, ')}}
          <p class="icon_sp"> {{HTML::image('img/main_page/icon_promotion_sp.png', ' Lorem ipsum dolor sit amet, ')}}
          <div class="title">
            <h3>Lorem ipsum dolor sit amet</h3>
            <p class="text">Lorem ipsum dolor sit amet,</p>
          </div>
        </a>
      </li>
      <li>
        <a href="#addon">
          <p class="icon"> {{HTML::image('img/main_page/icon_addon.png', ' Lorem ipsum dolor sit amet, ')}}
          <p class="icon_sp"> {{HTML::image('img/main_page/icon_addon_sp.png', ' Lorem ipsum dolor sit amet, ')}}
          <div class="title">
            <h3>Lorem ipsum dolor sit amet,</h3>
            <p class="text">Lorem ipsum dolor sit amet,</p>
          </div>
        </a>
      </li>
      <li class="end sp_end">
        <a href="#follow">
          <p class="icon"> {{HTML::image('img/main_page/icon_follow.png', ' Lorem ipsum dolor sit amet,')}}
          <p class="icon_sp"> {{HTML::image('img/main_page/icon_follow_sp.png', ' Lorem ipsum dolor sit amet,')}}
          <div class="title">
            <h3>Lorem ipsum dolor sit amet,</h3>
            <p class="text">Lorem ipsum dolor sit amet,</p>
          </div>
        </a>
      </li>
    </ul>
  </div>
    <!-- Contact/ -->
    <div id="faq_contact">
      <div class="heading_faq">Nhân viên toàn thời gian vui lòng hỗ trợ</div>
      <ul>
        <li class="mail">
          <a href="/contact">
            <p>Liên hệ qua email</p>
          </a>
        </li>
      </ul>
    </div>
  <!-- /Contact -->
</div>
<div id="faq_breadcrumb_list">
  <ul class="breadcrumb_list">
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>&nbsp;&gt;</li>
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/faq" itemprop="url"><strong itemprop="title">FAQ</strong></a></li>
  </ul>
</div>
@include('text.footer')
