@extends('layout.admin_layout')

@section('contenido_admin')


<h1>Editar {{$autores->nombre}} {{$autores->apellido}}</h1>

{{Form::model($autores,array('action'=>array('AutoresController@update',$autores->id),'method'=>'post'))}}


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
		{{Form::label('nacionalidad','Admin')}}
		{{Form::text('nacionalidad',null,array('class'=>'form-control'))}}
		{{$errors->first('nacionalidad')}}
	</div>

{{Form::submit('Editar el usuario',array('class'=>'btn btn-primary'))}}

{{Form::close()}}


@stop