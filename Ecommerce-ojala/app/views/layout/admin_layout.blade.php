<!DOCTYPE html>
<html lang="en">
<head>
	@include('includes.headadmin')
</head>
<body>

	<div class="container">
		<h1>Tienda de Libros</h1>
		@if(!Auth::check())
			@include('includes.header_invitado')
		@else
			@include('includes.header_admin')
		@endif

		@yield('contenido_admin')

		@include('includes.footer')

	</div>
	
	@include('includes.scriptadmin')
</body>
</html>