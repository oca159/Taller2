<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMultas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('multas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('prestamo_id')->unsigned();
			$table->double('monto');
			$table->date('fecha_entregado');
            $table->foreign("prestamo_id")
                ->references('id')
                ->on('prestamos');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('multas');
	}

}
