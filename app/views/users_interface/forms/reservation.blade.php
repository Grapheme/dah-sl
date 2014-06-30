<?=Form::open(array('action'=>'GuestController@reservation','class'=>'booking-form','role'=>"form"));?>
	<div class="form-header">
		<span class="form-header-dec left-dec"></span>
		<span class="form-header-dec right-dec"></span>
		<span class="form-header-cont">Бронирование</span>
	</div>
	<div class="form-input-element clearfix<?=($errors->has('date-in')?' error':'');?>">
		<input id="first-date" class="form-text datepicker valid-required" name="date-in" type="text" value="<?=Input::old('date-in');?>" placeholder="Дата заезда">
		<?=$errors->first('date-in','<div class="form-error">:message</div>'); ?>
	</div>
	<div class="form-input-element clearfix<?=($errors->has('date-out')?' error':'');?>">
		<input id="last-date" class="form-text datepicker valid-required" name="date-out" type="text" value="<?=Input::old('date-out');?>" placeholder="Дата отъезда">
		<?=$errors->first('date-out','<div class="form-error">:message</div>'); ?>
	</div>
	<div class="form-input-element clearfix<?=($errors->has('number')?' error':'');?>">
		<select name="number" class="styled-select valid-required">
			<option value=""> Выберите номер </option>
		<?php foreach($rooms as $room):?>
			<option value="<?=$room->id;?>"><?=$room->title;?></option>
		<?php endforeach;?>
		</select>
		<?=$errors->first('number','<div class="form-error">:message</div>'); ?>
	</div>
	<input class="form-submit btn-submit" type="submit" value="">
<?=Form::close();?>