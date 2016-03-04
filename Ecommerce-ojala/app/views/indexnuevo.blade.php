@extends('layout/main_layout')

@section('content')

<hr>

<ul>
	@foreach($libros as $libro)
		<li>
			<h3>{{$libro->titulo}}</h3>
			<!-- se hace un salto por la relacion a la tabla autores -->
			<h3>{{$libro->autor->nombre}} {{$libro->autor->apellido}}</h3>
			<p>Precio: {{$libro->precio}}</p>
			<form action="carro/añadir" method="post">
				<input type="hidden" name="libro" value="{{$libro->id}}">
				<label for="">Cantidad</label>
				<select name="cantidad" id="">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>

				<button class="btn btn-danger">Añadir a carrito</button>
			</form>
		</li>
	@endforeach
</ul>

<div class="container">
	{{$libros->links()}}
</div>
@stop