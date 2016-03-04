@extends('layout/main_layout')

@section('content')
	
	<div class="container">
		<h1>Tu Carro</h1>
		<table class="table">
			<tr>
				<td>Titulo</td>
				<td>Cantidad</td>
				<td>Precio</td>
				<td>Total</td>
				<td>Eliminar</td>
			</tr>

			@foreach($carro_libros as $carro_item)
				<tr>
					<td>{{$carro_item->Libros->titulo}}</td>
					<td>{{$carro_item->cantidad}}</td>
					<td>{{$carro_item->Libros->precio}}</td>
					<td>{{$carro_item->Libros->total}}</td>
				</tr>
			@endforeach

			<tr>
				<td></td>
				<td></td>
				<td>Total</td>
				<td>{{$carro_total}}</td>
				<td></td>
			</tr>
		</table>
		
		<h1>Enviando</h1>
		{{Form::open(array('url' => '/open'))}}

			<div class="form-group">
				<label for="">Direccion</label>
				<textarea name="direccion" class="form-control" cols="30" rows="10"></textarea>
			</div>

			<button class="btn btn-info">Realizar Orden</button>

		{{Form::close()}}

	</div>

@stop