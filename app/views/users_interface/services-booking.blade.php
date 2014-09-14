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
		<section class="booking-section">
			<div class="waves">
				<div class="left-wave"></div>
				<h1>Бронирование</h1>
				@if(Session::has('message'))
					<div class="booking-main-error">{{Session::get('message')}}</div>
				@endif
				<div class="booking-main-error hidden">Неверно заполнены обязательные поля</div>
				<div class="right-wave"></div>
			</div>
			<div class="booking-main">
				@include('users_interface.forms.service-booking-form',array('services'=>$services,'errors'=>$errors))
			</div>
		</section>
		@include('users_interface.includes.footer')
	</article>
	@include('users_interface.includes.scripts')
	{{HTML::script('js/vendor/jquery.selectbox.min.js');}}
	@include('users_interface.includes.datapicker')
	@include('users_interface.includes.typekit')
	@include('users_interface.includes.analytics')
</body>
</html>