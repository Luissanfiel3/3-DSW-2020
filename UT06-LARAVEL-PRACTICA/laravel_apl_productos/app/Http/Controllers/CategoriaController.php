<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categoria;

class CategoriaController extends Controller
{
    //

    public function index()
    {
        // Modelo con todas las categorías
        $categorias =  Categoria::paginate(2);
        // 1 url de la vista
        // 2 nombre de variable para llamar en la plantilla
        // 3 variable a enviar
        return view('categorias.index')->with('categorias', $categorias);
    }

    public function show($IdCategoria)
    {
        // Devuelve el producto seleccionada por id.
        $categorias = Categoria::find($IdCategoria);
        return view('categorias.show')->with('categorias', $categorias);
    }

}
