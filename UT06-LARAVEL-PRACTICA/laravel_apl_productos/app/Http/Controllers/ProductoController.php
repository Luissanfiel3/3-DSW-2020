<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Producto;
use Illuminate\Pagination\LengthAwarePaginatorsimplePaginateIlluminate\Pagination\Paginator;

class ProductoController extends Controller
{
    //CRUD methods product

    public function index()
    {
        $productos = Producto::paginate(5);
        //Asignar a la vista el listado de productos de la base de datos
        return view('productos.index')->with('productos', $productos);
    }

    /**
     * Show a product selected by id.
     * @param $IdProducto
     * @return Response
     */
    public function show($IdProducto)
    {
        $producto = Producto::find($IdProducto);
        return view('productos.show')->with('producto', $producto);
    }

    /**
     * Create product
     */
    public function store(Request $request)
    {
        $productos =  new Producto();
        if (!empty($productos)) {
           // $id = $request->producto_id;
            $name = $request->nombre;
            $descripcion = $request->descripcion;
            $active = $request->activo;
            $cat = $request->categoria;

            $productos->nombre = $name;
            $productos->descripcion = $descripcion;
            $productos->esactivo = $active;
            $productos->categoria_id = $cat;
            $productos->save();
        }
        return back();
    }



    // Method of inserting data
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

    /**
     * Delete product
     */
    public function destroy(Request $request)
    {
        // $producto = Producto::findOrFail($request->producto_id);
        $producto="";
        $id = $request->producto_id;
        if (!empty($id)) {
            $producto = Producto::where('id', $id);
            $producto->delete();
            $message = "Correctly deleted product";
        } else {
            $message = "Error when deleting the user ";
        }
        return view('productos.index')->with('message', $message);
    }
}
