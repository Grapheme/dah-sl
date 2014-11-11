@extends('admin_interface.cpanel-redactor')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Создание услуги</h3>
{{ Form::open(array('route' => 'control-panel.services.store','class'=>'form-horizontal','role'=>"form",'files'=>TRUE)) }}
<ul class="nav nav-tabs">
	<li class="active"><a href="#service" data-toggle="tab">Услуга</a></li>
	<li><a href="#seo" data-toggle="tab">SEO</a></li>
</ul>
<div class="tab-content">
	<div class="tab-pane active" id="service">
		<div class="form-group">
			{{ Form::label('title','Название:',array('class'=>'control-label')) }}
			{{ Form::text('title','',array('class'=>'form-control','autofocus'=>'')) }}
			{{ Form::label('list_text','Текст в списке:',array('class'=>'control-label')) }}
			{{ Form::textarea('list_text','',array('class'=>'form-control redactor')) }}
			{{ Form::label('short_description', 'Короткое описание:',array('class'=>'control-label')) }}
			{{ Form::textarea('short_description','',array('class'=>'form-control redactor')) }}
			{{ Form::label('description', 'Описание:',array('class'=>'control-label')) }}
			{{ Form::textarea('description','',array('class'=>'form-control redactor')) }}
			{{ Form::label('file', 'Изображение:',array('class'=>'control-label')) }}
			{{ Form::file('file') }}
			{{ Form::label('prices','Цена:',array('class'=>'control-label')) }}
			{{ Form::textarea('prices','',array('class'=>'form-control redactor')) }}
			{{ Form::label('sort','Порядковый номер:',array('class'=>'control-label')) }}
			{{ Form::text('sort','0',array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::checkbox('booking',1) }} Возможность заказа
		</div>
	</div>
	<div class="tab-pane" id="seo">
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
	</div>
</div>
<div class="form-group">
	{{ Form::submit('Создать',array('class'=>'btn btn-default')) }}
</div>
{{ Form::close() }}
@stop