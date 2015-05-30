<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRelacionPrestamos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relacion_prestamos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string("libro_codigo");
            $table->integer("prestamo_id")->unsigned();
            $table->foreign("prestamo_id")
                ->references('id')
                ->on('prestamos');
            $table->foreign("libro_codigo")
                ->references('codigo')
                ->on('libros');
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
		Schema::drop('relacion_prestamos');
	}

}
