@extends('app')
@section('content')
<h1 class="text-primary">Lista de Productos</h1>
<table class="table table-bordered" id="tableProductos">
    <thead>
        <tr>
            <th class="text-center">Id producto</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Descripción</th>
            <th class="text-center">Activo</th>
            <th class="text-center">Categoría</th>
            <th class="text-center">Acciones</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td class="text-center">{{ $producto->id}}</td>
            <td class="text-center">{{ $producto->nombre}}</td>
            <td class="text-center">{{ $producto->descripcion }}</td>
            <td class="text-center">{{ $producto->esactivo}}</td>
            <td class="text-center">{{ $producto->categoria}}</td>
          
           
            <td>
                <!-- Ver un único producto  -->
                <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <!-- <tfoot>
            <tr>
                <th class="text-center">Id producto</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Activo</th>
                <th class="text-center">Acciones</th>
            </tr>
        </tfoot> -->
</table>