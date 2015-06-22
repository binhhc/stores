@include('text.header')
	 <div id="content">
  <div class="wrapper full">

    <div id="price" class="contents free" style="display:block;">
      <h2 class="heading"><strong>ABC</strong>Lorem ipsum dolor sit amet</h2>
      <p class="head_text">Lorem ipsum dolor sit amet</p>
      <ul>
        <li>
          <p class="image"> {{HTML::image('img/main_page/icon_free_design.png', ' Lorem ipsum dolor sit amet ')}}
          <h3>Lorem ipsum dolor sit amet</h3>
        </li>
        <li>
          <p class="image"> {{HTML::image('img/main_page/icon_free_item.png', ' Lorem ipsum dolor sit amet ')}}
          <h3>Lorem ipsum dolor sit amet</h3>
        </li>
        <li>
          <p class="image"> {{HTML::image('img/main_page/icon_free_download.png', 'Lorem ipsum dolor sit amet')}}
          <h3>Lorem ipsum dolor sit amet</h3>
        </li>
        <li>
          <p class="image"> {{HTML::image('img/main_page/icon_free_order.png', ' Lorem ipsum dolor sit amet ')}}
          <h3>Lorem ipsum dolor sit amet</h3>
        </li>
        <li>
          <p class="image"> {{HTML::image('img/main_page/icon_free_card.png', ' Lorem ipsum dolor sit amet ')}}
          <h3>Lorem ipsum dolor sit amet</h3>
        </li>
        <li>
          <p class="image"> {{HTML::image('img/main_page/icon_free_convenience.png', ' Lorem ipsum dolor sit amet ')}}
          <h3>Lorem ipsum dolor sit amet</h3>
        </li>
        <li>
          <p class="image"> {{HTML::image('img/main_page/icon_free_money.png', 'Lorem ipsum dolor sit amet')}}
          <h3>Lorem ipsum dolor sit amet</h3>
        </li>
        <li>
          <p class="image"> {{HTML::image('img/main_page/icon_free_promotion.png', ' Lorem ipsum dolor sit amet')}}
          <h3>Lorem ipsum dolor sit amet</h3>
        </li>
        <li>
          <p class="image"> {{HTML::image('img/main_page/icon_free_pickup.png', ' Lorem ipsum dolor sit amet ')}}
          <h3>Lorem ipsum dolor sit amet</h3>
        </li>
        <li>
          <p class="image"> {{HTML::image('img/main_page/icon_free_countries.png', ' Lorem ipsum dolor sit amet ')}}
          <h3>Lorem ipsum dolor sit amet</h3>
        </li>
      </ul>
      <p class="note">
        ※Lorem ipsum dolor sit amet<br>
        ※Lorem ipsum dolor sit amet<a href="/premium">Lorem ipsum dolor sit amet</a>Lorem ipsum dolor sit amet
      </p>
      <p class="btn_create_store cvr_top_btn"><a href="/">Lorem ipsum dolor sit amet</a></p>
    </div>


    <div id="price2" class="contents free" style="display:none;">
      <h2 class="heading">Lorem ipsum dolor sit amet</h2>
      <div class="price_growth_box">
        <div class="price_table">
          <h3>Lorem ipsum dolor sit amet</h3>
          <dl>
            <dt>Lorem ipsum dolor sit amet</dt>
            <dd>
              <p class="main first">Lorem ipsum dolor sit amet</p>
              <p class="sub first">（<a href="/premium">Lorem ipsum dolor sit amet</a>）</p>
            </dd>
          </dl>
          <dl>
            <dt>Lorem ipsum dolor sit amet</dt>
            <dd>
              <p class="main second">5<span>%</span></p>
              <p class="sub second">Hayamise.com Lorem ipsum dolor sit ametて<br>Lorem ipsum dolor sit amet</p>
            </dd>
          </dl>
        </div>
        <p class="price_table_caption_sp">※Lorem ipsum dolor sit amet</p>
        <div class="price_deposit">
          <h3>Lorem ipsum dolor sit amet</h3>
          <p class="image"> {{HTML::image('img/main_page/price_img_01.png', '  ')}}
          <p class="image_sp"> {{HTML::image('img/main_page/price_img_01_sp.png', '  ')}}
          <div class="start_table">
            <dl>
              <dt>Lorem ipsum dolor sit amet</dt>
              <dd class="start_table_discription1">Lorem ipsum dolor sit amet</dd>
            </dl>
            <dl>
              <dt>Lorem ipsum dolor sit amet</dt>
              <dd class="start_table_discription2">Lorem ipsum dolor sit amet</dd>
            </dl>
            <dl>
              <dt>Lorem ipsum dolor sit amet</dt>
              <dd class="start_table_discription3">Lorem ipsum dolor sit amet<br><span>※Lorem ipsum dolor sit amet</span></dd>
            </dl>
          </div>
        </div>
        <div class="price_top">
          <h3>Lorem ipsum dolor sit amet</h3>
          <p class="text">Lorem ipsum dolor sit amet</p>
          <p class="btn cvr_top_btn"><a href="/">Lorem ipsum dolor sit amet</a></p>
        </div>
      </div>
      <div class="price_growth_box_premium">
        <h3>Lorem ipsum dolor sit amet</h3>
        <p class="text">Lorem ipsum dolor sit amet</p>
        <div class="features">
          <dl>
            <dt> {{HTML::image('img/main_page/premium_img_01.png', '  ')}}
            <dd>Lorem ipsum dolor sit amet</dd>
          </dl>
          <dl>
            <dt> {{HTML::image('img/main_page/premium_img_02.png', '  ')}}
            <dd>Lorem ipsum dolor sit amet</dd>
          </dl>
          <dl>
            <dt> {{HTML::image('img/main_page/premium_img_03.png', '  ')}}
            <dd>Lorem ipsum dolor sit amet</dd>
          </dl>
          <dl>
            <dt> {{HTML::image('img/main_page/premium_img_04.png', '  ')}}
            <dd>Lorem ipsum dolor sit amet</dd>
          </dl>
        </div>
        <p class="addon"> {{HTML::image('img/main_page/premium_addon.png', '  ')}}
        <p class="addon_sp"> {{HTML::image('img/main_page/premium_addon_sp.png', '  ')}}
        <div class="price_top">
          <h3>Lorem ipsum dolor sit amet</h3>
          <p class="text">Lorem ipsum dolor sit amet<span>Lorem ipsum dolor sit amet</span>Lorem ipsum dolor sit amet</p>
          <p class="btn"><a href="/premium">Lorem ipsum dolor sit ametはこちら</a></p>
        </div>
      </div>
    </div>


    <ul class="breadcrumb_list">
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>&nbsp;&gt;</li>
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/price" itemprop="url"><strong itemprop="title">Giá cả</strong></a></li>
    </ul>
  </div>
</div>
@include('text.footer')
