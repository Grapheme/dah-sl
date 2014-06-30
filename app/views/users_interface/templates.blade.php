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
		@if($images->count())
		<section class="room">
			<section class="index-slideshow valentine-slide">
				<div class="fotorama" data-autoplay="5000" data-loop="true" data-fit="cover">
				@foreach($images as $image)
					@if(!empty($image->link))
						<div data-img="{{$image->image['image']}}"><a href="{{$image->link}}"></a></div>
					@else
						{{ HTML::image($image->image['image']) }}
					@endif
				@endforeach
				</div>
			</section>
		</section>
		@endif
		<section class="clearfix">
			{{ $content }}
		</section>
		@include('users_interface.includes.footer')
	</article>
	@include('users_interface.includes.scripts')
	{{HTML::script('js/vendor/fotorama.js');}}
	@include('users_interface.includes.typekit')
	@include('users_interface.includes.analytics')
</body>
</html>