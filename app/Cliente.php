<?php namespace Taller2;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

	protected $table = "clientes";

    protected $fillable = ['nombre', 'apellidos', 'email', 'direccion', 'telefono'];

    public function prestamo(){
        return $this->hasOne('Taller2\Prestamo');
    }

    public function getFullNameAttribute()
    {
        return $this->nombre . ' ' . $this->apellidos;
    }

}
