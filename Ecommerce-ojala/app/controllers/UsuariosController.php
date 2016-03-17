<?php

class UsuariosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = Usuario::all();

        return View::make('Usuarios.index')->with('usuarios', $usuarios);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('Usuarios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$recibir = Input::all();

		$reglas = array(
			'nombre'			=> 'required|min:5|max:70',
			'apellido'			=> 'required|min:5|max:70',
			'email'				=> 'required|email|min:5|max:100|unique:usuarios,email',
			'contrasena'		=> 'required|min:5|max:30',
			'contrasena_repite' => 'same:contrasena'
		);

		$mensajes = array('required' => 'campo obligatorio');

		$validar = Validator::make($recibir, $reglas, $mensajes);

		if ($validar->fails()) {
			return Redirect::back()->withErrors($validar);
		} else {
			$usuarios = [
				[
					'nombre'	 => Input::get('nombre'),
					'apellido'	 => Input::get('apellido'),
					'email'		 => Input::get('email'),
					'password'	 => Hash::make(Input::get('contrasena')),
					'admin'		 => 0,
					'created_at' => new DateTime
				]
			];

			DB::table('usuarios')->insert($usuarios);
		}

		return Redirect::route('index')->with('mensaje', 'Usuario creado correctamente!');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = Usuario::find($id);

        return View::make('Usuarios.show')->with('usuario', $usuario);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = Usuario::find($id);

        return View::make('Usuarios.edit')->with('usuario', $usuario);
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
			'nombre'			=> 'required|min:5|max:70',
			'apellido'			=> 'required|min:5|max:70',
			'admin'				=> 'required|boolean',
			'contrasena'		=> 'required|min:5|max:30',
			'contrasena_repite' => 'same:contrasena'
		);

		$validar = Validator::make(Input::all(), $reglas);

		if ($validar->fails()) {
			return Redirect::to('admin/usuario/editar/' . $id)->withErrors($validar);
		} else {
			if (Input::get('contrasena') != null) {
				$contraseña = Hash::make(Input::get('contrasena'));
			} else {
				$usuario = Usuario::find($id);
				$contraseña = $usuario->password;
			}

			DB::table('usuarios')
				->where('id', $id)
				->update(
					array(
						'nombre'	 => Input::get('nombre'),
						'apellido'	 => Input::get('apellido'),
						'password'	 => Input::get('contrasena'),
						'admin'		 => Input::get('admin')
					)
				);

			return Redirect::to('admin/usuario/index')->with('mensaje', 'Usuario actualizado correctamente!');		
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
		$usuario = Usuario::find($id);
		$usuario->delete();

		return Redirect::to('admin/usuario/index')->with('mensaje', '¡Usuario ha sido eliminado exitosamente!');
	}

	public function postLogin ()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(['email' => $email, 'password' => $password])) {
			if (Auth::user()->admin == 0) {
				return Redirect::route('index');
			} else {
				return Redirect::to('admin/index');
			}
			
		} else {
			return Redirect::route('index')->with('error', 'Por favor revise su email o password');
		}	
	}

	public function getLogout ()
	{
		Auth::logout();
		return Redirect::route('index');
	}

}
