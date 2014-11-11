@extends('admin_interface.cpanel')
@section('content')
<h3> Сброс пароля администратора </h3>
@if(Session::has('error') || Session::has('success'))
<div class="text-center">
	@if (Session::has('error'))
		<div class="alert alert-danger">{{ trans(Session::get('reason')) }}</div>
	@elseif (Session::has('success'))
		<div class="alert alert-success">На ваш e-mail было отправлено письмо с инструкциями о сбросе пароля.</div>
	@endif
</div>
<div class="clearfix"></div>
@endif
{{Form::open(array('url'=>'control-panel/password-remind','class'=>'form-signin','method'=>'POST','role'=>'form'))}}
<div class="tab-pane active" id="service">
	<div class="form-group">
		{{ Form::label('email','Email:',array('class'=>'control-label')) }}
		{{ Form::email('email','',array('class'=>'form-control','required'=>'','autofocus'=>'')) }}
	</div>
	<div class="form-group">
		{{ Form::submit('Отправить письмо',array('class'=>'btn btn-default')) }}
	</div>
</div>
{{ Form::close() }}
@stop