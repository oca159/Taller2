<?php namespace Taller2\Http\Requests;

use Illuminate\Routing\Route;
use Taller2\Http\Requests\Request;

class EditarUsuarioRequest extends Request {

    protected $route;
    public function __construct(Route $route){
        $this->route = $route;
    }
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
            'email' => 'required|unique:usuarios,email,' . $this->route->getParameter('usuarios'),
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|numeric|digits:10'
		];
	}

}
