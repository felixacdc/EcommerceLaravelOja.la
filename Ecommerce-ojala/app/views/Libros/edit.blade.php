@extends('layout.admin_layout')

@section('contenido_admin')

<h1>Editar {{$libro->titulo}}</h1>

@if($errors->has())
	<div class="alert-box alert">
		@foreach($errors->all('<p>:messages</p>') as $messages)
			{{$messages}}
		@endforeach
	</div>
@endif

{{Form::model($libro,array('action'=>array('LibrosController@update',$libro->id)))}}


<div class="form-group">
	{{Form::label('titulo','Titulo')}}
	{{Form::text('titulo', null, array('class' => 'form-control'))}}
</div>

<div class="form-group">
	{{Form::label('isbn','ISBN')}}
	{{Form::text('isbn', null, array('class' => 'form-control', 'disabled' => 'disabled'))}}
</div>

<div class="form-group">
	{{Form::label('precio','Precio')}}
	{{Form::text('precio', null, array('class' => 'form-control'))}}
</div>

<div class="form-group">
	{{Form::label('cubierta','Cubierta')}}
	{{Form::file('cubierta', null, array('class' => 'form-control', 'disabled' => 'disabled'))}}
</div>

<div class="form-group">
	{{Form::label('publicado','Publicado')}}
	{{Form::select('publicado', array('1' => 'publicado', '0' => 'No Publicado'), null, array('class' => 'form-control'))}}
</div>

<div class="form-group">
	{{Form::label('descripcion','Descripcion')}}
	{{Form::textarea('descripcion', null, array('class' => 'form-control'))}}
</div>

<div class="form-group">
	{{Form::label('autor_id','Autor')}}
	{{Form::select('autor_id', $autores, null, array('class' => 'form-control'))}}
</div>

<div class="form-group">
	{{Form::label('categoria_id','Categoria')}}
	{{Form::select('categoria_id', $categorias, null, array('class' => 'form-control'))}}
</div>


{{Form::submit('Editar el libro',array('class'=>'btn btn-primary'))}}

{{Form::close()}}

@stop