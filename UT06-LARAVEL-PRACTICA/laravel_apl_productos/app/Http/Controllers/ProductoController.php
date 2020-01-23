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

    public function create($product)
    {
        // Vista update.blade.php
        $producto = Producto::find($product);

        return view('productos.create')->with('producto',$producto);
    }


    public function update($IdProducto)
    {
        // Vista update.blade.php
        $producto = Producto::find($IdProducto);
        return view('productos.show')->with('producto', $producto);
    }

    public function destroy($IdProducto)
    {
        // Hacer diálogo de confirmación
        $producto = Producto::find($IdProducto);
        return view('productos.show')->with('producto', $producto);
    }
}
