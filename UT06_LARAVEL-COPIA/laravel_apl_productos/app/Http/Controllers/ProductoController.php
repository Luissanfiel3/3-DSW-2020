<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        // Devolverá todos los productos
        $productos = Producto::get();
        //Asignar a la vista el listado de procutos de la base de datos
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


    // Crear modelo Categoría 


}
