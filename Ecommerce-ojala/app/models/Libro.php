<?php

class Libro extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function Autor ()
	{
		return $this->belongsTo('Autore');
	}
}
