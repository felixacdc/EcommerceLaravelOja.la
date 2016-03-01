<!DOCTYPE html>
<html lang="en">
<head>
	@include('includes.head')
</head>
<body>

	<div class="container">
		<h1>Tienda de Libros</h1>
		@if(!Auth::check())
			@include('includes.header_invitado')
		@else
			@include('includes.header_admin')
		@endif

		@yield('content')

		@include('includes.footer')

	</div>
	
	@include('includes.script')
</body>
</html>