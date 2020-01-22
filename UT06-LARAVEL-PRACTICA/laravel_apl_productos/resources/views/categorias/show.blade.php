<!-- Vista para mostrar un solo producto -->
@extends('app');
@section('content');
<h1> {{ $categorias->nombre }}</h1>
<p>Id: {{ $categorias->id }}</p>
<p>Nombre: {{ $categorias->nombre }}</p>
<p>Fecha de creación: {{ $categorias->created_at }}</p>
@if(! empty($categorias->updated_at))
<p>Fecha de modificación: {{ $categorias->updated_at }}</p>
@endif
<hr>
<a href="{{ route('categorias.index') }}">Volver al índice</a>
<a href="{{ route('categorias.show', $categorias->id) }}">Recargar</a> 
@stop();

