@extends('layout/admin_layout')
@section('contenido_admin')


<h1>Todos los usuarios</h1>

<table class="table table-striped table-bordered">
 <thread>
 	<tr>
		<td>ID</td>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Email</td>
		<td>Admin</td>
 	</tr>
 	</thread>

 	<tbody>
		
		@foreach($usuarios as $valor)
			
	 		<tr>
			
			<td>{{$valor->id}}</td>
			<td>{{$valor->nombre}}</td>
			<td>{{$valor->apellido}}</td>
			<td>{{$valor->email}}</td>
			<td>{{$valor->admin}}</td>

	 		<td>
	 			<a class="btn btn-small btn-info" href="{{URL::to('admin/usuario/editar/'.$valor->id)}}">
	 			Editar este usuario </a>

	 			<a class="btn btn-small btn-success" href="{{URL::to('admin/usuario/'.$valor->id)}}">
	 			Mostrar este usuario </a>

	 			<a class="btn btn-small btn-warning" href="{{URL::to('admin/usuario/eliminar/'.$valor->id)}}">
	 			Eliminar este usuario </a>

	 		</td>

	 		</tr>

 		@endforeach

 	</tbody>


 </table>


@stop