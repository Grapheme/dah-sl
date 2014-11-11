{{Form::open(array('action'=>'LoginController@login','class'=>'form-signin','method'=>'POST','role'=>'form'))}}
	<h2 class="form-signin-heading">Авторизация</h2>
	{{Form::text('login','',array('placeholder'=>'Пользователь','class'=>'form-control','required'=>'','autofocus'=>''))}}
	{{Form::password('password',array('placeholder'=>'Пароль','class'=>'form-control','required'=>'','pattern'=>'.{6,}'))}}
	<div class="form-operation">
		{{Form::submit('Войти',array('class'=>'btn btn-lg btn-primary btn-block'))}}
	</div>
{{Form::close()}}