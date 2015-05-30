<?php namespace Taller2\Http\Controllers\Admin;

use Taller2\Prestamo;
use Taller2\RelacionPrestamo;
use Taller2\Http\Requests;
use Taller2\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Taller2\Cuenta;
use Taller2\Usuario;
use Taller2\Libro;
use Taller2\Http\Requests\CrearPrestamoRequest;

class PrestamosController extends Controller {

	public function findPrestamo(Route $route){
        $this->prestamo = Prestamo::findOrFail($route->getParameter('prestamos'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.prestamos.home');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$libros = \Session::get('libros');
		$users = Usuario::select('email')->get();
		$emails = array();
		foreach ($users as $user) {
			$emails[] = $user['email'];
		}
		\JavaScript::put([
        	'emails' => $emails,
    	]);
		return view('admin.prestamos.create')->with('libros', $libros);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearPrestamoRequest $request)
	{
		$fecha_actual = date('Y-m-d');
		$fecha_devolucion = strtotime ( '+7 day' , strtotime ( $fecha_actual ) ) ;
		$fecha_devolucion = date ( 'Y-m-d' , $fecha_devolucion );
		
		$data = \Input::all();
		$email = $data['email'];
		$identificacion = $data['identificacion'];
		$referencia = $data['referencia'];
		unset($data['email']);
		unset($data['identificacion']);
		unset($data['referencia']);
		unset($data['_token']);

		$user_id = Usuario::select('id')
						->where('email', '=', $email)
						->get();
		$user_id = $user_id[0]->id;
		$prestamo = array(
			'fecha_prestamo'   => $fecha_actual,
			'fecha_devolucion' => $fecha_devolucion,
			'entregado'        => false,
			'extension'        => false,
			'identificacion'   => $identificacion,
			'referencia'       => $referencia
		);
		$prestamo = Prestamo::create($prestamo);
		$prestamo->usuario_id = $user_id;

		foreach ($data as $codigo => $info) {
			$relacion = RelacionPrestamo::create(['libro_codigo'=>$codigo,'prestamo_id'=>$prestamo->id]);
			$libro = Libro::where('codigo', '=', $codigo)->firstOrFail();
			if( $libro->disponibles == 0 ){
				return redirect()->route('admin.libros.index');
			}
			$libro->disponibles--;
			$libro->save();
		}
		
		$prestamo->save();

        return redirect()->route('admin.prestamos.index');
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

	public function lista(){
		$data = array();
    	$prestamos = Prestamo::all();
    	foreach ($prestamos as $key => $prestamo) {
	        $usuario = Usuario::findOrFail($prestamo->usuario_id);
	        
	        $relaciones = RelacionPrestamo::select('libro_codigo')
	            ->where('prestamo_id', '=', $prestamo->id)
	            ->get();

	        $libros =  array();
	        foreach ($relaciones as $codigo => $relacion)
	            $libros[$codigo] = $relacion['libro_codigo'];

			$row['id']               = $prestamo->id;
			$row['email']            = $usuario->email;
			$row['fecha_prestamo']   = $prestamo->fecha_prestamo;
			$row['fecha_devolucion'] = $prestamo->fecha_devolucion;
			$row['extension']        = $prestamo->extension;
			$row['entregado']        = $prestamo->entregado;
			$row['extension']        = $prestamo->extension;
			$row['libros']           = $libros;
			$data[$key]              = $row;
    	}
    	return view('admin.prestamos.index')->with('prestamos', $data);
	}

}
