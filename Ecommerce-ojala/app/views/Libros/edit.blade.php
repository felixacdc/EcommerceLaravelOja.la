@extends('layout.admin_layout')

@section('contenido_admin')

<h1>Editar {{$libro->titulo}}</h1>



{{Form::model($libro,array('action'=>array('LibrosController@update',$libro->id)))}}


<div class="form-group">
	{{Form::label('titulo','Titulo')}}

</div>

<div class="form-group">
	{{Form::label('isbn','ISBN')}}

</div>

<div class="form-group">
	{{Form::label('precio','Precio')}}

</div>

<div class="form-group">
	{{Form::label('cubierta','Cubierta')}}

</div>

<div class="form-group">
	{{Form::label('publicado','Publicado')}}

</div>

<div class="form-group">
	{{Form::label('descripcion','Descripcion')}}

</div>

<div class="form-group">
	{{Form::label('autor_id','Autor')}}

</div>

<div class="form-group">
	{{Form::label('categoria_id','Categoria')}}

</div>


{{Form::submit('Editar el libro',array('class'=>'btn btn-primary'))}}

{{Form::close()}}

@stop