<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class TablaCuentasSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for ($i=0; $i < 10; $i++) { 
			$id = \DB::table('cuentas')->insertGetID(array(
				'nombre'     => $faker->firstName,
				'apellidos'  => $faker->lastName,
				'direccion'  => $faker->streetAddress,
                'telefono'   => $faker->numerify('228#######'),
				'email'      => $faker->unique()->email,
				'password'   => \Hash::make('123456'),
				'tipo'       => 'encargado'
			));
		}
	}

}
