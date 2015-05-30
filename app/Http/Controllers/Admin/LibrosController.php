<?php namespace Taller2\Http\Controllers\Admin;

use Taller2\Libro;
use Taller2\RelacionPrestamo;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use Taller2\Http\Requests;
use Taller2\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;
use Taller2\Http\Requests\CrearLibroRequest;
use Taller2\Http\Requests\EditarLibroRequest;

class LibrosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    public function findBook(Route $route){
        $this->book = Libro::findOrFail($route->getParameter('libros'));
    }

    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@findBook', ['only' => ['show','edit','update','destroy']]);
    }
	public function index()
	{
        $books = Libro::all();
        return view('admin.libros.index', compact('books'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.libros.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearLibroRequest $request)
	{
        $book = Libro::create($request->all());
        Libro::where('codigo','=',$request['codigo'])->update(['disponibles'=> $request['no_ejemplares']]);
        $message = "Libro agregado satisfactoriamente.";
        Session::flash('success', $message);
		return redirect()->route('admin.libros.index');
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
        return view('admin.libros.edit')->with('book',$this->book);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditarLibroRequest $request, $id)
	{
        $this->book->fill($request->all());
        $this->book->disponibles = $request['no_ejemplares'];
        $this->book->save();
        $message = "Cambios guardados satisfactoriamente!";
        Session::flash('success', $message);
        return redirect()->route('admin.libros.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$result = 0;
		if($this->book->no_ejemplares != $this->book->disponibles){
        	$message = $this->book->titulo . ' no puede ser eliminado de los registros porque tiene uno o más préstamos.';
        	$result = 1;
		}
		else{
        	$this->book->delete();
			$message = $this->book->titulo . ' fue eliminado de los registros.';
		}
        if($request::ajax()){
            return response()->json([
                'id' => $result,
                'message' => $message
            ]);
        }
        Session::flash('message', $message);
        return redirect()->route('admin.libros.index');
	}

}
