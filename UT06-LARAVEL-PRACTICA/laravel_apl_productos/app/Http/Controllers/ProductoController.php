<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Producto;
use Illuminate\Pagination\LengthAwarePaginatorsimplePaginateIlluminate\Pagination\Paginator;

class ProductoController extends Controller
{
    //

    public function index()
    {
        // Devolverá todos los productos
        //$categorias = Categoria::get();
        //$productos = Producto::get();
        $productos = Producto::paginate(5);
        //Asignar a la vista el listado de productos de la base de datos
        return view('productos.index')->with('productos', $productos);
    }

    /**
     * Muestra la moneda seleccionada por id.
     * @param $IdProducto
     * @return Response
     */
    public function show($IdProducto)
    {
        // Devuelve el producto seleccionada por id.
        $producto = Producto::find($IdProducto);
        return view('productos.show')->with('producto', $producto);
    }

    public function store(Request $request)
    {
        $productos =  new Producto();
        if (!empty($productos)) {
            $id = $request->producto_id;
            $name = $request->nombre;
            $descripcion = $request->descripcion;
            $active = $request->activo;
            $cat = $request->categoria;

            $productos->nombre = $name;
            $productos->descripcion = $descripcion;
            $productos->esactivo = $active;
            $productos->categoria_id = $cat;
           // $productos->created_at;
            //$productos->updated_at;

            $productos->save();
        }

        return back();  
    }



    // Method of insecting data
    public function update(Request $request)
    {
        //dd($request->all());
        $productos = Producto::find($request->producto_id);
        if (!empty($productos)) {
            $id = $request->producto_id;
            $name = $request->nombre;
            $descripcion = $request->descripcion;
            $active = $request->activo;
            $cat = $request->categoria;

            $productos->nombre = $name;
            $productos->descripcion = $descripcion;
            $productos->esactivo = $active;
            $productos->categoria_id = $cat;
            $productos->created_at;
            $productos->updated_at;

            $productos->save();
        }
        return back();
    }

    public function destroy(Request $request)
    {
        $producto = Producto::findOrFail($request->producto_id);
        $producto->delete();

        return back();
    }
}
