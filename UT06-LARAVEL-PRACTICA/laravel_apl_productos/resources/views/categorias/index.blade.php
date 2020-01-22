@extends('app')
@section('content')
<!-- <h1 class="text-primary">Lista de Categorias</h1> -->
<table class="table table-bordered" id="tableCategoriass">
    <thead>
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Descripción</th>
            <th class="text-center">Acciones</th>

        </tr>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
        <tr>
            <td class="text-center">{{ $categoria->id}}</td>
            <td class="text-center">{{ $categoria->nombre}}</td>
            <td class="text-center">{{ $categoria->descripcion}}</td>

            <td>
                <!-- Ver un único Categorias  -->
                <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <!-- <tfoot>
            <tr>
                <th class="text-center">Id Categorias</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Activo</th>
                <th class="text-center">Acciones</th>
            </tr>
        </tfoot> -->
</table>
{{ $categorias->links() }}
@stop();