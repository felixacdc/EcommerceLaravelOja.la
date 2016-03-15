@extends('layout.admin_layout')

@section('contenido_admin')

@foreach($libros as $libro)

	<h1>Mostrando {{$libro->titulo}}</h1>

	<div class="jumbotron text-center">
		{{HTML::image('imagenes/' . $libro->cubierta, $libro->titulo, array('width' => '468'))}}
		<h2>{{$libro->titulo}} {{$libro->isbn}}</h2>
		<p>
			<strong>Titulo: </strong>{{$libro->titulo}}<br>
			<strong>Isbn: </strong>{{$libro->isbn}}<br>
			<strong>Precio: </strong>{{$libro->precio}}<br>

			@if($libro->publicado == 0)
				<strong>Publicado: </strong>¡NO!<br>
			@else
				<strong>Publicado: </strong>¡SI!<br>
			@endif

			<strong>Rating: </strong>{{$libro->rating_cache}}<br>
			<strong>Descripcion: </strong>{{$libro->descripcion}}<br>
			<strong>Autor: </strong>{{$libro->nombre}} {{$libro->apellido}}<br>
			<strong>Categoria: </strong>{{$libro->tipo}}<br>
		</p>
	</div>

@endforeach

@stop