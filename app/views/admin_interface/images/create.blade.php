@extends('admin_interface.cpanel')
@section('content')
<a class="btn btn-default" href="{{ url('control-panel/images/'.Request::segment(4).'/'.$item->id) }}">&larr; Вернуться назад</a>
<h3>Добавление изображения</h3>
{{ Form::open(array('route'=>array('control-panel.images.store',Request::segment(4),$item->id),'class'=>'form-horizontal','role'=>"form",'files'=>TRUE)) }}
	<div class="form-group">
		{{ Form::label('image', 'Изображение:',array('class'=>'control-label')) }}
		{{ Form::file('file',array('required')) }}
	</div>
	<div class="form-group">
		{{ Form::label('title','Подпись:',array('class'=>'control-label')) }}
		{{ Form::text('title','',array('class'=>'form-control','autofocus'=>'')) }}
		{{ Form::label('sort','Порядковый номер:',array('class'=>'control-label')) }}
		{{ Form::text('sort','0',array('class'=>'form-control')) }}
		{{ Form::label('link','Ссылка:',array('class'=>'control-label')) }}
		{{ Form::text('link','',array('class'=>'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::submit('Загрузить',array('class'=>'btn btn-default')) }}
	</div>
{{ Form::close() }}
@stop