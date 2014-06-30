@extends('admin_interface.cpanel-redactor')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Редактирование акции</h3>
<? #print_r($action); ?>
{{ Form::model($action,array('method'=>'PATCH','route'=>array('control-panel.actions.update',$action->id),'class'=>'form-horizontal','role'=>"form")) }}
    <div class="form-group">
        {{ Form::label('name','Название акции:',array('class'=>'control-label')) }}
        {{ Form::text('name',NULL,array('class'=>'form-control','autofocus'=>'')) }}
        {{ Form::label('order','Порядок сортировки:',array('class'=>'control-label')) }}
        {{ Form::text('order',NULL,array('class'=>'form-control')) }}
        {{ Form::label('short','Краткое описание:',array('class'=>'control-label')) }}
        {{ Form::textarea('short',NULL,array('class'=>'redactor_ form-control','rows'=>4)) }}
        {{ Form::label('image','Картинки:',array('class'=>'control-label')) }}
        <p><em>Картинки для акции загружаются <a class="" href="{{ URL::route('control-panel.images.index',array('actions',$action->id)) }}">здесь</a>.</em></p>
        {{ Form::label('link','URL страницы:',array('class'=>'control-label')) }}
        <p><em>Ссылка должна вести на <a class="" href="{{ URL::route('control-panel.pages.index') }}">существующую страницу</a>. Создать страницу можно <a class="" href="{{ URL::route('control-panel.pages.create') }}">здесь</a>.</em></p>
        {{ Form::text('link',NULL,array('class'=>'form-control','required'=>'','pattern'=>"[a-z0-9\/\-_]{3,}")) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Сохранить',array('class'=>'btn btn-default')) }}
        {{ link_to_route('control-panel.actions.index','Отмена') }}
    </div>
{{ Form::close() }}
@stop
