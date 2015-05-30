<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class AdministradorSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();
		$id = \DB::table('cuentas')->insertGetId(array(
			'nombre' => 'Osvaldo',
			'apellidos' => 'Cordova',
            'direccion'  => $faker->streetAddress,
            'telefono'   => $faker->numerify('228#######'),
			'email' => 'oca159@hotmail.es',
			'password' => \Hash::make('secret'),
			'tipo' => 'administrador'
			));
	}

}
