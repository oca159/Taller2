<?php namespace Taller2\Http\Controllers\Admin;

use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use Taller2\Http\Requests;
use Taller2\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;
use Taller2\Http\Requests\CrearClienteRequest;
use Taller2\Http\Requests\EditarClienteRequest;
use Taller2\Cliente;
class ClientesController extends Controller {

    public function __construct(){
        $this->middleware('auth', ['except' => ['create', 'store']]);
        $this->beforeFilter('@findCliente', ['only' => ['show','edit','update','destroy']]);
    }

    public function findCliente(Route $route){
        $this->cliente = Cliente::findOrFail($route->getParameter('clientes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {

        $clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     * @return Response
     */
    public function store(CrearClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());
        return redirect()->route('admin.clientes.index');
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
    public function edit($id)
    {
        return view('admin.clientes.edit')->with('cliente',$this->cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(EditarClienteRequest $request, $id)
    {
        $this->cliente->fill($request->all());
        $this->cliente->save();
        return redirect()->route('admin.clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id, Request $request)
    {
        $this->cliente->delete();
        $message = $this->cliente->full_name . ' fue eliminado de los registros.';
        if($request::ajax()){
            return response()->json([
                'id' => 0,
                'message' => $message
            ]);
        }
        Session::flash('message', $message);
        return redirect()->route('admin.clientes.index');
    }

}
