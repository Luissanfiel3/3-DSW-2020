<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'id','nombre','descripcion'
    ];
    public function categoria()
    {
        // 1er argumento: modelo
        // 2do argumento: campo tabla categoria
        // 3er argumento: campo tabla producto
        return $this->hasOne('App\Categoria', 'id', 'categoria_id');
        
        
    }
}
