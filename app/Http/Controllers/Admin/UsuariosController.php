<?php namespace Taller2\Http\Controllers\Admin;

use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use Taller2\Http\Requests;
use Taller2\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;
use Taller2\Http\Requests\CrearUsuarioRequest;
use Taller2\Http\Requests\EditarUsuarioRequest;
use Taller2\Usuario;
class UsuariosController extends Controller {

    public function __construct(){
        $this->middleware('auth', ['except' => ['create', 'store']]);
        $this->beforeFilter('@findUsuario', ['only' => ['show','edit','update','destroy']]);
    }

    public function findUsuario(Route $route){
        $this->usuario = Usuario::findOrFail($route->getParameter('usuarios'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {

        $usuarios = Usuario::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     * @return Response
     */
    public function store(CrearUsuarioRequest $request)
    {
        $usuario = Usuario::create($request->all());
        return redirect()->route('admin.usuarios.index');
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
        return view('admin.usuarios.edit')->with('usuario',$this->usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(EditarUsuarioRequest $request, $id)
    {
        $this->usuario->fill($request->all());
        $this->usuario->save();
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id, Request $request)
    {
        $this->usuario->delete();
        $message = $this->usuario->full_name . ' fue eliminado de los registros.';
        if($request::ajax()){
            return response()->json([
                'id' => 0,
                'message' => $message
            ]);
        }
        Session::flash('message', $message);
        return redirect()->route('admin.usuarios.index');
    }

}
