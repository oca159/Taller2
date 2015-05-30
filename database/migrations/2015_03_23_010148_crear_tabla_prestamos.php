<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPrestamos extends Migration {


	public function up()
	{
		Schema::create('prestamos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->date("fecha_prestamo");
            $table->date("fecha_devolucion");
            $table->boolean("entregado");
            $table->boolean("extension");
            $table->enum('identificacion',['ife','licencia_conducir','credencial_escolar','curp']);
            $table->string('referencia');
            $table->foreign('usuario_id')
                ->references('id')
                ->on('usuarios');
			$table->timestamps();
		});
	}


	public function down()
	{
		Schema::drop('prestamos');
	}

}
