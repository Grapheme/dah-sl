@extends('admin_interface.cpanel-redactor')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Редактирование новости</h3>
{{ Form::model($news,array('method'=>'PATCH','route'=>array('control-panel.news.update',$news->id),'class'=>'form-horizontal','role'=>"form",'files'=>TRUE)) }}
	<div class="form-group">
		{{ Form::label('title','Название:',array('class'=>'control-label')) }}
		{{ Form::text('title',NULL,array('class'=>'form-control','autofocus'=>'')) }}

		{{ Form::label('preview', 'Текст анотации:',array('class'=>'control-label')) }}
		{{ Form::textarea('preview',NULL,array('class'=>'form-control redactor')) }}

		{{ Form::label('content','Текст отзыва:',array('class'=>'control-label')) }}
		{{ Form::textarea('content',NULL,array('class'=>'form-control redactor')) }}

		{{ Form::label('file','Изображение:',array('class'=>'control-label')) }}
		{{ Form::file('file') }}

		{{ Form::label('sort','Порядковый номер:',array('class'=>'control-label')) }}
		{{ Form::text('sort',NULL,array('class'=>'form-control')) }}
	</div>
	<hr/>
	<div class="form-group">
		{{ Form::label('date_publication','Дата публикации:',array('class'=>'control-label')) }}
		{{ Form::text('date_publication',NULL,array('class'=>'form-control')) }}
	</div>
	<hr/>
	<div class="form-group">
		{{ Form::submit('Сохранить',array('class'=>'btn btn-default')) }}
		{{ link_to_route('control-panel.news.show','Отмена',$news->id,array('class'=>'btn')) }}
	</div>
{{ Form::close() }}
@stop