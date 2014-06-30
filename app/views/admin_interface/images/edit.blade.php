@extends('admin_interface.cpanel')
@section('content')
<a class="btn btn-default" href="{{ url('control-panel/images/'.Request::segment(5).'/'.$item->id) }}">&larr; Вернуться назад</a>
<h3>Редактирование изображения</h3>
{{ Form::model($image, array('method' => 'PATCH', 'route' => array('control-panel.images.update', $image->id,Request::segment(5),$item->id),'class'=>'form-horizontal','role'=>"form",'files'=>TRUE)) }}
	<div class="form-group">
		{{ Form::label('image','Изображение:',array('class'=>'control-label')) }}
		{{ Form::file('file') }}
	</div>
	<div class="form-group">
		{{ Form::label('title','Подпись:',array('class'=>'control-label')) }}
		{{ Form::text('title',NULL,array('class'=>'form-control','autofocus'=>'')) }}
		{{ Form::label('sort','Порядковый номер:',array('class'=>'control-label')) }}
		{{ Form::text('sort',NULL,array('class'=>'form-control')) }}
		{{ Form::label('link','Ссылка:',array('class'=>'control-label')) }}
		{{ Form::text('link',NULL,array('class'=>'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::submit('Сохранить', array('class' => 'btn btn-info')) }}
		{{ link_to_route('control-panel.images.show','Отмена',array($image->id,Request::segment(5),$item->id),array('class' => 'btn')) }}
	</div>
{{ Form::close() }}
@stop