@extends('app')
@section('content')
<form class="mt-2 form-horizontal" action="nuevo_autor.php" method="post">
    <div class="mt-2 control-group">
        <label class="control-label">Nombre</label>
        <div class="controls">
            <input name="nombre" class="form-control" type="text" value="">
        </div>
    </div>
    <div class="mt-2 control-group">
        <label class="control-label">Estilo</label>
        <div class="controls">
            <input name="estilo" class="form-control" type="text" value="">
        </div>
    </div>

    <div class="mt-3 form-actions">
        <button type="submit" class="btn btn-success">SAVE</button>
        <a class="btn btn-secondary" href="listar.php">CANCEL</a>
    </div>
</form>
@stop()