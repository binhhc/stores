<?php  $user = Session::get('user');?>
<?php if(!empty($user)) {?>
@include('text.header_simple')
<?php } else {?>
@include('text.header')
<?php }?>
	<div id="content">
	  <div class="wrapper">
	  	<h2 class="heading">{{$title_for_layout}}</h2>
		<div id="terms">
      <h3 id="chapter_1">Lorem ipsum dolor sit amet</h3>
      <h4>Lorem ipsum dolor sit amet</h4>
      <dl>
        <dt>（1）Lorem ipsum dolor sit amet</dt>
        <dd>Lorem ipsum dolor sit amet</dd>
        <dt>（2）Lorem ipsum dolor sit amet</dt>
        <dd>STORES.jp</dd>
        <dt>（3）Lorem ipsum dolor sit amet</dt>
        <dd>Lorem ipsum dolor sit amet</dd>
        <dt>（4）Lorem ipsum dolor sit amet</dt>
        <dd>Lorem ipsum dolor sit amet</dd>
        <dt>（5）Lorem ipsum dolor sit amet</dt>
        <dd>Lorem ipsum dolor sit amet</dd>
        <dt>（6）Lorem ipsum dolor sit amet</dt>
        <dd>Lorem ipsum dolor sit amet</dd>
        <dt>（7）Lorem ipsum dolor sit amet</dt>
        <dd>Lorem ipsum dolor sit amet</dd>
        <dt>（8）Lorem ipsum dolor sit amet</dt>
        <dd>Lorem ipsum dolor sit amet</dd>
      </dl>
      <h4>Lorem ipsum dolor sit amet</h4>
      <p>Lorem ipsum dolor sit amet</p>
      <h4>Lorem ipsum dolor sit amet</h4>
      <ol>
        <li>Lorem ipsum dolor sit amet。</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
      </ol>
      <h3 id="chapter_2">Lorem ipsum dolor sit amet</h3>
      <h4>Lorem ipsum dolor sit amet</h4>
      <ol>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
      </p>
      <h4>Lorem ipsum dolor sit amet</h4>
      <p>Lorem ipsum dolor sit amet
      </p>
      <ol>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        </ol>
      <p>Lorem ipsum dolor sit amet</p>
      <h4>Lorem ipsum dolor sit amet】</h4>
       <ol>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        </ol>
    </div>
		<ul class="breadcrumb_list">
			<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
				<a itemprop="url" href="/">
				<span itemprop="title">Trang chủ</span>
				</a>
				 >
			</li>
			<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
				<a itemprop="url" href="/terms">
				<strong itemprop="title">Điều khoản sử dụng</strong>
				</a>
			</li>
		</ul>
	  </div>
  </div>
@include('text.footer')
