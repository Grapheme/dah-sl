@extends('admin_interface.cpanel-redactor')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Редактирование отзыва</h3>
{{ Form::model($review,array('method'=>'PATCH','route'=>array('control-panel.reviews.update',$review->id),'class'=>'form-horizontal','role'=>"form",'files'=>TRUE)) }}
	<div class="form-group">
		{{ Form::label('author','Автор:',array('class'=>'control-label')) }}
		{{ Form::text('author',NULL,array('class'=>'form-control','autofocus'=>'')) }}
		{{ Form::label('email','Email:',array('class'=>'control-label')) }}
		{{ Form::email('email',NULL,array('class'=>'form-control')) }}
		{{ Form::label('city','Город:',array('class'=>'control-label')) }}
		{{ Form::text('city',NULL,array('class'=>'form-control')) }}
		{{ Form::label('content','Текст отзыва:',array('class'=>'control-label')) }}
		{{ Form::textarea('content',NULL,array('class'=>'form-control redactor')) }}
		{{ Form::label('admin_answer', 'Ответ администратора:',array('class'=>'control-label')) }}
		{{ Form::textarea('admin_answer',NULL,array('class'=>'form-control redactor')) }}
		{{ Form::label('sort','Порядковый номер:',array('class'=>'control-label')) }}
		{{ Form::text('sort',NULL,array('class'=>'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('raiting','Рейтинг отзыва:',array('class'=>'control-label')) }}<br/>
		@foreach($raiting as $index => $value)
			<?php $set = ($review->raiting == $index+1)?TRUE:FALSE;?>
			<label class="radio-inline"> {{ Form::radio('raiting',$index+1,$set)}} {{ $value }}</label>
		@endforeach
	</div>
	<div class="form-group">
		{{ Form::label('file', 'Аватар:',array('class'=>'control-label')) }}
		{{ Form::file('file') }}
	</div>
	<hr/>
	<div class="form-group">
		{{ Form::label('date_publication','Дата публикации:',array('class'=>'control-label')) }}
		{{ Form::text('date_publication',NULL,array('class'=>'form-control')) }}
		<div class="checkbox">
			<label>{{ Form::checkbox('valid',1,$review->valid) }} Опубликовать</label>
		</div>
	</div>
	<hr/>
	<div class="form-group">
		{{ Form::submit('Сохранить',array('class'=>'btn btn-default')) }}
		{{ link_to_route('control-panel.reviews.show','Отмена',$review->id,array('class'=>'btn')) }}
	</div>
{{ Form::close() }}
@stop