<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin_interface.includes.head')

	<link href="{{asset('panel/css/signin.css');}}" rel="stylesheet">
</head>
<body>
	<div class="container">
		@include('admin_interface.includes.messages')
		@include('admin_interface.forms.signin')
	</div>
	@include('admin_interface.includes.scripts')
</body>
</html>