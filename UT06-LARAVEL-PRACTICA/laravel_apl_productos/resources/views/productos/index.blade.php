@extends('app')
@section('content')

<div class="table-title bg-dark text-white">
    <div class="row">
        <div class="col-sm-9">
            <h4>Productos</h4>
        </div>
        <div class="col-sm-3 ">
            <a href="#addEmployeeModal" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newModal"><i class="fa fa-lg fa-plus"></i></i> <span>Nuevo Producto</span></a>
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
        @if(!empty($productos))
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
                <button class="btn btn-primary btn-sm" data-idproduct="{{$producto->id}}" data-name="{{$producto->nombre}}" data-mydescription="{{$producto->descripcion}}" data-activo="{{$producto->esactivo}}" data-catid="{{$producto->categoria_id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-lg fa-edit"></i></button>
                <a href="{{ route('productos.destroy', $producto->id) }}" title="Borrar" class="btn btn-primary btn-sm"><i class="fa fa-lg fa-trash"></i></a>

            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
{{ $productos->links() }}


<!-- Modal Nuevo Producto -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="" method="post">

                <div class="modal-body">
                    @include('productos.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">New Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('productos.update','test')}}" method="post">
                {{method_field('patch')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="producto_id" id="prod_id" value="">

                    @include('productos.form')
                    <!-- Select -->
                    <select name="categoria" id="cat" title="Categorías" class="form-control selectpicker ">
                        @foreach($productos as $producto)
                        <option selected value="{{$producto->categoria->id}}">{{ $producto->categoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop();