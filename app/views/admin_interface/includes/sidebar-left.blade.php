<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
	<div class="list-group">
		<a href="{{url('control-panel/rooms');}}" class="list-group-item{{(Request::segment(2) == 'rooms')?' active':''}}">Номера</a>
		<a href="{{url('control-panel/room_properties');}}" class="list-group-item{{(Request::segment(2) == 'room_properties')?' active':''}}">Оснащения</a>
		<a href="{{url('control-panel/reviews');}}" class="list-group-item{{(Request::segment(2) == 'reviews')?' active':''}}">Отзывы</a>
		<a href="{{url('control-panel/news');}}" class="list-group-item{{(Request::segment(2) == 'news')?' active':''}}">Новости</a>
		<a href="{{url('control-panel/pages');}}" class="list-group-item{{(Request::segment(2) == 'pages')?' active':''}}">Страницы</a>
		<a href="{{url('control-panel/bills');}}" class="list-group-item{{(Request::segment(2) == 'bills')?' active':''}}">Счета</a>
		<a href="{{url('control-panel/services');}}" class="list-group-item{{(Request::segment(2) == 'services')?' active':''}}">Услуги</a>
		<a href="{{url('control-panel/sights');}}" class="list-group-item{{(Request::segment(2) == 'sights')?' active':''}}">Достопримечательности</a>
		<a href="{{url('control-panel/password-remind');}}" class="list-group-item{{(Request::segment(2) == 'password-remind')?' active':''}}">Сброс пароля</a>
		<a href="{{url('control-panel/actions');}}" class="list-group-item{{(Request::segment(2) == 'actions')?' active':''}}">Акции</a>
	</div>
</div>