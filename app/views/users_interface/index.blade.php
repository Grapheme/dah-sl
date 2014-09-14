<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	@include('users_interface.includes.head')
	{{ HTML::style('css/datepicker.css') }}
</head>
<body>
	@include('users_interface.includes.ie7')
	<article class="wrapper">
		@include('users_interface.includes.header')
		@if(!empty($images))
		<section class="index-slideshow">
			<div class="fotorama" data-autoplay="5000" data-loop="true">
			@foreach($images as $image)
				@if(!empty($image->link))
					<div data-img="{{$image->image['image']}}"><a href="{{$image->link}}"></a></div>
				@else
					{{ HTML::image($image->image['image']) }}
				@endif
			@endforeach
			</div>
		</section>
		@endif
		<section class="offers clearfix">
			<ul class="offers-list clearfix">
				<li class="offers-item complex">
					<a class="index-banner-link" href="{{url('about');}}"></a>
					<div class="offers-bg">
						{{ HTML::image('img/offers/01.jpg') }}
					</div>
					<div class="offers-cont">
						<div class="top-line"></div>
						<div class="offers-item-cont">
							<h2 class="offers-header"><span class="normal">3 000 м<span class="sup">2</span></span>
							<br>
							ухоженной
							<br>
							территории</h2>
						</div>
						<div class="bottom-line"></div>
						<div class="offers-link"><span class="dec-arrow"></span>Комплекс</div>
					</div>
				</li>
				<li class="offers-item numbers">
					<a class="index-banner-link" href="{{url('rooms');}}"></a>
					<div class="offers-bg">
						{{ HTML::image('img/offers/02.jpg') }}
					</div>
					<div class="offers-cont">
						<div class="top-line"></div>
						<div class="offers-item-cont">
							<h2 class="offers-header"><span class="caps">Уютные
								<br>
								номера</span>
							<br>
							от 2 200.–</h2>
						</div>
						<div class="bottom-line"></div>
						<div class="offers-link"><span class="dec-arrow"></span>Номера</div>
					</div>
				</li>
				<li class="offers-item booking">
					<div class="offers-item-cont">
						@include('users_interface.forms.reservation',array('rooms'=>$rooms))
					</div>
				</li>
				<li class="offers-item services">
					<a class="index-banner-link" href="{{url('services');}}"></a>
					<div class="offers-bg">
						{{ HTML::image('img/offers/03.jpg') }}
					</div>
					<div class="offers-cont">
						<div class="top-line"></div>
						<div class="offers-item-cont">
							<h2 class="offers-header"><span class="caps">Баня</span>
							<br>
							с купелью
							<br>
							<span class="caps">круглый год</span></h2>
						</div>
					</div>
					<div class="wo-line-link-container">
						<div class="offers-link wo-line-link"><span class="dec-arrow"></span>Услуги</div>
					</div>
				</li>
				<li class="offers-item actions">
					<a class="index-banner-link" href="{{url('services/provedenie-svadeb');}}"></a>
					<div class="offers-bg">
						{{ HTML::image('img/offers/00.jpg') }}
					</div>
					<div class="offers-cont">
						<div class="top-line"></div>
						<div class="offers-item-cont">
							<h2 class="offers-header"><span class="caps">НОМЕР</span>
							<br>
							для молодоженов<br>
							В ПОДАРОК</h2>
						</div>
					</div>
					<div class="wo-line-link-container">
						<div class="offers-link wo-line-link"><span class="dec-arrow"></span>Акции</div>
					</div>
				</li>
				<li class="offers-item meal">
					<a class="index-banner-link" href="{{url('restaurant');}}"></a>
					<div class="offers-bg">
						{{ HTML::image('img/offers/05.jpg') }}
					</div>
					<div class="offers-cont">
						<div class="top-line"></div>
						<div class="offers-item-cont">
							<h2 class="offers-header"><span class="caps">Завтрак</span>
							<br>
							включен
							<br>
							в стоимость
							<br>
							проживания</h2>
						</div>
					</div>
					<div class="wo-line-link-container">
						<div class="offers-link wo-line-link"><span class="dec-arrow"></span>Кафе</div>
					</div>
				</li>
			</ul>
		</section>
		<section class="sights">
			<div class="waves">
				<div class="left-wave"></div>
				<h2>Что смотреть?</h2>
				<div class="right-wave"></div>
			</div>
			<div class="jcarousel-wrapper">
				<div class="jcarousel">
					<ul class="sights-list">
					@foreach($sights AS $sight)
						<li class="sight-item">
							<div class="sight-item-cont">
								<a class="sight-item-link" href="{{(!empty($sight->description))?url('sights/'.$sight->url):'#';}}"></a>
								<div class="sight-pict">
									{{ HTML::image($sight->photo) }}
								</div>
								<div class="sight-capt">
									<?=$sight->title?>
								</div>
							</div>
						</li>
					@endforeach
					</ul>
				</div>
				<a href="#" class="jcarousel-control-prev"></a>
				<a href="#" class="jcarousel-control-next"></a>
				<p class="jcarousel-pagination"></p>
			</div>
		</section>
		<section class="facilities">
			{{ Page::getField('page_content') }}
		</section>
		@include('users_interface.includes.footer')
	</article>
	@include('users_interface.includes.scripts')
	@include('users_interface.html.index-scripts')
	{{HTML::script('js/vendor/jquery.simpleWeather-2.3.min.js');}}
	{{HTML::script('js/vendor/weather-init.js');}}
	@include('users_interface.includes.datapicker')
	@include('users_interface.includes.typekit')
	@include('users_interface.includes.analytics')
</body>
</html>