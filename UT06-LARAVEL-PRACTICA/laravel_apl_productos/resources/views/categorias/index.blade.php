@extends('app')
@section('content')


<div class="table-title bg-dark text-white">
    <div class="row justify-content-end ">
        <div class="col-8">
            <h4>Categories</h4>
        </div>

        <div class="col-4">
            <a href="#addEmployeeModal" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newcatModal"><i class="fa fa-lg fa-plus"></i></i> <span>New Category</span></a>
        </div>
    </div>
</div>

<table class="table table-bordered" id="tableCategoriass">
    <thead>
        <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">Descripción</th>
            <th class="text-center">Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td class="text-center">{{ $categoria->nombre}}</td>
            <td class="text-center">{{ $categoria->descripcion}}</td>

            <td>
                <!-- Ver un único Categorias  -->
                <a href="{{ route('categorias.show', $categoria->id) }}" title="Ver" class="btn btn-primary btn-sm"><i class="fa fa-lg fa-eye"></i></a>
                <button class="btn btn-primary btn-sm" data-idcat="{{$categoria->id}}" data-name="{{$categoria->nombre}}" data-mydescription="{{$categoria->descripcion}}"   data-toggle="modal" data-target="#editcatModal"><i class="fa fa-lg fa-edit"></i></button>
                <button class="btn btn-primary btn-sm" data-idcat="{{$categoria->id}}" data-toggle="modal" data-target="#deletecatModal"><i class="fa fa-lg fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>
{{ $categorias->links() }}


<!-- Modal Nueva Categoría -->
<div class="modal fade" id="newcatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">New Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('categorias.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    @include('categorias.form')
                    
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
<div class="modal fade" id="editcatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('categorias.update','test')}}" method="post">
                {{method_field('patch')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="categoria_id" id="cat_id" value="">

                    @include('categorias.form')
                    <!-- Select -->
                    <select name="categoria" id="cat" title="Categorías" class="form-control selectpicker ">
                        @foreach($categorias as $categoria)
                        <option selected value="{{$categoria->id}}">{{ $categoria->nombre}}</option>
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
<div class="modal modal-danger fade" id="deletecatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('categorias.destroy','test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                        Are you sure you want to delete this category?
                    </p>
                    <input type="hidden" name="categoria_id" id="del_id" value="">

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