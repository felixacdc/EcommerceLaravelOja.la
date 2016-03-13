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
		$ordenes = Orden::with('ordenItems')->where('id', '=', $id)->get();
        return View::make('Ordens.show')->with('ordenes', $ordenes);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ordenes = DB::table('usuarios')
			->join('ordens', 'usuarios.id', '=', 'ordens.miembro_id')
			->where('ordens.id', '=', $id)
			->get();

        return View::make('Ordens.edit')->with('ordenes', $ordenes);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$reglas = array('estado' => 'min:4|max:50');

		$validar = Validator::make(Input::all(), $reglas);

		if ($validar->fails()) {
			return Redirect::to('admin/orden/editar', $id)->withError($validar);
		} else {
			$orden = Orden::find($id);
			$orden->estado = Input::get('estado');
			$orden->save();

			return Redirect::to('admin/orden/index')->with('mensaje', 'Usuario Actualizado Exitosamente');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$orden = Orden::find($id);
		DB::table('ordenlibros')->where('orden_id', '=', $id)->delete();
		$orden->delete();

		return Redirect::to('admin/orden/index')->with('mensaje', 'La orden ha sido eliminada correctamente');
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
