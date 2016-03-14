<?php

class Categoria extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	protected $fillable = array('descripcion', 'tipo');

	public function Libros ()
	{
		return $this->hasMany('Libro');
	}
}
