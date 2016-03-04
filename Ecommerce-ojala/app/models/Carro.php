<?php

class Carro extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function Libros ()
	{
		// añadir la relacion
		return $this->belongsTo('Libro', 'libro_id');
	}
}
