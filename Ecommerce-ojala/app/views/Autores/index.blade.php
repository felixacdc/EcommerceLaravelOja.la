@extends('layout/admin_layout')

@section('contenido_admin')
<h1>Todos los autores</h1>

<strong><a href="{{URL::to('admin/autor/crear')}}">Crear Autor</a></strong>

<table class="table table-striped table-bordered">
 <thread>
 	<tr>
 		<td>ID</td>
 		<td>Nombre</td>
 		<td>Apellido</td>
 		<td>Nacionalidad</td>
 	</tr>
 	</thread>

 	<tbody>

 	@foreach($autores as $valor)
 		<tr>
 		<td> {{ $valor->id}} </td>
 		<td> {{ $valor->nombre}} </td>
 		<td> {{ $valor->apellido}} </td>
 		<td> {{ $valor->nacionalidad}} </td>

 		<td>
 			<a class="btn btn-small btn-info" href="{{URL::to('admin/autor/editar/'.$valor->id)}}">
 			Editar este autor </a>

 			<a class="btn btn-small btn-warning" href="{{URL::to('admin/autor/eliminar/'.$valor->id)}}">
 			Eliminar este autor </a>

 		</td>

 		</tr>


 	@endforeach
 	</tbody>


 </table>
@stop
