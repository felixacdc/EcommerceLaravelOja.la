@extends('layout.admin_layout')

@section('contenido_admin')

<h1>Editar {{$categoria->tipo}}</h1>

{{Form::model($categoria,array('action'=>array('CategoriasController@update',$categoria->id),'method'=>'post'))}}

	<div class="form-group">
		{{ Form::label('descripcion', 'Descripcion') }}
		{{ Form::text('descripcion', null, array('class' => 'form-control')) }}
		{{$errors->first('descripcion')}}
	</div>

	<div class="form-group">
		{{ Form::label('tipo', 'Categoria') }}
		{{ Form::text('tipo', null, array('class' => 'form-control')) }}
		{{$errors->first('tipo')}}
	</div>

{{Form::submit('Editar la categoria',array('class'=>'btn btn-primary'))}}

{{Form::close()}}

@stop