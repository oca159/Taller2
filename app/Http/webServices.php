<?php
    
    use Taller2\Cuenta;
    use Taller2\Usuario;
    use Taller2\Libro;
    use Taller2\Prestamo;
    use Taller2\RelacionPrestamo;
    
    //obtener los datos de un usuario en particular

    Route::get('json_cuenta/{id}', function($id){
        $cuenta = Cuenta::findOrFail($id);
        if(\Request::ajax())
            return \Response::json($cuenta->toArray());
        return response('Unauthorized.', 401);
    });

    //Obtener un cliente por id

    Route::get('json_usuario/{id}', function($id){
        $usuario = Usuario::findOrFail($id);
        if(\Request::ajax())
            return \Response::json($usuario->toArray());
        return response('Unauthorized.', 401);
    });

    //Obtener un libro por id
    
    Route::get('json_libro/{id}', function($id){
        $libro = Libro::findOrFail($id);
        if(\Request::ajax())
            return \Response::json($libro->toArray());
        return response('Unauthorized.', 401);
    });

    //Registrar un préstamo
    
    Route::get('json_prestamo/{books}', function($books){
        $codigos = json_decode($books);
        $libros = array();
        $i = 0;
        foreach ($codigos as $codigo) {
            $libro = Libro::select('id', 'titulo', 'codigo')
                ->where('codigo', '=',$codigo->codigo)
                ->get();
            $libros[$i] = $libro;
            $i++;
        }
        if(\Request::ajax()){
            \Session::put('libros', $libros );
            return 'ok';
        }
        return response('Unauthorized.', 401);
    });

    //Obtener datos del usuario que realizó un préstamo con su email
    
    Route::get('json_usuario_prestamo/{email_usuario}', function($email_usuario){

        $usuario = Usuario::select('nombre', 'apellidos', 'telefono', 'direccion')
                ->where('email', '=', $email_usuario)
                ->get();

        if(\Request::ajax())
            return \Response::json($usuario->toArray());
        else
            return response('Unauthorized.', 401);
    });

    //Obtener libros de un préstamo por id

    Route::get('json_libros_prestamo/{id_prestamo}', function($id_prestamo){
        $relaciones = RelacionPrestamo::select('libro_codigo')
                ->where('prestamo_id', '=', $id_prestamo)
                ->get();
        $libros =  array();
        foreach ($relaciones as $codigo => $relacion){
            $libro = Libro::select('codigo', 'titulo', 'autor', 'editorial', 'idioma', 'edicion')
                        ->where('codigo', '=', $relacion['libro_codigo'])
                        ->get();
            $libros[$codigo] = $libro;
        }
        if(\Request::ajax())
            return \Response::json($libros);
        else
            return response('Unauthorized.', 401);
    });

    //Extender el préstamo de un id específico

    Route::get('extender_prestamo/{id_prestamo}', function($id_prestamo){
    
        $prestamo = Prestamo::find($id_prestamo);
        if( !$prestamo->extension ){
            $fecha_devolucion           = $prestamo->fecha_devolucion;
            $fecha_devolucion           = strtotime ( '+2 day' , strtotime ( $fecha_devolucion ) ) ;
            $prestamo->fecha_devolucion = date ( 'Y-m-d' , $fecha_devolucion );
            $prestamo->extension        = true;
            $prestamo->save();
            return 'Exito! El prestamo se ha extendido.';
        }
        
        return 'Error - Este prestamo ya ha sido extendido.';
    });

    //Entregar un prétamo a partir de su id
    
    Route::get('entregar_prestamo/{id_prestamo}', function($id_prestamo){
        $prestamo = Prestamo::find($id_prestamo);
        if( !$prestamo->entregado ){
            $relaciones = RelacionPrestamo::select('libro_codigo')
                ->where('prestamo_id', '=', $id_prestamo)
                ->get();
            
            foreach ($relaciones as $codigo => $relacion)
                Libro::where('codigo', '=', $relacion['libro_codigo'])->increment('disponibles');
            
            $prestamo->entregado = true;
            $prestamo->save();
            return 'Exito! El prestamo se ha entregado correctamente.';
        }
        return 'Error - Este prestamo ya ha sido entregado.';
    });

    //Entregar un préstamo atrasado dependiendo su id , el id de la multa y el monto

    Route::get('entregar_retraso/{id_prestamo}/{id_multa}/{monto}', function($id_prestamo, $id_multa, $monto){
        
        $prestamo = Prestamo::find($id_prestamo);
        if( !$prestamo->entregado ){
            $prestamo->entregado = true;
            $prestamo->save();
            
            $multa                  = Multa::find($id_multa);
            $multa->fecha_entregado = date('Y-m-d');
            $multa->monto           = $monto;
            $multa->save();

            $relaciones = RelacionPrestamo::select('libro_codigo')
                ->where('prestamo_id', '=', $id_prestamo)
                ->get();
            
            foreach ($relaciones as $codigo => $relacion)
                Libro::where('codigo', '=', $relacion['libro_codigo'])->increment('disponibles');

            return 'Exito! El prestamo atrasado se ha entregado correctamente.';
        }
        
        return 'Error - Este prestamo ya ha sido entregado.';
    });

    Route::get('catalogo', function(){
        $books = Libro::all();
        return view('auth.catalogo', compact('books'));
    });
?>