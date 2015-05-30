<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class TablaLibrosSeeder extends Seeder{

    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 30; $i++) {
            $total = $faker->randomNumber(2);
            $id = \DB::table('libros')->insertGetID(array(

                'titulo'        => $faker->sentence(4),
                'no_ejemplares' => $total,
                'autor'         => $faker->lastName . " " . $faker->firstName,
                'idioma'        => $faker->randomElement(array ('espanol','ingles','frances', 'aleman', 'japones', 'chino')),
                'no_paginas'    => $faker->randomNumber(3),
                'editorial'     => $faker->word,
                'edicion'       => $faker->numberBetween(1,12),
                'disponibles'   => $total,
                'descripcion'   => $faker->paragraph(4),
                'codigo'        => $faker->unique()->ean8
            ));
        }
    }
}