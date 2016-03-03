<?php

class Orden extends Eloquent {
	//propiedades que el usuario no puede modificar
	protected $guarded = array();

	public static $rules = array();

	//propiedades que el usuario puede modificar
	protected $filelable = ['miembro_id', 'direccion', 'total', 'estado'];

	// definir tabla pivote
	public function ordenItems ()
	{
		// Retornar la relacion 
		// primer dato el modelo
		// segundo parametro nombre de la clase pivote
		// tercer parametro llave foranea de la primera tabla
		// cuarto parametro llave foranea de la segunda tabla
		// con withPivot se definen los campos de retorno de la tabla pivote en este caso ordenlibros
		return $this->belongsToMany('Libro', 'ordenlibros', 'orden_id', 'libro_id')->withPivot('cantidad', 'precio', 'total');

	}


}
