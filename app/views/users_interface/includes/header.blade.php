<header>
	<div class="htg-there">
		<a class="htg-there-link" href="{{url('contacts') . '#how-to-get';}}">Как добраться?</a>
	</div>
	<div class="htg-there payment-link">
		<a class="htg-there-link payment-link" href="{{url('payment');}}">Оплата брони</a>
	</div>
	<div class="contact-nums">
		<div class="tel-sign">
			Бронирование номеров с 8 до 22 часов:
		</div>
		<address>
			<a class="telephone-link" href="tel:+79184223862">8(918) 422-38-62</a>
			<a class="telephone-link" href="tel:+79284712000">8(928) 471-20-00</a>
		</address>
		<!--<div class="book-sign"></div>-->
	</div>
	<div id="mobile-trigger"></div>
	<nav>
		<ul class="nav-list clearfix">
			<li class="nav-item left-item about{{(Request::is('about'))?' active-nav-item':'';}}">
				<a class="nav-link" href="{{url('about');}}"> <span class="nav-item-icon"> </span> <span class="nav-item-desc">О комплексе</span> </a>
			</li>
			<li class="nav-item left-item services{{(Request::segment(1) == 'services')?' active-nav-item':'';}}">
				<a class="nav-link" href="{{url('services');}}"> <span class="nav-item-icon"> </span> <span class="nav-item-desc">Услуги</span> </a>
			</li>
			<li class="nav-item left-item numbers{{(Request::segment(1) == 'rooms')?' active-nav-item':'';}}">
				<a class="nav-link" href="{{url('rooms');}}"> <span class="nav-item-icon"> </span> <span class="nav-item-desc">Номера</span> </a>
			</li>
			<li class="nav-item main-logo">
			@if(Request::is('/'))
				<h1 class="logo">Даховская Слобода</h1>
			@else:
				<a href="{{url('/');}}"><h1 class="logo">Даховская Слобода</h1></a>
			@endif
			</li>
			<li class="nav-item right-item cafe{{(Request::is('reviews'))?' active-nav-item':'';}}">
				<a class="nav-link" href="{{url('reviews');}}"> <span class="nav-item-icon"> </span> <span class="nav-item-desc">Отзывы</span> </a>
			</li>
			<li class="nav-item right-item what-to-see{{(Request::segment(1) == 'sights')?' active-nav-item':'';}}">
				<a class="nav-link" href="{{url('sights');}}"> <span class="nav-item-icon"> </span> <span class="nav-item-desc">Что смотреть?</span> </a>
			</li>
			<li class="nav-item right-item reviews{{(Request::is('restaurant'))?' active-nav-item':'';}}">
				<a class="nav-link" href="{{url('restaurant');}}"> <span class="nav-item-icon"> </span> <span class="nav-item-desc">Кафе</span> </a>
			</li>
		</ul>
		<ul class="mobile-nav">
			<li class="nav-item about{{(Request::is('about'))?' mobile-active-nav-item':'';}}">
				<a class="nav-link" href="{{url('about');}}"><span class="nav-item-icon"> </span> <span class="nav-item-desc">О комплексе</span> </a>
			</li>
			<li class="nav-item services{{(Request::segment(1) == 'services')?' mobile-active-nav-item':'';}}">
				<a class="nav-link" href="{{url('services');}}"> <span class="nav-item-icon"> </span> <span class="nav-item-desc">Услуги</span> </a>
			</li>
			<li class="nav-item numbers{{(Request::segment(1) == 'rooms')?' mobile-active-nav-item':'';}}">
				<a class="nav-link" href="{{url('rooms');}}"> <span class="nav-item-icon"> </span> <span class="nav-item-desc">Номера</span> </a>
			</li>
			<li class="nav-item cafe{{(Request::is('reviews'))?' mobile-active-nav-item':'';}}">
				<a class="nav-link" href="{{url('reviews');}}"> <span class="nav-item-icon"> </span> <span class="nav-item-desc">Отзывы</span> </a>
			</li>
			<li class="nav-item what-to-see{{(Request::segment(1) == 'sights')?' mobile-active-nav-item':'';}}">
				<a class="nav-link" href="{{url('sights');}}"> <span class="nav-item-icon"> </span> <span class="nav-item-desc">Что смотреть?</span> </a>
			</li>
			<li class="nav-item reviews{{(Request::is('restaurant'))?' mobile-active-nav-item':'';}}">
				<a class="nav-link" href="{{url('restaurant');}}"> <span class="nav-item-icon"> </span> <span class="nav-item-desc">Кафе</span> </a>
			</li>
			<li class="nav-item services{{(Request::is('contacts'))?' mobile-active-nav-item':'';}}">
				<a class="nav-link" href="{{url('contacts');}}"> <span class="nav-item-icon"> </span> <span class="nav-item-desc">Контакты</span> </a>
			</li>
		</ul>
	</nav>
</header>
