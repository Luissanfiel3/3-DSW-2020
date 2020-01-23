@extends('app')
@section('content')

<div class="table-title bg-dark text-white">
    <div class="row">
        <div class="col-sm-9">
            <h4>Productos</h4>
        </div>
        <div class="col-sm-3 ">
            <a href="#addEmployeeModal" class="btn btn-success btn-sm" data-toggle="modal"><i class="fa fa-lg fa-plus"></i></i> <span>Nuevo Producto</span></a>
        </div>
    </div>
</div>

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
            <td class="text-center">{{ $producto->categoria->nombre}}</td>

            <td>
                <!-- Ver un único producto  -->
                <a href="{{ route('productos.show', $producto->id) }}" title="Ver" class="btn btn-primary btn-sm"><i class="fa fa-lg fa-eye"></i></a>
                <a href="{{ route('productos.edit', $producto->id) }}" title="Editar" class="btn btn-primary btn-sm"><i class="fa fa-lg fa-edit"></i></a>
                <a href="{{ route('productos.destroy', $producto->id) }}" title="Borrar" class="btn btn-primary btn-sm"><i class="fa fa-lg fa-trash"></i></a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $productos->links() }}

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Category</h4>
            </div>
            <form action="{{route('category.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    @include('category.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop();