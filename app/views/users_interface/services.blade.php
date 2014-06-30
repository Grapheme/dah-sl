<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	@include('users_interface.includes.head')
</head>
<body>
	@include('users_interface.includes.ie7')
	<article class="wrapper">
		@include('users_interface.includes.header')
		<section class="services-section">
			<div class="waves">
				<div class="left-wave"></div>
				<h1>Услуги</h1>
				<div class="right-wave"></div>
			</div>
			<ul class="offers-list clearfix">
				<li class="offers-item meal">
					<div class="offers-bg">
						{{HTML::image('img/services/01.jpg')}}
					</div>
					<div class="offers-cont">
						<div class="offers-item-cont">
							<h2 class="offers-header">
								<span class="caps">Более</span><br>
								<span class="caps">200 блюд</span><br>
								в меню
							</h2>
						</div>
					</div>
					<a class="full-link" href="{{url('restaurant');}}">
						<span class="wo-line-link-container">
							<span class="offers-link wo-line-link">
								<span class="dec-arrow"></span>Кафе
							</span>
						</span>
					</a>
				</li>
			@foreach($services AS $service)
				<li class="offers-item meal">
					<div class="offers-bg">
						<img src="{{asset($service->photo);}}">
					</div>
					<div class="offers-cont">
						<div class="offers-item-cont">
							<h2 class="offers-header">{{$service->list_text}}</h2>
						</div>
					</div>
					<a class="full-link" href="{{(!empty($service->description))?url('services/'.$service->page_url):'#';}}">
						<span class="wo-line-link-container">
							<span class="offers-link wo-line-link">
								<span class="dec-arrow"></span>
								{{$service->title}}
							</span>
						</span>
					</a>
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