<?php namespace Taller2;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model {

	protected $table = 'libros';

    protected $fillable = ['codigo', 'titulo', 'no_ejemplares', 'autor', 'idioma', 'no_paginas', 'descripcion', 'editorial', 'edicion', 'disponibles'];

    public function scopeTitulo($query, $titulo){
        if(trim($titulo != "")){
            $query->where("titulo","LIKE", "%$titulo%");
        }
    }
}
