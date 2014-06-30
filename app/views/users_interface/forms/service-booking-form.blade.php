<?=Form::open(array('action'=>'GuestAjaxController@service_booking','class'=>'booking-main-form','role'=>"form",'method'=>'POST'));?>
	<div class="booking-dates">
		<div class="form-input-element form-elem clearfix<?=($errors->has('date')?' error':'');?>">
			<label class="percent-lbl">Дата</label>
			<input class="percent-input datepicker valid-required" id="first-date" name="date" value="<?=Input::old('date');?>" type="text">
			<?=$errors->first('date','<div class="form-error">:message</div>'); ?>
		</div>
		<div class="form-input-element form-elem clearfix<?=($errors->has('adults')?' error':'');?>">
			<label class="percent-lbl">Укажите количество человек</label>
			<input class="percent-input valid-required valid-numeric" maxlength="2" value="<?=Input::old('adults');?>" name="adults" type="text">
			<?=$errors->first('adults','<div class="form-error">:message</div>'); ?>
		</div>
	</div>
	<div class="booking-desired-num hidden">
		<div class="form-elem clearfix<?=($errors->has('service')?' error':'');?>">
			<div class="booking-radio-cont">
			<?php
				$service_id = 1;
				if(Session::has('service')):
					$service_id =Session::get('service');
				elseif(!is_null(Input::old('service'))):
					$service_id = Input::old('service');
				endif;
			?>
		<?php foreach($services as $service):?>
			<?php if($service->booking == 1):?>
				<label class="desired-num-label">
					<input type="radio" value="<?=$service->title;?>" <?=($service->id == $service_id)?'checked="checked"':'';?> name="service">
					<span class="radio-sign"><?=$service->title?></span>
				</label>
			<?php endif;?>
		<?php endforeach;?>
			</div>
			<label class="percent-lbl">Выберите желаемую услуга</label>
			<?=$errors->first('service','<div class="form-error">:message</div>'); ?>
		</div>
	</div>
	<div class="booking-name">
		<div class="form-input-element form-elem clearfix<?=($errors->has('name')?' error':'');?>">
			<label class="percent-lbl">Представьтесь</label>
			<input class="percent-input valid-required" name="name" value="<?=Input::old('name');?>" type="text">
			<?=$errors->first('name','<div class="form-error">:message</div>'); ?>
		</div>
		<div class="form-input-element form-elem clearfix<?=($errors->has('phone')?' error':'');?>">
			<label class="percent-lbl">Ваш телефон</label>
			<input class="percent-input valid-required" name="phone" value="<?=Input::old('phone');?>" type="text">
			<?=$errors->first('phone','<div class="form-error">:message</div>'); ?>
		</div>
		<div class="form-input-element form-elem clearfix<?=($errors->has('email')?' error':'');?>">
			<label class="percent-lbl">Электронная почта</label>
			<input class="percent-input valid-required valid-email" name="email" value="<?=Input::old('email');?>" type="text">
			<?=$errors->first('email','<div class="form-error">:message</div>'); ?>
		</div>
	</div>
	<div class="booking-name">
		<div class="form-elem clearfix">
			<label class="percent-lbl">Расскажите, какое мероприятие Вы хотели бы провести в нашем комплексе</label>
			<textarea class="percent-input" name="text"><?=Input::old('text');?></textarea>
		</div>
	</div>
	<input class="form-submit btn-ajax-submit" type="submit" value="">
<?=Form::close();?>