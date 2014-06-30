<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	@include('users_interface.includes.head')
	{{ HTML::style('css/intro-italic.css') }}
</head>
<body>
	@include('users_interface.includes.ie7')
	<article class="wrapper">
		@include('users_interface.includes.header')
		<section class="sights-page">
			<div class="waves">
				<div class="left-wave"></div>
				<h1>Что смотреть</h1>
				<div class="right-wave"></div>
			</div>
			<div class="sights-switcher">
				<span class="sights-map active"><span class="switcher-inner">Карта</span></span>
				<span class="sights-photos"><span class="switcher-inner">Список</span></span>
			</div>
			<section class="map">
				<img class="main-map" src="img/shema.png" alt="">
				<a href="{{url('sights/maikopskaya-sobornaya-mechet')}}" target="_blank" class="map-link mechet">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/mechet.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/mechet.png" alt="">
					</div>
					<span class="site-caption">Майкопская<br>соборная мечеть</span>
				</a>
				<a href="{{url('sights/svyato-mihailovskii-monastyr')}}" target="_blank" class="map-link monastery">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/monast.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/monast.png" alt="">
					</div>
					<span class="site-caption">Свято-<br>Михайловский<br>монастырь</span>
				</a>
				<a href="{{url('sights/vodopady-rufabgo')}}" target="_blank" class="map-link rufabgo">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/waterfall.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/waterfall.png" alt="">
					</div>
					<span class="site-caption">Водопады<br>Руфабго</span>
				</a>
				<a href="#" class="map-link dahcave" target="_blank">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/b_cave.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/b_cave.png" alt="">
					</div>
					<span class="site-caption">пещера Даховская</span>
				</a>
				<a href="{{url('sights/kazachiy-kamen')}}" target="_blank" class="map-link kazstone">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/stone.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/stone.png" alt="">
					</div>
					<span class="site-caption">Казачий<br>камень</span>
				</a>
				<a href="#" target="_blank" class="map-link nezhcave">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/b_cave.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/b_cave.png" alt="">
					</div>
					<span class="site-caption">пещера<br>Нежная</span>
				</a>
				<a href="#" target="_blank" class="map-link pyatpole">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/horse.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/horse.png" alt="">
					</div>
					<span class="site-caption">Пятигорская<br>поляна</span>
				</a>
				<a href="{{url('sights/gora-trezubets')}}" target="_blank" class="map-link trezmount">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/mountain.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/mountain.png" alt="">
					</div>
					<span class="site-caption">гора Трезубец</span>
				</a>
				<a href="#" target="_blank" class="map-link waterfalls">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/waterfall.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/waterfall.png" alt="">
					</div>
					<span class="site-caption">водопады</span>
				</a>
				<a href="{{url('sights/azishskaya-peshera')}}" target="_blank" class="map-link azishcave">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/b_cave.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/b_cave.png" alt="">
					</div>
					<span class="site-caption">пещера Азишская</span>
				</a>
				<a href="{{url('sights/partizanskaya-polyana')}}" target="_blank" class="map-link partpole">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/flag.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/flag.png" alt="">
					</div>
					<span class="site-caption">Партизанская<br>поляна</span>
				</a>
				<a href="{{url('sights/dolmen')}}" target="_blank" class="map-link dolmen">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/dolmen.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/dolmen.png" alt="">
					</div>
					<span class="site-caption">дольмен</span>
				</a>
				<a href="{{url('sights/plato-lago-naki')}}" target="_blank" class="map-link lagonaki">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/mountain.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/mountain.png" alt="">
					</div>
					<span class="site-caption">плато Лагонаки</span>
				</a>
				<a href="{{url('sights/guamskoe-ushelie')}}" target="_blank" class="map-link guamcave">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/flag.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/flag.png" alt="">
					</div>
					<span class="site-caption">Гуамское ущелье</span>
				</a>
				<a href="{{url('sights/hadjohskaya-tesnina');}}" target="_blank" class="map-link hadzhtes">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/flag.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/flag.png" alt="">
					</div>
					<span class="site-caption">Хаджохская<br>теснина</span>
				</a>
				<a href="#" target="_blank" class="map-link ancientgrot">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/cave.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/cave.png" alt="">
					</div>
					<span class="site-caption">Грот древнего<br>человека</span>
				</a>
				<a href="#" target="_blank" class="map-link mezmai">
					<div class="cond-container">
						<img class="main-img" src="img/map/sites/flag.png" alt="">
						<img class="shadow" src="img/map/sites/shadows/flag.png" alt="">
					</div>
				</a>
			</section>
			<ul class="sights-list">
			@foreach($sights AS $sight)
				<li class="sight-item">
					<a class="sight-item-link" href="{{(!empty($sight->description))?url($sight->page_url):'#'}}"></a>
					<div class="sight-item-cont">
						<div class="sight-pict">
							{{HTML::image($sight->photo)}}
						</div>
						<div class="sight-capt">
							{{$sight->title}}
						</div>
					</div>
				</li>
			@endforeach
			</ul>
		</section>
		@include('users_interface.includes.footer')
	</article>
	@include('users_interface.includes.scripts')
	@include('users_interface.includes.typekit')
	@include('users_interface.includes.analytics')
</body>
</html>