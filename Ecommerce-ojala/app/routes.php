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


/*Route::resource('usuarios', 'UsuariosController');

Route::resource('categorias', 'CategoriasController');

Route::resource('autores', 'AutoresController');

Route::resource('libros', 'LibrosController');

Route::resource('carros', 'CarrosController');

Route::resource('ordens', 'OrdensController');

Route::resource('ordenlibros', 'OrdenlibrosController');