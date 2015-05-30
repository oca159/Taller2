<?php namespace Taller2;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model {

    protected $table = "reservaciones";

    public function reservaciones(){
        return $this->hasManyThrough('Taller2\Libro', 'Taller2\User');
    }

}
