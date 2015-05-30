<?php namespace Taller2\Http\Requests;

use Taller2\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditarLibroRequest extends Request {

    protected $route;
    public function __construct(Route $route){
        $this->route = $route;
    }
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'no_ejemplares' => 'required|integer',
            'titulo' => 'required|string',
            'autor' => 'required|string',
            'idioma' => 'required|in:espanol,ingles,frances,aleman,japones,chino',
            'no_paginas' => 'required|integer',
            'editorial' => 'required|string',
            'edicion' => 'integer',
            'descripcion' => 'string',
            'codigo' => 'required|string|unique:libros,codigo,' . $this->route->getParameter('libros')
		];
	}

}
