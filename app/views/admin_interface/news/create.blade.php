@extends('admin_interface.cpanel-redactor')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Создание новости</h3>
{{ Form::open(array('route' => 'control-panel.news.store','class'=>'form-horizontal','role'=>"form",'files'=>TRUE)) }}
	<div class="form-group">
		{{ Form::label('title','Название:',array('class'=>'control-label')) }}
		{{ Form::text('title','',array('class'=>'form-control','autofocus'=>'')) }}

		{{ Form::label('preview', 'Текст анотации:',array('class'=>'control-label')) }}
		{{ Form::textarea('preview','',array('class'=>'form-control redactor')) }}

		{{ Form::label('content', 'Текст отзыва:',array('class'=>'control-label')) }}
		{{ Form::textarea('content','',array('class'=>'form-control redactor')) }}

		{{ Form::label('file', 'Изображение:',array('class'=>'control-label')) }}
		{{ Form::file('file') }}

		{{ Form::label('sort','Порядковый номер:',array('class'=>'control-label')) }}
		{{ Form::text('sort','0',array('class'=>'form-control')) }}
	</div>
	<hr/>
	<div class="form-group">
		{{ Form::label('date_publication','Дата публикации:',array('class'=>'control-label')) }}
		{{ Form::text('date_publication','',array('class'=>'form-control')) }}
	</div>
	<hr/>
	<div class="form-group">
		{{ Form::submit('Создать',array('class'=>'btn btn-default')) }}
	</div>
{{ Form::close() }}
@stop