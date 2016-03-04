<?php

class Autore extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	protected $fillable = ['nombre', 'apellido', 'nacionalidad'];

	public function Libros ()
	{
		return $this->hasMany('Libro');
	}
}
