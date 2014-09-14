@extends('admin_interface.cpanel-redactor')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Создание отзыва</h3>
{{ Form::open(array('route' => 'control-panel.reviews.store','class'=>'form-horizontal','role'=>"form",'files'=>TRUE)) }}
	<div class="form-group">
		{{ Form::label('author','Автор:',array('class'=>'control-label')) }}
		{{ Form::text('author','',array('class'=>'form-control','autofocus'=>'')) }}
		{{ Form::label('email','Email:',array('class'=>'control-label')) }}
		{{ Form::email('email','',array('class'=>'form-control')) }}
		{{ Form::label('city','Город:',array('class'=>'control-label')) }}
		{{ Form::text('city','',array('class'=>'form-control')) }}
		{{ Form::label('content', 'Текст отзыва:',array('class'=>'control-label')) }}
		{{ Form::textarea('content','',array('class'=>'form-control redactor')) }}
		{{ Form::label('admin_answer', 'Ответ администратора:',array('class'=>'control-label')) }}
		{{ Form::textarea('admin_answer','',array('class'=>'form-control redactor')) }}
		{{ Form::label('sort','Порядковый номер:',array('class'=>'control-label')) }}
		{{ Form::text('sort','0',array('class'=>'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('raiting','Рейтинг отзыва:',array('class'=>'control-label')) }}<br/>
		@foreach($raiting as $index => $value)
			<label class="radio-inline"> {{ Form::radio('raiting',$index+1)}} {{ $value }}</label>
		@endforeach
	</div>
	<div class="form-group">
		{{ Form::label('file', 'Аватар:',array('class'=>'control-label')) }}
		{{ Form::file('file') }}
	</div>
	<hr/>
	<div class="form-group">
		{{ Form::label('date_publication','Дата публикации:',array('class'=>'control-label')) }}
		{{ Form::text('date_publication','',array('class'=>'form-control')) }}
		<div class="checkbox">
			<label>{{ Form::checkbox('valid',1) }} Опубликовать</label>
		</div>
	</div>
	<hr/>
	<div class="form-group">
		{{ Form::submit('Создать',array('class'=>'btn btn-default')) }}
	</div>
{{ Form::close() }}
@stop