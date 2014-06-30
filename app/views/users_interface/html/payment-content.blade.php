<section class="booking-section payment">
	<div class="waves">
		<div class="left-wave"></div>
		<h1>Онлайн оплата</h1>
		<div class="right-wave"></div>
		<div class="page-description">
			Вы можете оплатить забронированные услуги здесь и сейчас.<br>
			Воспользуйтесь формой бронирования или свяжитесь с администратором, чтобы<br>
			получить номер счета.<br>
			Оплата производится процессинговым центром <a class="styled-link" target="_blank" href="http://payanyway.ru">PayAnyWay</a>.
		</div>
		<div class="payment-main-error"></div>
	</div>
	<div class="booking-main">
		@include('users_interface.forms.prepayment-form')
		<div class="pay-form-container"></div>
		<div class="facilities-desc clearfix">
			{{ Page::getField('page_content') }}
		</div>
	</div>
</section>