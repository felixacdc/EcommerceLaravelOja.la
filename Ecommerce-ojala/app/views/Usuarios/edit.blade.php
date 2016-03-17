@extends('layout.admin_layout')

@section('contenido_admin')

<h1>Editar {{$usuario->nombre}} {{$usuario->apellido}}</h1>

{{Form::model($usuario,array('action'=>array('UsuariosController@update',$usuario->id),'method'=>'post'))}}

<div class="form-group">
	{{Form::label('nombre','Nombre')}}
	{{Form::text('nombre',null,array('class'=>'form-control'))}}
	{{$errors->first('nombre')}}
</div>

<div class="form-group">
	{{Form::label('apellido','Apellido')}}
	{{Form::text('apellido',null,array('class'=>'form-control'))}}
	{{$errors->first('apellido')}}
</div>

<div class="form-group">
	{{Form::label('contrasena','Modificar contraseña')}}
	{{Form::password('contrasena',array('class'=>'form-control'))}}
	{{$errors->first('contrasena')}}
</div>

<div class="form-group">
	{{Form::label('contrasena_repite','Repite Contraseña modificada')}}
	{{Form::password('contrasena_repite',array('class'=>'form-control'))}}
	{{$errors->first('contrasena_repite')}}
</div>

<div class="form-group">
	{{Form::label('email','Email')}}
	{{Form::email('email',null,array('class'=>'form-control','disabled'=>'disabled'))}}
	{{$errors->first('email')}}
</div>

<div class="form-group">
	{{Form::label('admin','Admin')}}
	{{Form::select('admin',array('1'=>'Administrador','0' =>'No Administrador'),null,array('class'=>'form-control'))}}
	{{$errors->first('admin')}}
</div>

{{Form::submit('Editar el usuario',array('class'=>'btn btn-primary'))}}

{{Form::close()}}

@stop