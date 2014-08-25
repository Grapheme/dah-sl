{{ Form::open(array('action'=>'GuestAjaxController@booking','class'=>'booking-main-form booking-adapt','role'=>"form",'method'=>'POST')) }}
	<div class="booking-dates">
		<div class="form-input-element form-elem clearfix{{ ($errors->has('date-in')?' error':'') }}">
			<label class="percent-lbl">Дата заезда</label>
			<input id="first-date" class="percent-input datepicker valid-required" name="date-in" value="{{ Input::old('date-in') }}" type="text">
			{{ $errors->first('date-in','<div class="form-error">:message</div>') }}
		</div>
		<div class="form-input-element form-elem clearfix{{ ($errors->has('date-out')?' error':'') }}">
			<label class="percent-lbl">Дата отъезда</label>
			<input id="last-date" class="percent-input datepicker valid-required" name="date-out" value="{{ Input::old('date-out') }}" type="text">
			{{ $errors->first('date-out','<div class="form-error">:message</div>') }}
		</div>
	</div>
	<div class="booking-quantities">
		<div class="form-input-element form-elem clearfix{{ ($errors->has('adults')?' error':'') }}">
			<label class="percent-lbl">Укажите количество взрослых</label>
			<input class="percent-input valid-required valid-numeric quantity-input" maxlength="2" value="{{ Input::old('adults') }}" name="adults" type="text">
			{{ $errors->first('adults','<div class="form-error">:message</div>') }}
		</div>
		<div class="form-input-element form-elem clearfix{{ ($errors->has('children')?' error':'') }}">
			<label class="percent-lbl">Укажите количество детей от 6 до 12 лет</label>
			<input class="percent-input valid-required valid-numeric quantity-input" maxlength="2" value="{{ Input::old('children') }}" name="children"  type="text">
			{{ $errors->first('children','<div class="form-error">:message</div>') }}
		</div>
	</div>
	<div class="booking-desired-num">
		<div class="form-input-element clearfix{{ ($errors->has('desired-num-radio')?' error':'') }}">
			<div class="clearfix">
				<label class="percent-lbl">Выберите желаемый тип номера</label>
				<?php
					$room_id = 1;
					if(Session::has('number')):
						$room_id =Session::get('number');
					elseif(!is_null(Input::old('number'))):
						$room_id = Input::old('number');
					endif;
				?>
				<select name="desired-num-radio" class="styled-select valid-required">
					<option value=""> Выберите номер </option>
				@foreach($rooms as $room)
					<option value="{{$room->title}}" {{ ($room->id == $room_id)?'selected="selected"':'' }}>{{$room->title}}</option>
				@endforeach
				</select>
			</div>
			<label id="room-price-lable" class="percent-lbl">Стоимость номера в сутки</label>
			<span id="room-price-block" class="big-zalamander">
			@foreach($rooms as $room)
				@if($room->id == $room_id)
					{{$room->price}}.-
				@endif
			@endforeach
			</span>
			<div id="room-text-block">
			@foreach($rooms as $room)
				@if($room->id == $room_id)
					{{$room->small_description}}
				@endif
			@endforeach
			</div>
			{{ $errors->first('desired-num-radio','<div class="form-error">:message</div>') }}
			<div id="room-count-block" class="form-input-element form-elem clearfix">
                <label class="percent-lbl">Укажите количество номеров</label>
                <input class="percent-input valid-required valid-numeric quantity-input" maxlength="2" value="{{ Input::old('room_count') ? Input::old('room_count') : 1 }}" name="room_count"  type="text">
                {{ $errors->first('room_count','<div class="form-error">:message</div>') }}
            </div>
		</div>
	</div>
	<div class="booking-name">
		<div class="form-input-element form-elem clearfix{{ ($errors->has('name')?' error':'') }}">
			<label class="percent-lbl">Ф.И.О.</label>
			<input class="percent-input valid-required" name="name" value="{{ Input::old('name') }}" type="text">
			{{ $errors->first('name','<div class="form-error">:message</div>') }}
		</div>
		<div class="form-input-element form-elem clearfix{{ ($errors->has('phone')?' error':'') }}">
			<label class="percent-lbl">Ваш телефон</label>
			<input class="percent-input valid-required" name="phone" value="{{ Input::old('phone') }}" type="text">
			{{ $errors->first('phone','<div class="form-error">:message</div>') }}
		</div>
		<div class="form-input-element form-elem clearfix{{ ($errors->has('email')?' error':'') }}">
			<label class="percent-lbl">Электронная почта</label>
			<input class="percent-input valid-required valid-email" name="email" value="{{ Input::old('email') }}" type="text">
			{{ $errors->first('email','<div class="form-error">:message</div>') }}
		</div>
	</div>
	<input class="form-submit btn-ajax-submit" type="submit" value="">
{{ Form::close() }}