@extends('layout/admin_layout')

@section('contenido_admin')

<h1>Crear una categoria</h1>

{{ Form::open(array('action'=>'CategoriasController@store')) }}

	<div class="form-group">
		{{ Form::label('descripcion', 'Descripcion') }}
		{{ Form::text('descripcion', Input::old('descripcion'), array('placeholder'=>'Descripcion de la categoria','class' => 'form-control')) }}
		{{$errors->first('descripcion')}}
	</div>

	<div class="form-group">
		{{ Form::label('tipo', 'Categoria') }}
		{{ Form::text('tipo', Input::old('tipo'), array('placeholder'=>'Escribe la categoria','class' => 'form-control')) }}
		{{$errors->first('tipo')}}
	</div>

	
	{{ Form::submit('Crear nueva categoria', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop