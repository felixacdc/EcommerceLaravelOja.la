<?php

class LibrosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$libros = Libro::all();
        return View::make('Libros.index')->with('libros', $libros);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categorias = array();

		foreach (Categoria::all() as $categoria) {
			$categorias[$categoria->id] = $categoria->tipo;
		}

		$autores = array();

		foreach (Autore::all() as $autor) {
			$autores[$autor->id] = $autor->nombre . ' ' . $autor->apellido . ' ' . $autor->nacionalidad;
		}

        return View::make('Libros.create')->with('categorias', $categorias)->with('autores', $autores);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$imagen = Input::file("photo");

		$rules = array(
			'titulo' 	   => 'required|min:2|max:100',
			'isbn'		   => 'required|integer|min:3|unique:libros,isbn',
			'precio'	   => 'required|numeric',
			'publicado'	   => 'required|boolean',
			'cubierta'	   => 'mimes:jpeg,png',
			'descripcion'  => 'required',
			'autor_id'	   => 'required',
			'categoria_id' => 'required'
		);

		$messages = array(
			'required' => 'El campo :attribute es obligatorio',
			'min'	   => 'El campo :attribute no puede tener menos de 3 caracteres',
			'unique'   => 'El isbn ingresado ya esta registrado en otro libro',
			'boolean'  => 'Debe ser 0 o 1 el valor de la publicacion',
			'mimes'	   => 'Debe ser una imagen de extension jpeg, png',
			'numeric'  => 'EL precio debe ser numerico'
		);

		$validation = Validator::make(Input::all(), $rules, $messages);

		if ($validation->fails()) {
			return Redirect::to('admin/libro/crear')->withErrors($validation)->ithInput();
		} else {
			$libro = new Libro(array(
				'titulo' => Input::get('titulo'),
				'isbn' => Input::get('isbn'),
				'precio' => Input::get('precio'),
				'cubierta' => date('Y-m-d-H:i:s') . '-' . Input::file('photo')->getClientOriginalName(),
				'publicado' => Input::get('publicado'),
				'descripcion' => Input::get('descripcion'),
				'autor_id' => Input::get('autor_id'),
				'categoria_id' => Input::get('categoria_id')
			));

			$filename = time() . "." . $imagen->getClientOriginalName();
			$path = public_path('imagenes/' . $filename);
			Image::make($imagen->getRealPath())->save($path);
			$libro->cubierta = $filename;
			$libro->save();

			return Redirect::to('admin/libro/index')->with('mensaje', 'Libro creado correctamente.');
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
		$libros = DB::table('libros')
			->join('autores', 'autores.id', '=', 'libros.autor_id')
			->join('categorias', 'categorias.id', '=', 'libros.categoria_id')
			->where('libros.id', '=', $id)
			->select('libros.titulo', 'libros.isbn', 'libros.precio', 'libros.cubierta', 'libros.publicado', 'libros.rating_cache', 'libros.descripcion', 'autores.nombre', 'autores.apellido', 'categorias.tipo')
			->get();

        return View::make('Libros.show')->with('libros', $libros);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$libro = Libro::find($id);

		$categorias = array();

		foreach (Categoria::all() as $categoria) {
			$categorias[$categoria->id] = $categoria->tipo;
		}

		$autores = array();

		foreach (Autore::all() as $autor) {
			$autores[$autor->id] = $autor->nombre . ' ' . $autor->apellido . ' ' . $autor->nacionalidad;
		}

        return View::make('Libros.edit')->with('libro', $libro)->with('categorias', $categorias)->with('autores', $autores);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'titulo' 	   => 'required|min:2|max:100',
			'precio'	   => 'required|numeric',
			'publicado'	   => 'required|boolean',
			'descripcion'  => 'required',
			'autor_id'	   => 'required',
			'categoria_id' => 'required'
		);

		$messages = array(
			'required' => 'El campo :attribute es obligatorio',
			'min'	   => 'El campo :attribute no puede tener menos de 3 caracteres',
			'unique'   => 'El isbn ingresado ya esta registrado en otro libro',
			'boolean'  => 'Debe ser 0 o 1 el valor de la publicacion',
			'mimes'	   => 'Debe ser una imagen de extension jpeg, png',
			'numeric'  => 'EL precio debe ser numerico'
		);

		$validation = Validator::make(Input::all(), $rules, $messages);

		if ($validation->fails()) {
			return Redirect::to('admin/libro/editar/' . $id)->withErrors($validation)->ithInput();
		} else {
			$libro = Libro::find($id);

			$libro->titulo = Input::get('titulo');
			$libro->precio = Input::get('precio');
			$libro->publicado = Input::get('publicado');
			$libro->descripcion = Input::get('descripcion');
			$libro->autor_id = Input::get('autor_id');
			$libro->categoria_id = Input::get('categoria_id');
			$libro->save();

			return Redirect::to('admin/libro/index')->with('mensaje', 'Libro actualizado correctamente.');
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
		$libro = Libro::find($id);
		$path = public_path() . 'imagenes/';
		\File::delete($path . $libro->cubierta);

		$libro->delete();

		return Redirect::to('admin/libro/index')->with('mensaje', 'Libro eliminado exitosamente!');
	}

}
