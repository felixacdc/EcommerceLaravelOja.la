<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::post('/usuario/login', ['uses' => 'UsuariosController@postLogin']);
Route::get('/usuario/logout', 'UsuariosController@getLogout');
Route::post('/carro/añadir',
	[
		'before' => 'auth.basic',
		'uses' 	 => 'CarrosController@postAñadirAlCarro'
	]
);

Route::get('/carros',
	[
		'before' => 'auth.basic',
		'as' 	 => 'carro',
		'uses'	 => 'CarrosController@index'
	]

);

Route::get('carros/eliminar/{id}',
	[
		'before' => 'auth.basic',
		'as' 	 => 'eliminar_libro_desde_carro',
		'uses'	 => 'CarrosController@getEliminar'
	]
);

Route::post('orden',
	[
		'before' => 'auth.basic',
		'uses'	 => 'OrdensController@postOrden'
	]
);

Route::get('usuario/ordenes',
	[
		'before' => 'auth.basic',
		'uses'	 => 'OrdensController@index'
	]
);

// Crear usuarios
Route::get('usuarios/create', 'UsuariosController@create'); // Vista
Route::post('usuarios/create', 'UsuariosController@store'); // Almacenar

Route::group(array('prefix' => 'admin', 'before' => array('auth.basic|admin')), function () {
		Route::get('index',
			[
				'before' => 'auth.basic',
				'uses'	 => 'AdminController@index'
			]
		);

		# Gestion de ordenes
		Route::get('orden/index', 'AdminController@ordenes');
		Route::get('orden/{id}', 'OrdensController@show');
		Route::get('orden/editar/{id}', 'OrdensController@edit');
		Route::get('orden/eliminar/{id}', 'OrdensController@destroy');
		Route::post('orden/{id}', 'OrdensController@update');

		# Gestion de autores
		Route::get('autor/crear', 'AutoresController@create');
		Route::post('autor/crear', 'AutoresController@store');

		Route::get('autor/index', 'AutoresController@index');
		Route::get('autor/editar/{id}', 'AutoresController@edit');
		Route::post('autor/{id}', 'AutoresController@update');
		Route::get('autor/eliminar/{id}', 'AutoresController@destroy');

		# Gestion de categorias
		Route::get('categoria/crear', 'CategoriasController@create');
		Route::post('categoria/crear', 'CategoriasController@store');

		Route::get('categoria/index', 'CategoriasController@index');
		Route::get('categoria/editar/{id}', 'CategoriasController@edit');
		Route::post('cateogria/{id}', 'CategoriasController@update');
		Route::get('categoria/eliminar/{id}', 'CategoriasController@destroy');

		# Gestion de libros
		Route::get('libro/crear', 'LibrosController@create');
		Route::post('libro/crear', 'LibrosController@store');

		Route::get('libro/index', 'LibrosController@index');
		Route::get('libro/{id}', 'LibrosController@show');
		Route::get('libro/editar/{id}', 'LibrosController@edit');
		Route::post('libro/{id}', 'LibrosController@update');
		Route::get('libro/eliminar/{id}', 'LibrosController@destroy');

		# Gestion de usuarios
		Route::get('usuario/index', 'UsuariosController@index');
		Route::get('usuario/{id}', 'UsuariosController@show');
		Route::get('usuario/editar/{id}', 'UsuariosController@edit');
		Route::post('usuario/{id}', 'UsuariosController@update');
		Route::get('usuario/eliminar/{id}', 'UsuariosController@destroy');

	}
);
/*Route::resource('usuarios', 'UsuariosController');

Route::resource('categorias', 'CategoriasController');

Route::resource('autores', 'AutoresController');

Route::resource('libros', 'LibrosController');

Route::resource('carros', 'CarrosController');

Route::resource('ordens', 'OrdensController');

Route::resource('ordenlibros', 'OrdenlibrosController');*/