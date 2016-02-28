<?php

class CategoriasTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('categorias')->truncate();

		Categoria::create([

			'descripcion'	=> 'Cuentos para niños',
			'tipo'			=> 'Literatura Infantil'

		]);

		Categoria::create([

			'descripcion'	=> 'Arte Culinario',
			'tipo'			=> 'Cocina'

		]);

		Categoria::create([

			'descripcion'	=> 'Munedo Medico',
			'tipo'			=> 'Medicina'

		]);

		Categoria::create([

			'descripcion'	=> 'Referente a Informatica',
			'tipo'			=> 'Computacion'

		]);

		// Uncomment the below to run the seeder
		// DB::table('categorias')->insert($categorias);
	}

}
