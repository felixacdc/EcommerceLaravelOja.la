@extends('layout.admin_layout')

@section('contenido_admin')

@foreach($ordenes as $valor)

<h1>Editar Orden de {{$valor->nombre}} {{$valor->apellido}}</h1>

{{Form::model($valor, array('action' => array('OrdensController@update', $valor->id), 'method' => 'post'))}}

<div class="form-group">
	{{Form::label('nombre', 'Nombre')}}
	{{Form::text('nombre', null, array('class' => 'form-control', 'disabled' => 'disabled'))}}
</div>

<div class="form-group">
	{{Form::label('apellido', 'Apellido')}}
	{{Form::text('apellido', null, array('class' => 'form-control', 'disabled' => 'disabled'))}}
</div>

<div class="form-group">
	{{Form::label('email', 'Email')}}
	{{Form::text('email', null, array('class' => 'form-control', 'disabled' => 'disabled'))}}
</div>

<div class="form-group">
	{{Form::label('direccion', 'Direccion')}}
	{{Form::text('direccion', null, array('class' => 'form-control', 'disabled' => 'disabled'))}}
</div>

<div class="form-group">
	{{Form::label('total', 'Total')}}
	{{Form::text('total', null, array('class' => 'form-control', 'disabled' => 'disabled'))}}
</div>

<div class="form-group">
	{{Form::label('estado', 'Estado (Pronto envio, enviado, recibido, cancelado)')}}
	{{Form::text('estado', null, array('class' => 'form-control'))}}
	<!-- Despliega si hay error al almacenar -->
	{{$errors->first('estado')}}
</div>

{{Form::submit('Editar esta orden', array('class' => 'btn btn-primary'))}}

{{Form::close()}}

@endforeach

@stop