<form method="POST" action="<?=URL::action('GuestAjaxController@review');?>" class="review-form">
	<div class="booking-main-error hidden">Неверно заполнены обязательные поля</div>
	<div class="form-elem form-input-element clearfix<?=($errors->has('name')?' error':'');?>">
		<label class="percent-lbl">Представьтесь</label>
		<input class="percent-input valid-required" name="name" type="text">
		<?=$errors->first('name','<div class="form-error">:message</div>'); ?>
	</div>
	<div class="form-elem form-input-element clearfix<?=($errors->has('email')?' error':'');?>">
		<label class="percent-lbl">Ваша эл.почта</label>
		<input class="percent-input valid-required valid-email" name="email" type="text">
		<?=$errors->first('email','<div class="form-error">:message</div>'); ?>
	</div>
	<div class="form-elem form-input-element clearfix<?=($errors->has('place')?' error':'');?>">
		<label class="percent-lbl">Откуда вы?</label>
		<input class="percent-input valid-required" name="place" type="text">
		<?=$errors->first('place','<div class="form-error">:message</div>'); ?>
	</div>
	<div class="form-elem form-input-element clearfix<?=($errors->has('text')?' error':'');?>">
		<label class="percent-lbl">Ваш отзыв</label>
		<textarea class="percent-input valid-required" name="text"></textarea>
		<?=$errors->first('text','<div class="form-error">:message</div>'); ?>
	</div>
	<div class="star-rating-container form-input-element clearfix<?=($errors->has('rating')?' error':'');?>">
		<div class="star-rating-capt">Оцените наш комплекс и обслуживание</div>
		<div class="star-rating-desc">
			<input name="rating" type="radio" value="1" class="hover-star radio-select" title="Плохо">
			<input name="rating" type="radio" value="2" class="hover-star radio-select" title="Неплохо">
			<input name="rating" type="radio" value="3" class="hover-star radio-select" title="Хорошо">
			<input name="rating" type="radio" value="4" class="hover-star radio-select" title="Отлично">
			<input name="rating" type="radio" value="5" class="hover-star radio-select" checked="checked" title="Супер!">
			<div id="hover-test" style="margin:0 0 0 20px;">Рейтинг:</div>
		</div>
		<?=$errors->first('rating','<div class="form-error">:message</div>'); ?>
	</div>
	<input class="reviews-input btn-ajax-submit" type="submit" value="Отправить">
</form>