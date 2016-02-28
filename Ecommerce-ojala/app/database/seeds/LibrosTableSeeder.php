<?php

class LibrosTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('libros')->truncate();

		Libro::create([

			'titulo'		=> 'Patito Feo',
			'isbn'			=> '123',
			'precio'		=> '13.40',
			'publicado'		=> 1,
			'descripcion'	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non quasi animi, unde ratione explicabo. Sint ab voluptatibus, quos totam sequi adipisci reprehenderit illo necessitatibus doloribus a, rerum odit porro eligendi.',
			'autor_id'		=> 1,
			'categoria_id'	=> 1

		]);

		Libro::create([

			'titulo'		=> 'Twilight',
			'isbn'			=> '456',
			'precio'		=> '9.40',
			'publicado'		=> 0,
			'descripcion'	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non quasi animi, unde ratione explicabo. Sint ab voluptatibus, quos totam sequi adipisci reprehenderit illo necessitatibus doloribus a, rerum odit porro eligendi.',
			'autor_id'		=> 2,
			'categoria_id'	=> 3

		]);

		Libro::create([

			'titulo'		=> 'Bella',
			'isbn'			=> '789',
			'precio'		=> '20.30',
			'publicado'		=> 1,
			'descripcion'	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non quasi animi, unde ratione explicabo. Sint ab voluptatibus, quos totam sequi adipisci reprehenderit illo necessitatibus doloribus a, rerum odit porro eligendi.',
			'autor_id'		=> 3,
			'categoria_id'	=> 3

		]);

		// Uncomment the below to run the seeder
		// DB::table('libros')->insert($libros);
	}

}
