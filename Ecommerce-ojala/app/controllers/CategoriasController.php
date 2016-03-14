<?php

class CategoriasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categorias = Categoria::all();
        return View::make('categorias.index')->with('categorias', $categorias);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('categorias.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$reglas = array(
			'descripcion' => 'required|min:5|max:200',
			'tipo'		  => 'required|min:5|max:200|unique:categorias,tipo'
		);

		$validar = Validator::make(Input::all(), $reglas);

		if ($validar->fails()) {
			return Redirect::to('admin/categoria/crear')->withErrors($validar);
		} else {
			$categorias = new Categoria;
			$categorias->descripcion = Input::get('descripcion');
			$categorias->tipo = Input::get('tipo');
			$categorias->save();

			return Redirect::to('admin/categoria/index')->with('mensaje', 'Categoria creada correctamente');
		}
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('categorias.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categoria = Categoria::find($id);
        return View::make('categorias.edit')->with('categoria', $categoria);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$reglas = array(
			'descripcion' => 'required|min:5|max:200',
			'tipo'		  => 'required|min:5|max:200'
		);

		$validar = Validator::make(Input::all(), $reglas);

		if ($validar->fails()) {
			return Redirect::to('admin/categoria/editar/' . $id)->withErrors($validar);
		} else {
			$categorias = Categoria::find($id);
			$categorias->descripcion = Input::get('descripcion');
			$categorias->tipo = Input::get('tipo');
			$categorias->save();

			return Redirect::to('admin/categoria/index')->with('mensaje', 'Categoria actualizada correctamente');
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
		$categoria = Categoria::find($id);
		DB::table('libros')->where('categoria_id', '=', $id)->update(array('categoria_id' => 0));
		$categoria->delete();

		return Redirect::to('admin/categoria/index')->with('mensaje', 'Categoria eliminada exitosamente');
	}

}
