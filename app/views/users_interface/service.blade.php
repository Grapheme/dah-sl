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
		<section class="billiards single-service">
		@if($images->count())
			<section class="index-slideshow">
				<div class="fotorama">
				@foreach($images as $image)
					<a href="{{url($image->image['image'])}}"></a>
				@endforeach
				</div>
			</section>
		@endif
			<div class="waves">
				<div class="left-wave"></div>
				<h1>{{$service->title;}}</h1>
				<div class="right-wave"></div>
			</div>
			<div class="page-description">
				<?=$service->short_description;?>
			</div>
			<div class="facilities-desc clearfix">
				{{$service->description;}}
			@if(!empty($service->prices))
				{{$service->prices;}}
			@endif
			</div>
		@if($service->booking == 1)
			<div class="room-price-block">
				<div class="single-wave-item"></div>
				<div class="single-wave-container">
					<div class="page-description">
						Отправьте заявку на проведение мероприятия
					</div>
					<div class="single-price"></div>
					<a href="{{url('services/booking',array($service->id));}}" class="reserve">&nbsp;</a>
				</div>
				<div class="single-wave-item"></div>
			</div>
		@endif
		</section>
		@include('users_interface.includes.footer')
	</article>
	@include('users_interface.includes.scripts')
	{{HTML::script('js/vendor/fotorama.js');}}
	@include('users_interface.includes.typekit')
	@include('users_interface.includes.analytics')
</body>
</html>