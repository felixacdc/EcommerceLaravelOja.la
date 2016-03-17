@extends('layout/main_layout')

@section('content')

<h1>Crear un usuario</h1>

{{ Form::open(array('url'=>'usuarios/create','method'=>'post')) }}

	<div class="form-group">
		{{ Form::label('nombre', 'Nombre') }}
		{{ Form::text('nombre', Input::old('nombre'), array('placeholder'=>'Escribe tu nombre','class' => 'form-control')) }}
		{{$errors->first('nombre')}}
	</div>

	<div class="form-group">
		{{ Form::label('apellido', 'Apellido') }}
		{{ Form::text('apellido', Input::old('apellido'), array('placeholder'=>'Escribe tu apellido','class' => 'form-control')) }}
		{{$errors->first('apellido')}}
	</div>

	<div class="form-group">
		{{ Form::label('contrasena', 'Contraseña') }}
		{{ Form::password('contrasena', array('placeholder'=>'Escribe la Contraseña','class' => 'form-control')) }}
		{{$errors->first('contrasena')}}
	</div>

	<div class="form-group">
		{{ Form::label('contrasena_repite', 'Repite la contraseña') }}
		{{ Form::password('contrasena_repite', array('placeholder'=>'Repite la contraseña', 'class'=>'form-control' ) ) }}
		{{$errors->first('contrasena_repite')}}
	</div>

	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', Input::old('email'), array('placeholder'=>'Ingresa tu Email','class' => 'form-control')) }}
		{{$errors->first('email')}}
	</div>

	{{ Form::submit('Crear nuevo usuario', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop