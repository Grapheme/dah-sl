@extends('admin_interface.cpanel-redactor')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Новая акция</h3>
{{ Form::open(array('route' => 'control-panel.actions.store','class'=>'form-horizontal','role'=>"form")) }}
    <div class="form-group">
        {{ Form::label('name','Название акции:',array('class'=>'control-label')) }}
        {{ Form::text('name','',array('class'=>'form-control','required'=>'','autofocus'=>'')) }}

        {{ Form::label('order','Порядок сортировки:',array('class'=>'control-label')) }}
        {{ Form::text('order',NULL,array('class'=>'form-control','required'=>'')) }}

        {{ Form::label('short','Краткое описание:',array('class'=>'control-label')) }}
        {{ Form::textarea('short',NULL,array('class'=>'redactor_ form-control','rows'=>4)) }}

        {{ Form::label('link','URL страницы:',array('class'=>'control-label')) }}
        <p><em>Ссылка должна вести на <a class="" href="{{ URL::route('control-panel.pages.index') }}">существующую страницу</a>. Создать страницу можно <a class="" href="{{ URL::route('control-panel.pages.create') }}">здесь</a>.</em></p>
        {{ Form::text('link',NULL,array('class'=>'form-control','required'=>'','pattern'=>"[a-z0-9\/\-_]{3,}")) }}

        {{ Form::label('image','Картинки:',array('class'=>'control-label')) }}
        <p><em>Картинку к акции можно будет загрузить сразу после создания.</em></p>

    </div>
    <div class="form-group">
        {{ Form::submit('Создать и перейти к загрузке изображений',array('class'=>'btn btn-default')) }}
    </div>
{{ Form::close() }}
@stop



