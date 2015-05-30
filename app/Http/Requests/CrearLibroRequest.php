<?php namespace Taller2\Http\Requests;

use Taller2\Http\Requests\Request;

class CrearLibroRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
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
            'codigo' => 'required|string|unique:libros,codigo'
		];
	}

}
