<?php

use Taller2\Cuenta as Cuenta;
use Illuminate\Http\RedirectResponse;

class LibrosSTest extends TestCase {

	public function setUp()
	{
		parent::setUp();
		$this->be(Cuenta::find(1));
		\Session::start();
	}

	public function testConsultaLibros()
	{
		$response = $this->call('GET', '/admin/libros');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testCrearLibro()
	{
		$response = $this->call('GET', '/admin/libros/create');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testConsultaLibroShow()
	{
		$response = $this->call('GET', '/admin/libros/1');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testEditarLibro()
	{
		$response = $this->call('GET', '/admin/libros/1/edit');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testAlmacenarLibro()
	{
		$params = [
			'_token'		=> csrf_token(),
			'codigo'        => 'example_4',
			'no_ejemplares' => 10,
			'titulo'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, obcaecati?',
			'autor'         => 'Lorem ipsum.',
			'no_paginas'    => 100,
			'editorial'     => 'Lorem ipsum dolor.',
			'edicion'       => 3,
			'descripcion'   => 'Lorem ipsum dolor sit amet',
			'idioma'        => 'ingles'
		];
		$response = $this->route('POST', 'admin.libros.store', $params);

		$this->assertRedirectedTo('/admin/libros');
	}

	public function testActualizarLibro()
	{
		$params = [
			'_token'		=> csrf_token(),
			'codigo'        => 'example_update',
			'no_ejemplares' => 10,
			'titulo'        => 'Actualizacion de PHPUnit',
			'autor'         => 'Rafa',
			'no_paginas'    => 100,
			'editorial'     => 'FEI UV',
			'edicion'       => 7,
			'descripcion'   => 'Prueba con PHPUnit',
			'idioma'        => 'ingles'
		];
		$response = $this->call('PUT', '/admin/libros/31', $params);

		$this->assertRedirectedToRoute('admin.libros.index');
	}

	public function testEliminarLibro()
	{
		$params = [
			'_token' => csrf_token(),
			'libros' => 31
		];
		$response = $this->route('DELETE', 'admin.libros.destroy', $params);

		$this->assertRedirectedTo('/admin/libros');
	}

}
