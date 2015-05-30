<?php namespace Taller2\Http\Controllers\Admin;

use Taller2\Http\Requests;
use Taller2\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Taller2\Prestamo;
use Taller2\RelacionPrestamo;
use Taller2\Usuario;
use Taller2\Multa;


class RetrasosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$row;
	    $data = array();
	    $multas = Multa::all();
	    
	    foreach ($multas as $key => $multa) {
	    	$prestamo = Prestamo::findOrFail($multa->prestamo_id);
	        $usuario = Usuario::findOrFail($prestamo->usuario_id);
	        //dd($prestamo);
	        $relaciones = RelacionPrestamo::select('libro_codigo')
	            ->where('prestamo_id', '=', $prestamo->id)
	            ->get();

	        $libros =  array();
	        foreach ($relaciones as $codigo => $relacion)
	            $libros[$codigo] = $relacion['libro_codigo'];

			$row['id']               = $prestamo->id;
			$row['id_multa']         = $multa->id;
			$row['email']            = $usuario->email;
			$row['fecha_prestamo']   = $prestamo->fecha_prestamo;
			$row['fecha_devolucion'] = $prestamo->fecha_devolucion;
			$row['extension']        = $prestamo->extension;
			$row['entregado']        = $prestamo->entregado;
			$row['extension']        = $prestamo->extension;
			$row['libros']           = $libros;
	        if( $multa->fecha_entregado == '0000-00-00' ){
				$segundos = strtotime( date('Y-m-d') ) - strtotime($prestamo->fecha_devolucion);
				$diferencia_dias = intval($segundos/60/60/24);
		    }
		    else{
				$segundos=strtotime($multa->fecha_entregado) - strtotime($prestamo->fecha_devolucion);
				$diferencia_dias=intval($segundos/60/60/24);    
		    }
			$row['dias'] = $diferencia_dias;

	        $data[$key] = $row;
	    }
		return view('admin.prestamos.retrasos')->with('prestamos', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
