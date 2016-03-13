<?php

class AutoresController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$autores = Autore::all();
        return View::make('Autores.index')->with('autores', $autores);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('Autores.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$reglas = array(
			'nacionalidad' => 'required|min:2|max:200',
			'apellido'	   => 'required|min:2|max:200',
			'nombre'	   => 'required|min:2|max:200'
		);

		$validar = Validator::make(Input::all(), $reglas);

		if ($validar->fails()) {
			return Redirect::to('admin/autor/crear')->withErrors($validar);
		} else {
			$autor = new Autore;
			$autor->nombre = Input::get('nombre');
			$autor->apellido = Input::get('apellido');
			$autor->nacionalidad = Input::get('nacionalidad');
			$autor->save();

			return Redirect::to('admin/autor/index')->with('mensaje', 'Autor creado exitosamente');
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
        return View::make('Autores.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$autores = Autore::find($id);
        return View::make('Autores.edit')->with('autores', $autores);
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
			'nacionalidad' => 'required|min:2|max:200',
			'apellido'	   => 'required|min:2|max:200',
			'nombre'	   => 'required|min:2|max:200'
		);

		$validar = Validator::make(Input::all(), $reglas);

		if ($validar->fails()) {
			return Redirect::to('admin/autor/crear')->withErrors($validar);
		} else {
			$autor = Autore::find($id);
			$autor->nombre = Input::get('nombre');
			$autor->apellido = Input::get('apellido');
			$autor->nacionalidad = Input::get('nacionalidad');
			$autor->save();

			return Redirect::to('admin/autor/index')->with('mensaje', 'Autor acutalizado exitosamente');
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
		$autores = Autore::find($id);
		$autores->delete();

		return Redirect::to('admin/autor/index')->with('mensaje', 'Autor Eliminado Correctamente');
	}

}
