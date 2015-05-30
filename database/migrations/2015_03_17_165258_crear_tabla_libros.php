<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaLibros extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('libros', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('no_ejemplares');
            $table->integer('disponibles');
            $table->string("titulo");
            $table->string("editorial");
            $table->integer("edicion")->unsigned();
            $table->text("descripcion");
            $table->string("autor");
            $table->enum("idioma", ['espanol','ingles','frances', 'aleman', 'japones', 'chino']);
            $table->integer("no_paginas");
            $table->string("codigo")->unique();
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
		Schema::drop('libros');
	}

}
