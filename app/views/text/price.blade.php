@include('text.header')
	<div id="content">
	  <div class="wrapper">
	  	<h2 class="heading">{{$title_for_layout}}</h2>
		<div id="terms">{{$content}}</div>
		<ul class="breadcrumb_list">
			<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
				<a itemprop="url" href="/">
				<span itemprop="title">Trang chủ</span>
				</a>
				 >
			</li>
			<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
				<a itemprop="url" href="/price">
				<strong itemprop="title">Giá cả</strong>
				</a>
			</li>
		</ul>
	  </div>
  </div>
@include('text.footer')
