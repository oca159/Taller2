<?php namespace Taller2\Http\Controllers\Admin;

use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use Taller2\Http\Requests;
use Taller2\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;
use Taller2\Http\Requests\CrearCuentaRequest;
use Taller2\Http\Requests\EditarCuentaRequest;
use Taller2\Cuenta;

class CuentasController extends Controller {

    public function __construct(){
        $this->middleware('auth', ['except' => ['create', 'store']]);
        $this->beforeFilter('@findCuenta', ['only' => ['show','edit','update','destroy']]);
    }

    public function findCuenta(Route $route){
        $this->cuenta = Cuenta::findOrFail($route->getParameter('cuentas'));
    }
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{

		$cuentas = Cuenta::all();
        return view('admin.cuentas.index', compact('cuentas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.cuentas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @return Response
	 */
	public function store(CrearCuentaRequest $request)
    {
        $cuenta = Cuenta::create($request->all());
        return redirect()->route('admin.cuentas.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){

        return view('admin.cuentas.edit')->with('cuenta',$this->cuenta);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditarCuentaRequest $request, $id)
	{
        $this->cuenta->fill($request->all());
        $this->cuenta->save();
        return redirect()->route('admin.cuentas.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function destroy($id, Request $request)
	{
        $this->cuenta->delete();
        $message = $this->cuenta->full_name . ' fue eliminado de los registros.';
        if($request::ajax()){
            return response()->json([
                'id' => 0,
                'message' => $message
            ]);
        }
        Session::flash('message', $message);
        return redirect()->route('admin.cuentas.index');
	}

}
