@extends('layout.admin_layout')

@section('contenido_admin')

<h1>Editar {{$categoria->tipo}}</h1>

{{Form::model($categoria,array('action'=>array('CategoriasController@update',$categoria->id),'method'=>'post'))}}


{{Form::submit('Editar la categoria',array('class'=>'btn btn-primary'))}}

{{Form::close()}}

@stop