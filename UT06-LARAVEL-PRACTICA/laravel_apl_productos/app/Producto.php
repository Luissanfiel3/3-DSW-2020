<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
   // protected $fillable = ['producto_id', 'nombre','descripcion','esactivo','cat'];
    // protected $guarded = ['producto_id', 'name','desc','activo','categoria'];
    public function categoria()
    {
        // 1er argumento: modelo
        // 2do argumento: campo tabla categoria
        // 3er argumento: campo tabla producto
        return $this->hasOne('App\Categoria', 'id', 'categoria_id');
        
        
    }
}
