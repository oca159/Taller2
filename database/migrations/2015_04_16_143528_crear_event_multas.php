<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearEventMultas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\DB::unprepared('CREATE EVENT actualizar_multas ON SCHEDULE EVERY 24 hour STARTS "2001-01-01 00:00:01" DO insert into multas(prestamo_id, created_at, monto, fecha_entregado) select id, now(), 0, "0000-00-00" from prestamos where fecha_devolucion = date_sub( date(now()), interval 1 day ) and entregado=0');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		\DB::unprepared('drop event actualizar_multas');
	}

}
