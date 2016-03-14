@extends('layout/admin_layout')

@section('contenido_admin')

<h1>Todas las categorias</h1>

<strong><a href="{{URL::to('admin/categoria/crear')}}">Crear Categoria</a></strong>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Descripcion</td>
			<td>Tipo</td>
		</tr>
	</thead>
	<tbody>
		@foreach($categorias as $valor)
			<tr>
				<td>{{$valor->id}}</td>
				<td>{{$valor->descripcion}}</td>
				<td>{{$valor->tipo}}</td>
				<td>
					<a href="{{URL::to('admin/categoria/editar/' . $valor->id)}}" class="btn btn-small btn-info">Editar Categoria</a>
					<a href="{{URL::to('admin/categoria/eliminar/' . $valor->id)}}" class="btn btn-small btn-warning">Eliminar Categoria</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop