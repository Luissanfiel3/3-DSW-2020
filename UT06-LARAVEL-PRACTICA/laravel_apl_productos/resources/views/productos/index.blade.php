


@extends('app')
@section('content')

<div class="table-title bg-dark text-white">
    <div class="row justify-content-end ">
        <div class="col-8">
            <h4>Products</h4>
        </div>

        <div class="col-4">
            <a href="#addEmployeeModal" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newModal"><i class="fa fa-lg fa-plus"></i></i> <span>New Product</span></a>
        </div>
    </div>
</div>


<table class="table table-bordered " id="tableProductos">
    <thead class="thead-light">
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Description</th>
            <th class="text-center">Active</th>
            <th class="text-center">Categorí</th>
            <th class="text-center">Created</th>
            <th class="text-center">Updated</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($productos))
        @foreach($productos as $producto)
        <tr>

            <td class="text-center">{{ $producto->nombre}}</td>
            <td class="text-center">{{ $producto->descripcion }}</td>
            <td class="text-center">{{ $producto->esactivo}}</td>
            <td class="text-center">{{ $producto->categoria->nombre}}</td>
            <td class="text-center">{{ $producto->created_at}}</td>
            <td class="text-center">{{ $producto->updated_at}}</td>
            <td>
                <!-- Ver un único producto  -->
                <a href="{{ route('productos.show', $producto->id) }}" title="Ver" class="btn btn-primary btn-sm"><i class="fa fa-lg fa-eye"></i></a>
                <button class="btn btn-primary btn-sm" data-idproduct="{{$producto->id}}" data-name="{{$producto->nombre}}" data-mydescription="{{$producto->descripcion}}" data-activo="{{$producto->esactivo}}" data-catid="{{$producto->categoria_id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-lg fa-edit"></i></button>
                <button class="btn btn-primary btn-sm" data-idproduct="{{$producto->id}}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-lg fa-trash"></i></button>

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
                <h4 class="modal-title" id="myModalLabel">New Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('productos.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    @include('productos.form')
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

<!-- Modal Editar -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
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

<!-- Delete Modal -->
<div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('productos.destroy','test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                        Are you sure you want to delete this product?
                    </p>
                    <input type="hidden" name="producto_id" id="del_id" value="">

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-warning">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>

</div>
@stop();

