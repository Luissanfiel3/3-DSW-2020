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

    public function store(Request $request)
    {
        $categorias =  new Categoria();
        if (!empty($categorias)) {
            $name = $request->nombre;
            $descripcion = $request->descripcion;

            $categorias->nombre = $name;
            $categorias->descripcion = $descripcion;
            $categorias->save();
        }
        return back();
    }


    // Method of inserting data
    public function update(Request $request)
    {
        //dd($request->all());
        $categorias = Categoria::find($request->categoria_id);
        if (!empty($categorias)) {
            //$id = $request->categoria_id;
            $name = $request->nombre;
            $descripcion = $request->descripcion;

            $categorias->nombre = $name;
            $categorias->descripcion = $descripcion;


            $categorias->save();
        }
        return back();
    }

    /**
     * Delete category
     */
    public function destroy(Request $request)
    {

        $categoria = "";
        $id = $request->categoria_id;
        if (!empty($id)) {
            $categoria = Categoria::where('id', $id);
            $categoria->delete();
        } else {
            $echo = "Error when deleting the user ";
        }
        return back();
    }
}
