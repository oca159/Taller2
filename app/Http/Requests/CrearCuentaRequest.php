<?php namespace Taller2\Http\Requests;

use Taller2\Http\Requests\Request;

class CrearCuentaRequest extends Request {

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
            'email' => 'required|unique:cuentas,email',
			'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'password' => 'required',
            'direccion' => 'required|string',
            'telefono' => 'required|numeric|digits:10',
            'tipo' => 'required|in:administrador,encargado'
		];
	}

}
