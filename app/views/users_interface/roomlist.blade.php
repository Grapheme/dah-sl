<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	@include('users_interface.includes.head')
	{{HTML::style('css/jquery-ui-1.10.3.custom.min.css');}}
	{{HTML::style('css/tooltip.css');}}
</head>
<body>
	@include('users_interface.includes.ie7')
	<article class="wrapper">
		@include('users_interface.includes.header')
		<section class="roomlist">
			<div class="waves">
				<div class="left-wave"></div>
				<h1>Номера</h1>
				<div class="right-wave"></div>
			</div>
			<ul class="room-list">
			@foreach($rooms as $room)
				<li class="room-item{{($room->id == 3)?' family-room':''}} clearfix">
					<div class="room-item-left">
						<a class="room-imglink" href="{{url($room->page_url)}}"></a>
						{{HTML::image($room->image)}}
						<span class="room-pict-capt">
							{{plural::pluralWords($room->place,array('место','места','мест'),'<span class="capt-num">','</span>')}}
						</span>
					</div>
					<div class="room-item-right">
						<div class="room-type big-zalamander"><a href="{{url($room->page_url);}}" class="room-link">{{$room->title}}</a></div>
						<div class="room-price big-zalamander flag">
							<div class="triangle top-angle"></div>
							<div class="triangle bottom-angle"></div>
							<div class="triangle shadow-angle"></div>
							<a href="{{url('rooms/booking',array($room->id));}}" class="reserve" title="Бронировать номер">{{$room->price}}.–</a>
						</div>
						<div class="room-order">
							<a href="{{('about#housing-'.$room->housing);}}" target="_blank" class="htg-there-link">корпус № {{$room->housing}}</a>
						</div>
						<div class="room-desc">
							{{$room->small_description}}
						</div>
						<ul class="comfort-list clearfix">
						@foreach ($properties as $property)
							@if(in_array($property->id,$room->properties))
								<li title="{{$property->title}}" class="comfort-item {{$property->class_name}}"></li>
							@endif
						@endforeach
						</ul>
					</div>
				</li>
			@endforeach
			</ul>
		</section>
		@include('users_interface.includes.footer')
	</article>
	@include('users_interface.includes.scripts')
	{{HTML::script('js/vendor/jquery-ui-1.10.3.custom.min.js');}}
	{{HTML::script('js/vendor/tooltip-init.js');}}
	@include('users_interface.includes.typekit')
	@include('users_interface.includes.analytics')
</body>
</html>