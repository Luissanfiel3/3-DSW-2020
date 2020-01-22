@extends('app')
@section('content')
<h1>Producto {{ $producto->nombre }}</h1>
<p>Id: {{ $producto->id }}</p>
<p>Nombre: {{ $producto->nombre }}</p>
<p>Es activo: {{ $producto->esactivo }}</p>
<p>Fecha de creación: {{ $producto->created_at }}</p>

@if(! empty($producto->updated_at))
<p>Fecha de modificación: {{ $producto->updated_at }}</p>
@endif

<hr>
<a href="{{ route('productos.index') }}">Volver al índice</a>
<a href="{{ route('productos.show', $producto->id) }}">Recargar</a>
@stop