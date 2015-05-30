<?php namespace Taller2;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model {

	protected $table = "prestamos";
    
    protected $fillable = ['cliente_id', 'fecha_devolucion', 'fecha_prestamo', 'entregado', 'extension', 'identificacion', 'referencia'];

    public function multa(){
        return $this->hasOne('Taller2\Multa');
    }

    public function cliente(){
        return $this->belongsTo('Taller2\Cliente');
    }
}
