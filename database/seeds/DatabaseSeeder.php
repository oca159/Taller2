<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call('AdministradorSeeder');
		$this->call('TablaCuentasSeeder');
        $this->call('TablaLibrosSeeder');
        $this->call('TablaUsuariosSeeder');
	}

}
