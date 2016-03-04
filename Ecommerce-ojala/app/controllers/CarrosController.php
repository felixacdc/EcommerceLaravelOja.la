<?php

class CarrosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$miembro_id = Auth::user()->id;

		$carro_libros = Carro::with('Libros')
						->where('miembro_id', '=', $miembro_id)->get();
		$carro_total = Carro::with('Libros')
						->where('miembro_id', '=', $miembro_id)->sum('total');

        return View::make('Carros.index')
        			->with('carro_libros', $carro_libros)
        			->with('carro_total', $carro_total);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('carros.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('carros.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('carros.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function postAñadirAlCarro ()
	{
		$rules = [

			'cantidad'  => 'required|numeric',
			'libro'		=> 'required|numeric|exists:libros,id' //si existe el id en la tabla de libros

		];

		$validacion = Validator::make(Input::all(), $rules);

		if ( $validacion->fails() ) {
			return Redirect::route('index')->with('error', 'El libro no se pudo añadir a tu carrito');
		} 

		// Auth es la clase de autenticacion de laravel
		$miembro_id = Auth::user()->id;
		$libro_id 	= Input::get('libro');
		$cantidad	= Input::get('cantidad');

		$libro = Libro::find($libro_id);
		$total = $cantidad * $libro->precio;

		$count = Carro::where('libro_id', '=', $libro_id)->where('miembro_id', '=', $miembro_id)->count();

		if ($count) {
			return Redirect::route('index')->with('error', 'El libro ya existe en tu carrito');
		}
		
		Carro::create([
			'miembro_id' => $miembro_id,
			'libro_id'	 => $libro_id,
			'cantidad'	 => $cantidad,
			'total'		 => $total
		]);

		return Redirect::route('carro');
	}

}
