<?php namespace Taller2;

use Illuminate\Database\Eloquent\Model;

class RelacionPrestamo extends Model {

    protected $table = "relacion_prestamos";
    protected $fillable = ['libro_codigo', 'prestamo_id'];

    public function prestamos(){
        return $this->hasManyThrough('Taller2\Prestamo', 'Taller2\User');
    }

}
