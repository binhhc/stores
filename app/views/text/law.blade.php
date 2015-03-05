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
      <h4>1．Lorem ipsum dolor sit amet</h4>
      <p>
       Lorem ipsum dolor sit ametLorem ipsum dolor sit amet。<br>
      Lorem ipsum dolor sit ametLorem ipsum dolor sit amet
      </p>
      <h4>2．Lorem ipsum dolor sit amet</h4>
      <ol>
        <li>Lorem ipsum dolor sit amet。</li>
        <li>Lorem ipsum dolor sit amet。</li>
      </ol>
      <h4>3．Lorem ipsum dolor sit amet</h4>
      <p>Lorem ipsum dolor sit amet</p>
      <h4>4．Lorem ipsum dolor sit amet</h4>
      <p>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>
      <h4>Lorem ipsum dolor sit amet</h4>
      <p>
        Lorem ipsum dolor sit amet<br>
       Lorem ipsum dolor sit amet<br>
       Lorem ipsum dolor sit amet<br>
        Lorem ipsum dolor sit amet<br>
        Lorem ipsum dolor sit amet<br>
       Lorem ipsum dolor sit amet<br>
       Lorem ipsum dolor sit amet<br>
      </p>
      <h4>Lorem ipsum dolor sit amet</h4>
      <p>
        Lorem ipsum dolor sit amet<br>
        Lorem ipsum dolor sit amet
      </p>
    </div>
		<ul class="breadcrumb_list">
			<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
				<a itemprop="url" href="/">
				<span itemprop="title">Trang chủ</span>
				</a>
				 >
			</li>
			<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
				<a itemprop="url" href="/law">
				<strong itemprop="title">Luật thương mại</strong>
				</a>
			</li>
		</ul>
	  </div>
  </div>
@include('text.footer')
