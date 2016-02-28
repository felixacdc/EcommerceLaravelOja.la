<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdenlibrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ordenlibros', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('orden_id');
			$table->integer('libro_id');
			$table->integer('cantidad');
			$table->decimal('precio',10,2);
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
		Schema::drop('ordenlibros');
	}

}
