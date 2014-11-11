@extends('admin_interface.cpanel-redactor')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Создание страницы</h3>
{{ Form::open(array('route' => 'control-panel.pages.store','class'=>'form-horizontal','role'=>"form")) }}
	<div class="form-group">
		{{ Form::label('page_title','Title страницы:',array('class'=>'control-label')) }}
		{{ Form::text('page_title','',array('class'=>'form-control','autofocus'=>'')) }}
		{{ Form::label('page_description', 'Description страницы:',array('class'=>'control-label')) }}
		{{ Form::textarea('page_description','',array('class'=>'form-control','rows'=>4)) }}
		{{ Form::label('page_url','URL страницы:',array('class'=>'control-label')) }}
		{{ Form::text('page_url','',array('class'=>'form-control','required'=>'','pattern'=>'[a-z0-9\/\-_]{3,255}')) }}
		{{ Form::label('page_h1','H1 страницы:',array('class'=>'control-label')) }}
		{{ Form::text('page_h1','',array('class'=>'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('page_content','Контент страницы:') }}
		{{ Form::textarea('page_content','',array('class'=>'redactor form-control','rows'=>30)) }}
	</div>
	<div class="form-group">
		{{ Form::submit('Создать',array('class'=>'btn btn-default')) }}
	</div>
{{ Form::close() }}
@stop