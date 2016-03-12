@extends('layout/main_layout')

@section('content')

<h1>Ordenes</h1>

@foreach($ordenes as $orden)

	<a href="#">Orden # {{$orden->id}} - {{Auth::user()->nombre}} - {{$orden->created_at}}</a>

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
			@foreach($orden->ordenitems as $ordenitems)
				<tr>
					<td>{{$ordenitems->titulo}}</td>
					<td>{{$ordenitems->pivot->cantidad}}</td>
					<td>{{$ordenitems->pivot->precio}}</td>
					<td>{{$ordenitems->pivot->total}}</td>
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
	<strong>Estado: {{$orden->estado}}</strong>

@endforeach

@stop