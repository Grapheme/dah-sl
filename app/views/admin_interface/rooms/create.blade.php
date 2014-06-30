@extends('admin_interface.cpanel-redactor')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Создание номера</h3>
{{ Form::open(array('route' => 'control-panel.rooms.store','class'=>'form-horizontal','role'=>"form",'files'=>TRUE)) }}
<ul class="nav nav-tabs">
	<li class="active"><a href="#room" data-toggle="tab">Номер</a></li>
	<li><a href="#seo" data-toggle="tab">SEO</a></li>
</ul>
<div class="tab-content">
	<div class="tab-pane active" id="room">
		<div class="form-group">
			{{ Form::label('title','Название:',array('class'=>'control-label')) }}
			{{ Form::text('title','',array('class'=>'form-control','autofocus'=>'')) }}
			{{ Form::label('housing','Номер корпуса:',array('class'=>'control-label')) }}
			{{ Form::text('housing','1',array('class'=>'form-control')) }}
			{{ Form::label('small_description', 'Короткое описание:',array('class'=>'control-label')) }}
			{{ Form::textarea('small_description','',array('class'=>'form-control','rows'=>4)) }}
			{{ Form::label('description', 'Описание:',array('class'=>'control-label')) }}
			{{ Form::textarea('description','',array('class'=>'form-control redactor')) }}
			{{ Form::label('file', 'Изображение:',array('class'=>'control-label')) }}
			{{ Form::file('file') }}
			{{ Form::label('place','Количество мест:',array('class'=>'control-label')) }}
			{{ Form::text('place','',array('class'=>'form-control')) }}
			{{ Form::label('price','Цена:',array('class'=>'control-label')) }}
			{{ Form::text('price','',array('class'=>'form-control')) }}
			{{ Form::label('properties','Оснащения:') }}
			@foreach ($properties as $property)
			<div class="checkbox">
				<label>{{ Form::checkbox('property[]',$property->id,true) }} {{ $property->title }}</label>
			</div>
			@endforeach
			{{ Form::label('sort','Порядковый номер:',array('class'=>'control-label')) }}
			{{ Form::text('sort','0',array('class'=>'form-control')) }}
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