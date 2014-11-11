<form class="booking-main-form pay-form" method="post" action="https://www.moneta.ru/assistant.htm">
	<input type="hidden" name="MNT_ID" value="94314906"> 
	<input type="hidden" name="MNT_TRANSACTION_ID" value="{{ $bill->id }}"> 
	<input type="hidden" name="MNT_CURRENCY_CODE" value="RUB"> 
	<input type="hidden" name="MNT_AMOUNT" value="{{ $bill->price }}">

	<input type="hidden" name="MNT_SUCCESS_URL" value="{{ URL::action('PaymentController@onSuccess') }}">
	<input type="hidden" name="MNT_FAIL_URL" value="{{ URL::to('payment') }}">
	<input type="hidden" name="MNT_RETURN_URL" value="{{ URL::to('payment') }}">

	<div class="pay-number">Ваш счет № {{ $bill->id }}</div>
	<div class="booking-quantities">
		<div class="form-elem clearfix">
			<label class="percent-lbl">ФИО плательщика:</label>
			<label class="percent-lbl data-label">
				{{ $bill->payer }}
			</label>

			<div class="form-error">Введите данные плательщика</div>
		</div>
	</div>
	<div class="booking-quantities">
		<div class="form-elem clearfix">
			<label class="percent-lbl head-percent-lbl">Назначение платежа:</label>
			<label class="percent-lbl data-label"> {{ $bill->service }} </label>
		</div>
	</div>
	<div class="booking-quantities">
		<div class="form-elem clearfix">
			<label class="percent-lbl head-percent-lbl">Сумма к оплате:</label>
			<label class="percent-lbl big-zalamander"> {{ priceFormatter::Format( $bill->price ) }}.-</label>
		</div>
	</div>
	@if(! $bill->paid )
	<div class="facilities-desc payment-columns clearfix">
		<div class="sloboda-column left-column">
			<h2 class="facilities-header">Электронные системы</h2>
			<label><input type="radio" name="paymentSystem.unitId" value="1017">Webmoney</label>
			<label><input type="radio" name="paymentSystem.unitId" value="1020">Яндекс.Деньги</label>
			<label><input type="radio" name="paymentSystem.unitId" value="822360">QIWI Кошелек</label>
			<label><input type="radio" name="paymentSystem.unitId" value="1015">Монета.Ру</label>
			<label><input type="radio" name="paymentSystem.unitId" value="545234">Деньги@Mail.Ru</label>
		</div>
		<div class="sloboda-column right-column">
			<h2 class="facilities-header">Платежные терминалы</h2>
			
			<label><input type="radio" name="paymentSystem.unitId" value="805519">Уральский Банк</label>
			<label><input type="radio" name="paymentSystem.unitId" value="295339">Московский Кредитный Банк</label>
			<label><input type="radio" name="paymentSystem.unitId" value="232821">Элекснет</label>
			<label><input type="radio" name="paymentSystem.unitId" value="510801">Сбербанк</label>
			<label><input type="radio" name="paymentSystem.unitId" value="248362">Евросеть, Связной</label>
			<label><input type="radio" name="paymentSystem.unitId" value="727446">МегаФон, МТС</label>
		</div>
		<div class="sloboda-column center-column">
			<h2 class="facilities-header">Банковские системы</h2>
			<label><input type="radio" name="paymentSystem.unitId" value="705000">Оплата банком</label>
			<label><input type="radio" name="paymentSystem.unitId" value="1029">Отделения «Почта России»</label>
			<label><input type="radio" name="paymentSystem.unitId" value="786203">Интернет-банк ОАО «УБРиР»</label>
			<label><input type="radio" name="paymentSystem.unitId" value="587412">Интернет-банк «Альфа-Клик»</label>
			<label><input type="radio" name="paymentSystem.unitId" value="661709">Интернет-банк «Промсвязьбанк»</label>
		</div>
	</div>
	@endif
	<div class="booking-quantities payment-submit">
		<div class="form-elem clearfix">
		@if(! $bill->paid )
			<input class="form-submit payment-go" type="submit" value="Оплатить заказ">
		@else
			Cчет был оплачен {{ myDateTime::SwapDotDateWithTime($bill['paid_at']) }}
		@endif
		</div>
	</div>
</form>