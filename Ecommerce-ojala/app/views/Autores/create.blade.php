@extends('layout.admin_layout')

@section('contenido_admin')


<h1>Crear un autor</h1>

{{Form::open(array('action'=>'AutoresController@store'))}}


	<div class="form-group">
		{{Form::label('nombre','Nombre')}}
		{{Form::text('nombre', Input::old('nombre'), array('placeholder' => 'Nombre', 'class'=>'form-control'))}}
		{{$errors->first('nombre')}}
	</div>

	<div class="form-group">
		{{Form::label('apellido','Apellido')}}
		{{Form::text('apellido', Input::old('apellido'), array('placeholder' => 'Apellido', 'class'=>'form-control'))}}
		{{$errors->first('apellido')}}
	</div>

	<div class="form-group">
		{{Form::label('nacionalidad','Nacionalidad')}}
		{{Form::text('nacionalidad', Input::old('nacionalidad'), array('placeholder' => 'Nacionalidad', 'class'=>'form-control'))}}
		{{$errors->first('nacionalidad')}}
	</div>

{{Form::submit('Crear el usuario',array('class'=>'btn btn-primary'))}}

{{Form::close()}}


@stop