<?php namespace Taller2\Http\Requests;

use Taller2\Http\Requests\Request;
use Illuminate\Routing\Route;

class CrearPrestamoRequest extends Request {

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
            'email' => 'required|exists:usuarios,email|email',
            'referencia' => 'required|string'
		];
	}

}
