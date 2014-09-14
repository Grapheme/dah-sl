<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	@include('users_interface.includes.head')
	{{ HTML::style('css/jquery.rating.css') }}
</head>
<body>
	@include('users_interface.includes.ie7')
	<article class="wrapper">
		@include('users_interface.includes.header')
		<section class="review">
			<div class="waves">
				<div class="left-wave"></div>
				<h1>Отзывы</h1>
				<div class="right-wave"></div>
			</div>
			<div class="page-description">
				Нам важно ваше мнение о нашей работе. А ваш отзыв поможет<br>
				другим туристам сделать свой выбор.
			</div>
			<div class="review-form-container">
				<div class="leave-a-msg"><span>Оставить отзыв</span></div>
				@include('users_interface.forms.reviews')
			</div>
		@if($reviews->count())
			<ul class="reviews-list">
				@include('users_interface.html.reviews-list',array('reviews'=>$reviews,'raiting'=>$raiting))
				@if($more !== FALSE)
				<div id="more-list"></div>
				@endif
			</ul>
			@if($more !== FALSE)
			<div class="show-more-container">
				<div class="show-more-reviews">
					<span id="operation-more" class="no-clickable" data-skip="{{$more}}" >показать еще отзывы</span>
				</div>
			</div>
			@endif
		@endif
		</section>
		@include('users_interface.includes.footer')
	</article>
	@include('users_interface.includes.scripts')
	{{HTML::script('js/vendor/jquery.rating.pack.js');}}
	{{HTML::script('js/vendor/star-rating-init.js');}}
	@include('users_interface.includes.typekit')
	@include('users_interface.includes.analytics')
</body>
</html>