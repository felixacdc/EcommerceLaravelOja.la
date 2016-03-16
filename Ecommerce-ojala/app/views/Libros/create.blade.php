@extends('layout.admin_layout')

@section('contenido_admin')

<h1>Crear un libro</h1>

@if($errors->has())
	<div class="alert-box alert">
		@foreach($errors->all('<p>:messages</p>') as $messages)
			{{$messages}}
		@endforeach
	</div>
@endif

{{Form::open(array('url' => 'admin/libro/crear', 'method' => 'post', 'files' => true))}}


<div class="form-group">
	{{Form::label('titulo','Titulo', Input::old('titulo'))}}
	{{Form::text('titulo', null, array('class' => 'form-control'))}}
</div>

<div class="form-group">
	{{Form::label('isbn','ISBN', Input::old('isbn'))}}
	{{Form::text('isbn', null, array('class' => 'form-control'))}}
</div>

<div class="form-group">
	{{Form::label('precio','Precio', Input::old('precio'))}}
	{{Form::text('precio', null, array('class' => 'form-control'))}}
</div>

<div class="form-group">
	{{Form::label('photo', 'Foto')}}
	{{Form::file('photo')}}
</div>

<div class="form-group">
	{{Form::label('publicado','Publicado')}}
	{{Form::select('publicado', array('1' => 'publicado', '0' => 'No Publicado'), null, array('class' => 'form-control'))}}
</div>

<div class="form-group">
	{{Form::label('descripcion','Descripcion', Input::old('descripcion'))}}
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


{{Form::submit('Guardar el libro',array('class'=>'btn btn-primary'))}}

{{Form::close()}}

@stop