@extends('layout.admin_layout')

@section('contenido_admin')

<h1>Mostrando {{$usuario->nombre}} {{$usuario->apellido}}</h1>

<div class="jumbotron text-center">
	<h2>{{$usuario->nombre}} {{$usuario->apellido}}</h2>
	<p>
		<strong>Email: </strong>{{$usuario->email}} <br>

		@if($usuario->admin == 0)
			<strong>¿Administrador?...</strong> NO <br>
		@else
			<strong>¿Administrador?...</strong> SI <br>
		@endif
	</p>

	<?php
		$ordenes = Orden::with('ordenItems')->where('miembro_id', '=', $usuario->id)->get();
	?>

</div>

<h1>Ordenes</h1>

@foreach($ordenes as $orden)
	<a href="#">Orden #{{$orden->id}} - {{$usuario->nombre}} - {{$orden->created_at}}</a>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Titulo</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orden->ordenitems as $ordenitem)
				<tr>
					<td>{{$ordenitem->titulo}}</td>
					<td>{{$ordenitem->pivot->cantidad}}</td>
					<td>{{$ordenitem->pivot->precio}}</td>
					<td>{{$ordenitem->pivot->total}}</td>
				</tr>
			@endforeach

			<tr>
				<td></td>
				<td></td>
				<td><strong>Total</strong></td>
				<td><strong>{{$orden->total}}</strong></td>
			</tr>
		</tbody>
	</table>
@endforeach

@stop