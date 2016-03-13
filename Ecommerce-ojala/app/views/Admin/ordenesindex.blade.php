@extends('layout/admin_layout')

@section('contenido_admin')

<h1>Todas las Ordenes</h1>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID Orden</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Email</td>
			<td>Direccion</td>
			<td>Total</td>
			<td>Estado</td>
		</tr>
	</thead>
	<tbody>

		@foreach($ordenes as $valor)
			<tr>
				<td>{{$valor->id}}</td>
				<td>{{$valor->nombre}}</td>
				<td>{{$valor->apellido}}</td>
				<td>{{$valor->email}}</td>
				<td>{{$valor->direccion}}</td>
				<td>{{$valor->total}}</td>
				<td>{{$valor->estado}}</td>

				<td>
					<a href="{{URL::to('admin/orden/editar/' . $valor->id)}}" class="btn btn-small btn-info">Editar esta orden</a>
					<a href="{{URL::to('admin/orden/'.$valor->id)}}" class="btn btn-small btn-success">Mostrar esta orden</a>
					<a href="{{URL::to('admin/orden/eliminar/'.$valor->id)}}" class="btn btn-small btn-warning">Eliminar esta orden</a>
				</td>
			</tr>
		@endforeach
		
	</tbody>
</table>

@stop