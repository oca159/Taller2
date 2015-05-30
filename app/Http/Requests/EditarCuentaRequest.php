<?php namespace Taller2\Http\Requests;

use Illuminate\Routing\Route;
use Taller2\Http\Requests\Request;

class EditarCuentaRequest extends Request {

    /**
     * @param Route $route
     */
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
            'email' => 'required|unique:cuentas,email,' . $this->route->getParameter('cuentas'),
            'nombre' => 'required',
            'apellidos' => 'required',
            'password' => '',
            'direccion' => 'required|string',
            'telefono' => 'required|numeric|digits:10',
            'tipo' => 'required|in:administrador,encargado'
        ];
	}

}
