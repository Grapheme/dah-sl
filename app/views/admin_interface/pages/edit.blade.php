@extends('admin_interface.cpanel-redactor')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Редактирование страницы</h3>
{{ Form::model($page,array('method'=>'PATCH','route'=>array('control-panel.pages.update',$page->id),'class'=>'form-horizontal','role'=>"form")) }}
	<div class="form-group">
		{{ Form::label('page_title','Title страницы:',array('class'=>'control-label')) }}
		{{ Form::text('page_title',NULL,array('class'=>'form-control','autofocus'=>'')) }}
		{{ Form::label('page_description','Description страницы:',array('class'=>'control-label')) }}
		{{ Form::textarea('page_description',NULL,array('class'=>'form-control','rows'=>4)) }}
		{{ Form::label('page_url','URL страницы:',array('class'=>'control-label')) }}
		{{ Form::text('page_url',NULL,array('class'=>'form-control','required'=>'','pattern'=>"[a-z0-9\/\-_]{3,}")) }}
		{{ Form::label('page_h1','H1 страницы:',array('class'=>'control-label')) }}
		{{ Form::text('page_h1',NULL,array('class'=>'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('page_content','Контент страницы:',array('class'=>'control-label')) }}
		{{ Form::textarea('page_content',NULL,array('class'=>'redactor form-control','rows'=>30)) }}
	</div>
	<div class="form-group">
		{{ Form::submit('Сохранить',array('class'=>'btn btn-default')) }}
		{{ link_to_route('control-panel.pages.show','Отмена',$page->id,array('class'=>'btn')) }}
	</div>
{{ Form::close() }}
@stop