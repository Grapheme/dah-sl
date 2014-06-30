@extends('admin_interface.cpanel')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Добавление оснащения</h3>
{{ Form::open(array('route' => 'control-panel.room_properties.store','class'=>'form-horizontal','role'=>"form")) }}
<div class="form-group">
	{{ Form::label('title','Название:',array('class'=>'control-label')) }}
	{{ Form::text('title','',array('class'=>'form-control','autofocus'=>'')) }}
</div>
<div class="form-group">
	{{ Form::label('class_name','Название класса:',array('class'=>'control-label')) }}
	{{ Form::text('class_name','',array('class'=>'form-control')) }}
	{{ Form::label('sort','Порядковый номер:',array('class'=>'control-label')) }}
	{{ Form::text('sort','0',array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::submit('Добавить',array('class'=>'btn btn-default')) }}
</div>
{{ Form::close() }}
@stop


