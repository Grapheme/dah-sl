<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin_interface.includes.head')
</head>
<body>
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				@include('admin_interface.includes.messages')
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>