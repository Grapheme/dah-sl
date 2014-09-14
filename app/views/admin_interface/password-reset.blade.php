@extends('admin_interface.cpanel-clear')
@section('content')
<h3> Ввод пароля администратора </h3>
@if (Session::has('error'))
<div class="text-center">
	<div class="alert alert-danger">{{ trans(Session::get('reason')) }}</div>
</div>
<div class="clearfix"></div>
@endif
{{Form::open(array('url'=>'password/reset/'.$token,'class'=>'form-signin','method'=>'POST','role'=>'form'))}}
{{ Form::hidden('token',$token) }}
<div class="tab-pane active" id="service">
	<div class="form-group">
		{{ Form::label('email','Email:',array('class'=>'control-label')) }}
		{{ Form::email('email','',array('class'=>'form-control','required'=>'','autofocus'=>'')) }}
		{{ Form::label('password','Новый пароль:',array('class'=>'control-label')) }}
		{{ Form::password('password',array('class'=>'form-control','required'=>'')) }}
		{{ Form::label('password_confirmation','Повторите пароль:',array('class'=>'control-label')) }}
		{{ Form::password('password_confirmation',array('class'=>'form-control','required'=>'')) }}
	</div>
	<div class="form-group">
		{{ Form::submit('Сохранить',array('class'=>'btn btn-default')) }}
	</div>
</div>
{{ Form::close() }}
@stop