<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin_interface.includes.head')
	{{ HTML::style('css/redactor.css') }}
</head>
<body>
	@include('admin_interface.includes.navbar-top')
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-right">
			@include('admin_interface.includes.sidebar-left')
			<div class="col-xs-12 col-sm-9">
				@include('admin_interface.includes.messages')
				@yield('content')
			</div>
		</div>
	</div>
	@include('admin_interface.includes.scripts')
	{{HTML::script('js/vendor/redactor.js');}}
	{{HTML::script('js/libs/redactor-config.js');}}
</body>
</html>