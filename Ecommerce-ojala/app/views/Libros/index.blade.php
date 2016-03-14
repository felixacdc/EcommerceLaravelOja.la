@extends('layout/admin_layout')

@section('contenido_admin')
<h1>Todos los libros</h1>
<strong><a href="{{URL::to('admin/libro/crear')}}">Crear libro</a></strong>

<table class="table table-striped table-bordered">
 <thread>
 	<tr>
 		<td>ID Libro</td>
 		<td>Titulo</td>
 		<td>isbn</td>
 		<td>precio</td>
 		<td>publicado</td>
 	</tr>
 	</thread>

 	<tbody>

	@foreach($libros as $valor)
		<tr>
			<td>{{$valor->id}}</td>
			<td>{{$valor->titulo}} {{HTML::image('imagenes/' . $valor->cubierta, $valor->titulo, array('width' => '100'))}}</td>
			<td>{{$valor->isbn}}</td>
			<td>{{$valor->precio}}</td>
			
			@if($valor->publicado == 0)
				<td>{{('No publicado')}}</td>
			@else
				<td>{{('Publicado')}}</td>
			@endif
		</tr>

				
 		<td>
 			<a class="btn btn-small btn-info" href="{{URL::to('admin/libro/editar/'.$valor->id)}}">
 			Editar este libro </a>

 			<a class="btn btn-small btn-success" href="{{URL::to('admin/libro/'.$valor->id)}}">
 			Mostrar este libro </a>

 			<a class="btn btn-small btn-warning" href="{{URL::to('admin/libro/eliminar/'.$valor->id)}}">
 			Eliminar este libro </a>

 		</td>

 		</tr>

 	@endforeach
 	</tbody>


 </table>
@stop
