<?php namespace Taller2;

use Illuminate\Database\Eloquent\Model;

class Multa extends Model {

    protected $table = "multas";

    public function prestamo(){
        return $this->belongsTo('Taller2\Prestamo');
    }

}
