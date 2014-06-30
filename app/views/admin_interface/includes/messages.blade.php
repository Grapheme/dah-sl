@if($errors->any() || Session::get('message'))
<div class="col-md-5 col-md-offset-4 text-center">
	@foreach($errors->all('<div class="alert alert-danger">:message</div>') as $message)
	{{$message}}
	@endforeach
	@if(Session::get('message'))
		<div class="alert alert-danger">{{Session::get('message')}}</div>
	@endif
</div>
<div class="clearfix"></div>
@endif