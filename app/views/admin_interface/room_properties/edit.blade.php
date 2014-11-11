@extends('admin_interface.cpanel-redactor')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Редактирование оснащения</h3>
{{ Form::model($room_property,array('method'=>'PATCH','route'=>array('control-panel.room_properties.update',$room_property->id),'class'=>'form-horizontal','role'=>"form",'files'=>TRUE)) }}
<div class="form-group">
	{{ Form::label('title','Название:',array('class'=>'control-label')) }}
	{{ Form::text('title',NULL,array('class'=>'form-control','autofocus'=>'')) }}
</div>
<div class="form-group">
	{{ Form::label('class_name','Название класса:',array('class'=>'control-label')) }}
	{{ Form::text('class_name',NULL,array('class'=>'form-control')) }}
	{{ Form::label('sort','Порядковый номер:',array('class'=>'control-label')) }}
	{{ Form::text('sort',NULL,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::submit('Сохранить',array('class'=>'btn btn-default')) }}
	{{ link_to_route('control-panel.room_properties.show','Отмена',$room_property->id,array('class'=>'btn')) }}
</div>
{{ Form::close() }}
@stop
