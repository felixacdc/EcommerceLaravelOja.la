<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carros', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('miembro_id');
			$table->integer('libro_id');
			$table->integer('cantidad');
			$table->decimal('total',10,2);
			$table->nullableTimestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('carros');
	}

}
