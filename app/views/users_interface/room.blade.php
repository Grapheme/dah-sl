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
		<section class="room">
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
				<h1>{{{$page->page_h1}}}</h1>
				<div class="right-wave"></div>
			</div>
			<div class="roomcount">
				<div class="room-roomcount">
					<div class="triangle top-angle left-side"></div>
					<div class="triangle bottom-angle left-side"></div>
					{{plural::pluralWords($room->place,array('место','места','мест'))}}
					<div class="triangle top-angle right-side"></div>
					<div class="triangle bottom-angle right-side"></div>
				</div>
			</div>
			{{$room->description}}
			<div class="room-price-block">
				<div class="single-wave-item"></div>
				<div class="single-wave-container">
					<div class="page-description">
						Стоимость номера в сутки:
					</div>
					<div class="single-price">
						<small>от</small> {{{$room->price}}}.- 
					</div>
					<p style="text-align: center;">
						<a href="http://dah-sl.ru/prices_new">прейскурант цен на 2015 г.</a> <br>
					</p>
					<a href="{{url('rooms/booking',array($room->id));}}" class="reserve">&nbsp;</a>
				</div>
				<div class="single-wave-item"></div>
			</div>
			<div class="ribbon">
				<div class="ribbon-body">
					<div class="ribbon-inner">
						<div class="ribbon-inner-content">
							Оплачивая номер на 9 суток -<br>
							10-ые сутки Вы получаете В ПОДАРОК
						</div>
					</div>
					<div class="subflag left-subflag">
						<div class="top-dec-line"></div>
						<div class="triangle top-angle"></div>
						<div class="triangle bottom-angle"></div>
						<div class="triangle shadow-angle"></div>
					</div>
					<div class="subflag right-subflag">
						<div class="top-dec-line"></div>
						<div class="triangle top-angle"></div>
						<div class="triangle bottom-angle"></div>
						<div class="triangle shadow-angle"></div>
					</div>
				</div>
			</div>
		</section>
		@include('users_interface.includes.footer')
	</article>
	@include('users_interface.includes.scripts')
	{{HTML::script('js/vendor/fotorama.js');}}
	@include('users_interface.includes.typekit')
	@include('users_interface.includes.analytics')
</body>
</html>