<?php

class OrdensController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$miembro_id = Auth::user()->id;

		$ordenes = Orden::with('ordenItems')->where('miembro_id', '=', $miembro_id)->get();

        return View::make('Ordens.index')->with('ordenes', $ordenes);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('ordens.create');
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
        return View::make('ordens.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('ordens.edit');
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

	public function postOrden ()
	{
		$miembro_id = Auth::user()->id;
		$direccion 	= Input::get('direccion');

		$carro_libros = Carro::with('Libros')->where('miembro_id', '=', $miembro_id)->get();
		$carro_total = Carro::with('Libros')->where('miembro_id', '=', $miembro_id)->sum('total');

		$estado = "Pronto envio";

		$orden = Orden::create([
			'miembro_id' => $miembro_id,
			'direccion'	 => $direccion,
			'total'		 => $carro_total,
			'estado'	 => $estado
		]);

		

		foreach ($carro_libros as $carro_libro) {
			$orden->ordenItems()->attach($carro_libro->libro_id, 
				[
					'cantidad' => $carro_libro->cantidad,
					'precio'   => $carro_libro->libros->precio,
					'total'    => $carro_libro->libros->precio * $carro_libro->cantidad,
					'created_at' => new DateTime
				]);
		}

		Carro::where('miembro_id', '=', $miembro_id)->delete();

		return Redirect::route('index')->with('mensaje', 'Tu orden ha sido procesada...');
	}

}
